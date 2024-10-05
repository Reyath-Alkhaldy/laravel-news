<?php

namespace App\Http\Controllers\Rss;

use App\Http\Trait\RssFeedReaderTrait;
use App\Models\Category;
use App\Models\RssFeed;
use App\Models\RssItem;
use App\Models\Tag;
use Vedmant\FeedReader\Facades\FeedReader;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class RssFeedController
{
    use RssFeedReaderTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $f = FeedReader::read($this->feedUrl);
        // $f = FeedReader::read('https://rss.nytimes.com/services/xml/rss/nyt/HomePage.xml');
        // $f = FeedReader::read('https://rss.nytimes.com/services/xml/rss/nyt/Technology.xml');

        // $f = FeedReader::read('https://www.aljazeera.net/aljazeerarss/a7c186be-1baa-4bd4-9d80-a84db769f779/73d0e1b4-532f-45ef-b135-bfdff8b8cab9');
        $result  = $this->getFeed($f);

        $feedItems = $this->getFeedItems($f);

        return response()->json([
            'result' => $result,
            "feedItems" => $feedItems,
        ]);

        // dd($feedItems, $result);
    }

    public function fetchAndStore($feedUrl = 'https://rss.nytimes.com/services/xml/rss/nyt/HomePage.xml')
    {
        // $feedUrl = 'https://rss.nytimes.com/services/xml/rss/nyt/HomePage.xml';
        // $feedUrl = 'https://rss.nytimes.com/services/xml/rss/nyt/World.xml';
        // $feedUrl = 'http://feeds.reuters.com/reuters/topNews';
        // قراءة الـ RSS من الرابط باستخدام المكتبة
        $feed = FeedReader::read($feedUrl);
        // dd  ($feed);

        // $xmlString = $feed->get_items()[0]->get_feed()->get_raw_data();
        ////////////////////////////////////////////
        // التحقق مما إذا كان الـ RSS يحتوي على بيانات
        if (!$feed) {
            return response()->json(['message' => 'Unable to fetch RSS feed'], 404);
        }
        // تخزين الـ RSS feed في جدول rss_feeds
        $title = Str::replace('NYT &gt; ', '', $feed->get_title());
        $rssFeed = RssFeed::firstOrCreate([
            'title' => $title,
            'link' =>  $feedUrl,
            'source' => $feed->get_base(),
            'image_url' => $feed->get_image_url(),
            'description' => $feed->get_description()

        ]);
        // استخراج التصنيف (category) إذا كان متاحاً
        // $categoryName = $item->get_category() ? $item->get_category()->get_label() : 'Uncategorized';
        $name = Str::replace('NYT &gt; ', '', $feed->get_title());
        $category = Category::firstOrCreate([
            'name' =>   $name,
            'slug' => Str::slug(  $name,'-'),
            'rss_feed_id' => $rssFeed->id,

        ]);
        foreach ($feed->get_items() as $item) {
            // التحقق مما إذا كان العنصر موجود بالفعل لتجنب التكرار
            $existingItem = RssItem::where('link', $item->get_permalink())->first();
            if ($existingItem) {
                continue;
            }


            // تخزين العنصر (الخبر) في جدول rss_items
            $rssItem = $this->createRessItem($item, $rssFeed->id, $category->id);
            // تخزين العلامات (tags) إذا كانت موجودة
            // $tags = $item->get_id();  // فرضاً أن هناك دالة get_tags() لإحضار العلامات
            // Extract and store tags
            $tags = [];
            if ($item->get_category()) {
                $tags[] = $item->get_category()->get_term(); // Example of extracting a tag
            }

            foreach ($tags as $tagName) {
                $tag = Tag::firstOrCreate(['name' => Str::lower($tagName)]);  // Create or get existing tag
                $rssItem->tags()->attach($tag->id);               // Attach tag to RSS item
            }
        }
        return response()->json(['message' => 'RSS feed processed and stored successfully']);
    }

    public function fetchAndStoreWithGoogle($feedUrl = 'https://news.google.com/rss?hl=en-US&gl=US&ceid=US')
    {
        /////////////////////////////////
        // قراءة الـ RSS من الرابط باستخدام المكتبة
        $feed = FeedReader::read($feedUrl);
        $data = $feed->get_items()[1]->get_feed()->get_raw_data();
        // return  dd(simplexml_load_string($data));
        $xml = simplexml_load_string($data);
        $xmlArray = json_decode(json_encode((array) $xml), true);
        // return $xmlArray['channel'];
        // التحقق مما إذا كان الـ RSS يحتوي على بيانات
        if (!$feed) {
            return response()->json(['message' => 'Unable to fetch RSS feed'], 404);
        }

        // تخزين الـ RSS feed في جدول rss_feeds
        $rssFeed = $this->createRssFeeds($xmlArray, $feedUrl);
        // استخراج التصنيف (category) إذا كان متاحاً


        // استخراج وتخزين كل العناصر (الأخبار) من الـ RSS
        foreach ($xmlArray['channel']['item'] as $item) {
            $category = Category::firstOrCreate([
                'name' => $item['source'],
                'slug' => Str::slug((string)$item['source'],'-'),
                'rss_feed_id' => $rssFeed->id,
            ]);
            // التحقق مما إذا كان العنصر موجود بالفعل لتجنب التكرار
            $existingItem = RssItem::where('link', $item['link'])->first();
            if ($existingItem) {
                continue;
            }
            $tags = [$category->name, $xmlArray['channel']['description']];

            // تخزين العنصر (الخبر) في جدول rss_items
            $rssItem = $this->createRessItemGoogle($item, $rssFeed->id, $category->id);
            // تخزين العلامات (tags) إذا كانت موجودة
            // $tags = $item->get_id();  // فرضاً أن هناك دالة get_tags() لإحضار العلامات
            // Extract and store tags
            foreach ($tags as $tagName) {
                $tag = Tag::firstOrCreate(['name' => Str::lower(value: $tagName)]);  // Create or get existing tag
                $rssItem->tags()->attach($tag->id);               // Attach tag to RSS item
            }
        }
        return response()->json(['message' => 'RSS feed processed and stored successfully']);
    }
   
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(RssFeed $rssFeed)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RssFeed $rssFeed)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RssFeed $rssFeed)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RssFeed $rssFeed)
    {
        //
    }
}

<?php

namespace App\Http\Controllers\Rss;

use App\Models\Category;
use App\Models\RssFeed;
use App\Models\RssItem;
use App\Models\Tag;
use App\Trait\RssFeedReaderTrait;
use Vedmant\FeedReader\Facades\FeedReader;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

// laravel
class RssFeedController
{
    use RssFeedReaderTrait;
   public $feedUrl = 'https://news.google.com/rss?hl=en-US&gl=US&ceid=US';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $f = FeedReader::read( $this->feedUrl);
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
        // قراءة الـ RSS من الرابط باستخدام المكتبة
        $feed = FeedReader::read($feedUrl);

        // التحقق مما إذا كان الـ RSS يحتوي على بيانات
        if (!$feed) {
            return response()->json(['message' => 'Unable to fetch RSS feed'], 404);
        }

        // تخزين الـ RSS feed في جدول rss_feeds
        $rssFeed = RssFeed::firstOrCreate([
            'title' => $feed->get_title(),
            'link' => $feed->get_permalink(),
            'source' => $feedUrl
        ]);
        //   dd  ($feed->get_items()[0] );
        // استخراج وتخزين كل العناصر (الأخبار) من الـ RSS
        foreach ($feed->get_items() as $item) {
            // dd( $item->get_enclosures(),$item->get_enclosure() );

            // التحقق مما إذا كان العنصر موجود بالفعل لتجنب التكرار
            $existingItem = RssItem::where('link', $item->get_permalink())->first();
            if ($existingItem) {
                continue;
            }

            // استخراج التصنيف (category) إذا كان متاحاً
            // $categoryName = $item->get_category() ? $item->get_category()->get_label() : 'Uncategorized';
            // $category = Category::firstOrCreate(['name' => $categoryName]);
            // TODO
            $category = Category::firstOrCreate(['name' => $feed->get_title()]);

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

<?php

namespace App\Http\Controllers\Rss;

use App\Models\RssFeed;
use Illuminate\Http\Request;
use App\Trait\RssFeedReaderTrait;
use Vedmant\FeedReader\Facades\FeedReader;
// use App\tr
// https://www.aljazeera.com/xml/rss/all.xml
// https://www.aljazeera.com/programmes/xml/rss/all.xml
// https://www.aljazeera.com/blogs/xml/rss/all.xml
// https://www.aljazeera.com/sport/xml/rss/all.xml
// https://www.aljazeera.com/contactus/xml/rss/all.xml
// ar
// https://www.aljazeera.net/aljazeerarss
// en 
// https://www.aljazeera.com/xml/rss/all.xml
class FeedReaderController
{
    use RssFeedReaderTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $f = FeedReader::read('https://www.aljazeera.com/xml/rss/all.xml');
        // $f = FeedReader::read('https://www.aljazeera.com/programmes/xml/rss/all.xml');
        // $f = FeedReader::read('https://www.aljazeera.net/aljazeerarss');
        // $f = FeedReader::read('https://www.aljazeera.com/xml/rss/all.xml');
        // https://www.aljazeera.net/aljazeerarss/a7c186be-1baa-4bd4-9d80-a84db769f779/73d0e1b4-532f-45ef-b135-bfdff8b8cab9
        // $f = FeedReader::read('https://news.google.com/news/rss');
        // $f = FeedReader::read('https://www.aljazeera.net/aljazeerarss/ar/sport.xml');
        // dd($f->get_image_url());
        $result  = $this->getFeed($f);

        $feedItems = $this->getFeedItems($f);
        return response()->json([
            'result' => $result,
            "feedItems" => $feedItems,
        ]);
        // dd($feedItems, $result);

        // echo $f->get_title();
        // echo $f->get_items()[0]->get_title();
        // echo $f->get_items()[0]->get_content();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($f)
    {
        foreach ($f->get_items() as $item) {
            // Check if the feed item already exists by its link
            $existingItem = RssFeed::where('link', $item->get_link())->first();

            if (!$existingItem) {
                // Create a new RssFeed entry
                RssFeed::create([
                    'title' => $item->get_title(),
                    'link' => $item->get_link(),
                    'description' => $item->get_description(),
                    'publication_date' => $item->get_date('Y-m-d H:i:s'), // Format date for MySQL
                ]);
            }
        }
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

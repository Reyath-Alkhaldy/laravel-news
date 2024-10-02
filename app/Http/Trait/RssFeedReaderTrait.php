<?php

namespace App\Http\Trait;

use App\Models\RssFeed;
use App\Models\RssItem;
use Illuminate\Support\Carbon;

trait RssFeedReaderTrait
{
    private function createRssFeeds($xmlArray,$feedUrl){
         return RssFeed::firstOrCreate([
            'title' => $xmlArray['channel']['title'],
            'link' => $xmlArray['channel']['link'],
            'image_url' => $xmlArray['channel']['image']['url'],
            'source' => $feedUrl,
            'description' => $xmlArray['channel']['description']
        ]);
    }
    private function createRessItemGoogle($item, $rss_feed_id, $category_id)
    {
        return RssItem::create([
            'rss_feed_id' => $rss_feed_id,
            'title' => $item['title'],
            'description' => $item['description'],
            // 'image_url' => $imageUrl,
            // 'video_url' => $videoUrl,
            // 'author' => $author,
            'link' => $item['link'],
            'pub_date' => Carbon::parse( $item['pubDate']),
            'category_id' => $category_id,
        ]);
    }
    private function createRessItem($item, $rss_feed_id, $category_id)
    {
        $imageUrl = null;
        $videoUrl = null;
        $author = $item->get_author() ? $item->get_author()->get_name() : null;  // Get the author

        // 1. Try to get the media from <enclosure>
        if ($item->get_enclosure()) {
            $enclosure = $item->get_enclosure();
            $imageUrl = $enclosure->get_link();  // Image URL

            if (strpos($enclosure->get_type(), 'image') !== false) {
                $imageUrl = $enclosure->get_link();  // Image URL
            }

            if (strpos($enclosure->get_type(), 'video') !== false) {
                $videoUrl = $enclosure->get_link();  // Video URL
            }
        }

        // // 2. Try to get the image from content using <img> tag
        // if (!$imageUrl && preg_match('/<img.*?src=["\'](.*?)["\']/', $item->get_content(), $matches)) {
        //     $imageUrl = $matches[1];  // Extract the image URL from the content
        // }

        // // 3. Try to get the video from content using <iframe> or <video> tag
        // if (!$videoUrl && preg_match('/<iframe.*?src=["\'](.*?)["\']/', $item->get_content(), $matches)) {
        //     $videoUrl = $matches[1];  // Extract the video URL from iframe
        // }

        // if (!$videoUrl && preg_match('/<video.*?src=["\'](.*?)["\']/', $item->get_content(), $matches)) {
        //     $videoUrl = $matches[1];  // Extract the video URL from video tag
        // }

        return RssItem::create([
            'rss_feed_id' => $rss_feed_id,
            'title' => $item->get_title(),
            // 'author' => $item->get_author(),
            'description' => $item->get_description(),
            'image_url' => $imageUrl,
            'video_url' => $videoUrl,
            'author' => $author,
            'link' => $item->get_permalink(),
            'pub_date' => $item->get_date('Y-m-d H:i:s'),
            'category_id' => $category_id,
        ]);
    }
    public function getFeed($f)
    {
        return  $result = [
            'titel' => $f->get_title(),
            'locale' => $f->get_language(),
            'description' => $f->get_description(),
            'link' => $f->get_link(),
            'links' => $f->get_links(),
            'authors' => $f->get_authors(),
            'author' => $f->get_author(),
            'image_url' => $f->get_image_url(),
            'latitude' => $f->get_latitude(),
        ];
    }
    public function getFeedItems($f)
    {
        $feedItems = [];
        foreach ($f->get_items() as $item) {
            $feedItems[] = [
                'title' => $item->get_title(),
                'link' => $item->get_link(),
                'description' => $item->get_description(),
                'publication_date' => $item->get_date('j F Y | g:i a'),
                'authors' => $item->get_authors(),
                'author' => $item->get_author(),
                // 'locale' => $item->get_language(),
                // 'content' => $item->get_content(),
                'date' => $item->get_date(),
                'category' => $item->get_category(),
                // 'image' => $item->get_image_url(),

            ];
        }
        return $feedItems;
    }
}

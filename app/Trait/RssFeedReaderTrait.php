<?php

namespace App\Trait;

use App\Models\RssItem;

trait RssFeedReaderTrait
{

    private function createRessItem($item, $rss_feed_id, $category_id)
    {
        $imageUrl = null;

        // 1. Check for media enclosure
        if ($item->get_enclosure()) {
            $imageUrl = $item->get_enclosure()->get_link();
        }

        // 2. Check for image in the content
        if (!$imageUrl && preg_match('/<img.*?src=["\'](.*?)["\']/', $item->get_content(), $matches)) {
            $imageUrl = $matches[1];
        }
        return RssItem::create([
            'rss_feed_id' => $rss_feed_id,
            'title' => $item->get_title(),
            'content' =>$item->get_content() ,
            'description' => $item->get_description(),
            'image_url' => $imageUrl,
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
                'content' => $item->get_content(),
                'date' => $item->get_date(),
                'category' => $item->get_category(),
                // 'image' => $item->get_image_url(),

            ];
        }
        return $feedItems;
    }
}

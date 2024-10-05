<?php
namespace App\Repository;

use App\Models\Category;
use App\Models\RssItem;

class RssItemModelRepository implements RssItemRepository{

/**
     * Display a listing of the resource.
     */
    public function get()
    {
        $categoriesNames = ['World News', 'Google News', 'U.S. News', 'Sports', 'Technology', 'Business'];
        ////
        $categories = Category::whereIn('name', $categoriesNames)
            ->whereHas('rssItems', function ($query) {
                $query->havingRaw('count(*)>= 8');
            })->with('rssItems', function ($query) {
                $query->limit(8)->latest();
            })
            ->select(['id', 'name','slug'])
            ->limit(6)
            ->get();
            return $categories;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return RssItem::where('id', $id)->first();
    }
}
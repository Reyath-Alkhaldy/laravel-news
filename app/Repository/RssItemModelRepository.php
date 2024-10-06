<?php

namespace App\Repository;

use App\Models\Category;
use App\Models\RssItem;

class RssItemModelRepository implements RssItemRepository
{
    protected $categories;
    public function __construct()
    {
        $this->categories = collect([]);
    }

    /**
     * Display a listing of the resource.
     */
    public function get()
    {
        if (!($this->categories->count())) {
            $categoriesNames = ['World News', 'Google News', 'U.S. News', 'Sports', 'Technology', 'Business'];
            ////
            $this->categories = Category::whereIn('name', $categoriesNames)
                ->whereHas('rssItems', function ($query) {
                    $query->havingRaw('count(*)>= 8');
                })->with('rssItems', function ($query) {
                    $query->limit(8)->latest();
                })
                ->select(['id', 'name', 'slug'])
                ->limit(6)
                ->get();
        }

        return $this->categories;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        return RssItem::where('slug', $slug)->first();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\RssItem;
use Illuminate\Http\Request;
use Illuminate\Contracts\Database\Eloquent\Builder;

class RssItemController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //  $trendings = Category::googleNewsTrendings()->first();
        ////
        $categoriesNames = ['NYT &gt; World News', 'Top stories - Google News', 'NYT &gt; U.S. News', 'NYT &gt; Sports', 'NYT &gt; Technology', 'NYT &gt; Business'];
        ////
        $categories = Category::whereIn('name', $categoriesNames)
            ->whereHas('rssItems', function ($query) {
                $query->havingRaw('count(*)>= 8');
            })->with('rssItems', function ($query) {
                $query->limit(8)->latest();
            })
            ->select(['id', 'name'])
            ->limit(6)
            ->get();
        ////
        $worldNews = $categories[1];
        $trendings = $categories[0];
        $USNews = $categories[2];
        $sports = $categories[5];
        $technology = $categories[4];
        $business = $categories[3];
        // dd($worldNews);
        ////
        return  view(
            'dash.index',
            compact(
                'worldNews',
                'trendings',
                'categories',
                'USNews',
                'sports',
                'technology',
                'business'
            )
        );
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
    public function show(RssItem $rssItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RssItem $rssItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RssItem $rssItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RssItem $rssItem)
    {
        //
    }
}

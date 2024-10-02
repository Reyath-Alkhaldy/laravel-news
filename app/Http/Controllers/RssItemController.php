<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\RssFeed;
use App\Models\RssItem;
use App\Repository\RssItemRepository;
use Illuminate\Http\Request;
use Illuminate\Contracts\Database\Eloquent\Builder;

class RssItemController
{
    public function __construct(public RssItemRepository $rssItemRepository) {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $categoriesNames = ['NYT &gt; World News', 'Top stories - Google News', 'NYT &gt; U.S. News', 'NYT &gt; Sports', 'NYT &gt; Technology', 'NYT &gt; Business'];
        $categories = collect($this->rssItemRepository->get());
        $worldNews = $categories->firstWhere('name', 'NYT &gt; World News');
        $USNews = $categories->firstWhere('name', 'NYT &gt; U.S. News');
        $sports = $categories->firstWhere('name', 'NYT &gt; Sports');
        $technology = $categories->firstWhere('name', 'NYT &gt; Technology');
        $business = $categories->firstWhere('name', 'NYT &gt; Business');
        $trendings =  RssFeed::where('title', 'Top stories - Google News')
            ->
            // whereHas('categories', function ($query) {
            //     // $query->havingRaw('count(*)>= 6');
            // })->
            with('categories', function ($query) {
                $query->whereHas('rssItems', function ($query) {
                    $query->havingRaw('count(*)>= 1');
                })->with('rssItems', function ($query) {
                    $query->limit(1)->latest();
                })->limit(8)->latest();
            })
            ->first();
        return  view(
            'dash.index',
            compact(
                'worldNews',
                'trendings',
                'USNews',
                'sports',
                'technology',
                'business',
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
    public function show(string  $id)
    {
        $rssItem = $this->rssItemRepository->show($id);
        return  view('dash.single-post', compact('rssItem'));
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

<?php

namespace App\Http\Controllers\Rss;

use App\Models\Category;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class SiteMapController
{
    public function index()
    {
        $sitemap =  Sitemap::create()
            ->add(Url::create(url: '/')
            ->setPriority(0.1)
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
            ->setLastModificationDate(Carbon::now())
            );
        // $sitemap->writeToFile(public_path('sitemap.xml'));

        // Category::all()->each(function (Category $category) use ($sitemap) {
        //     $sitemap->add(
        //         Url::create("news/{$category->slug}/category")
        //         ->setPriority(0.5)
        //         ->setChangeFrequency(Url::CHANGE_FREQUENCY_HOURLY)
        //         ->setLastModificationDate(Carbon::now())
        //     );
        // });
        $sitemap->add(Category::get());

        $sitemap->writeToFile(public_path('sitemap.xml'));
        return "sitemap created successfully";
    }
}

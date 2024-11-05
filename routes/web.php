<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Rss\RssFeedController;
use App\Http\Controllers\Rss\SiteMapController;
use App\Http\Controllers\RssItemController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schedule;

// Route::get('/fetch-rss/{feedUrl}', [RssFeedController::class, 'fetchAndStore']);
// Route::get('/fetch-rss/feedUrl', [RssFeedController::class, 'fetchAndStore']);
// Route::get('/fetch-rss/feedUrl', [RssFeedController::class, 'fetchAndStoreWithGoogle']);
// Route::get('/sitemap', [SiteMapController::class, 'index']);




Route::group(['prefix' => '/'], function () {
    // Route::resource('news/categories', CategoryController::class)->scoped()->names('news.categories');
    Route::get('news/{category}/category', [CategoryController::class,'show'])->name('news.categories.show');
    // Route::get('/news', [RssItemController::class,'index'])->name('news.index');
    Route::get('news/{news}', [RssItemController::class,'show'])->name('news.show');

    // Route::resource('/news', RssItemController::class)->scoped()->names('news')->except('index');
    Route::get('/', [RssItemController::class, 'index'])->name('news.index');
    Route::get('/about',  function () {
        return view('dash.about');
    })->name('dash.about');
});


// Route::get('/schedule ',  function () {
//   Schedule::command('app:generate-news-sitemap')->everySecond();
//     return 'commanfcommandcommand' ;
//   });


// Route::group(['prefix' => 'dash', 'as' => 'dash.'], function () {
//     Route::apiResource('settings', SettingController::class);
// });



// Route::resource('rss/feed', RssFeedController::class);

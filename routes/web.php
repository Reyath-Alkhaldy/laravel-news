<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Rss\RssFeedController;
use App\Http\Controllers\RssItemController;
use Illuminate\Support\Facades\Route;

// Route::get('/fetch-rss/{feedUrl}', [RssFeedController::class, 'fetchAndStore']);
Route::get('/fetch-rss/feedUrl', [RssFeedController::class, 'fetchAndStore']);
// Route::get('/fetch-rss/feedUrl', [RssFeedController::class, 'fetchAndStoreWithGoogle']);
// Route::get('/fetch-rss/feedUrl', [RssFeedController::class, 'fetchRssFeed']);


// Route::get('/', function () {
//     return view('welcome');
// });


Route::group(['prefix' => '/'], function () {
    Route::resource('news/categories', CategoryController::class)->scoped()->names('news.categories');

    Route::resource('/news', RssItemController::class)->scoped()->names('news');

});





// Route::group(['prefix' => 'dash', 'as' => 'dash.'], function () {
//     Route::apiResource('settings', SettingController::class);
// });



// Route::resource('rss/feed', RssFeedController::class);

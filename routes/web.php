<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Rss\FeedReaderController;
use App\Http\Controllers\Rss\RssFeedController;
use App\Http\Controllers\RssItemController;
use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Route;

// Route::get('/fetch-rss/{feedUrl}', [RssFeedController::class, 'fetchAndStore']);
// Route::get('/fetch-rss/feedUrl', [RssFeedController::class, 'fetchAndStore']);
Route::get('/fetch-rss/feedUrl', [RssFeedController::class, 'fetchAndStoreWithGoogle']); 
// Route::get('/fetch-rss/feedUrl', [RssFeedController::class, 'fetchRssFeed']);


// Route::get('/', function () {
//     return view('welcome');
// });


Route::group(['prefix' => '/'], function () {
    Route::resource('/news', RssItemController::class);
    Route::resource('news/categories', CategoryController::class)
    ->names('news.categories');
});





// Route::group(['prefix' => 'dash', 'as' => 'dash.'], function () {
//     Route::apiResource('settings', SettingController::class);
// });



Route::resource('rss/feednews', FeedReaderController::class);
Route::resource('rss/feed', RssFeedController::class);

<?php

use App\Http\Controllers\NewsController;
use App\Http\Controllers\Rss\FeedReaderController;
use App\Http\Controllers\Rss\RssFeedController;
use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Route;

// Route::get('/fetch-rss/{feedUrl}', [RssFeedController::class, 'fetchAndStore']);
Route::get('/fetch-rss/feedUrl', [RssFeedController::class, 'fetchAndStore']);

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('dashboard.index');
});
Route::apiResource('news', NewsController::class);

Route::group(['prefix'=> 'dashboard', 'as'=> 'dashboard.'],function(){
Route::apiResource('settings', SettingController::class);
});



Route::resource('rss/feednews', FeedReaderController::class); 
Route::resource('rss/feed', RssFeedController::class); 

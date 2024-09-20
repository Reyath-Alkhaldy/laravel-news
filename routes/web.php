<?php

use App\Http\Controllers\NewsController;
use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('dashboard.index');
});
Route::apiResource('news', NewsController::class);

Route::group(['prefix'=> 'dashboard', 'as'=> 'dashboard.'],function(){
// Route::get('/settings', function(){
//     return view('dashboard.settings');
// })->name('settings.show');
Route::apiResource('settings', SettingController::class);
// Route::post('/settings/update', function(){
//     echo 'hello ';
// })->name('settings.update');
});
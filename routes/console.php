<?php

use App\Http\Controllers\Rss\RssFeedController;
use App\Jobs\NewsRertrieving;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Schedule::call(function () {
    //this category  {{'Top stories - Google News' === 'Trending'}}
    app(RssFeedController::class)->fetchAndStoreWithGoogle('https://news.google.com/rss?hl=en-US&gl=US&ceid=US');

    app(RssFeedController::class)->fetchAndStore('https://rss.nytimes.com/services/xml/rss/nyt/HomePage.xml');
    app(RssFeedController::class)->fetchAndStore('https://rss.nytimes.com/services/xml/rss/nyt/World.xml');
    app(RssFeedController::class)->fetchAndStore('https://rss.nytimes.com/services/xml/rss/nyt/US.xml');
    app(RssFeedController::class)->fetchAndStore('https://rss.nytimes.com/services/xml/rss/nyt/Business.xml');
    app(RssFeedController::class)->fetchAndStore('https://rss.nytimes.com/services/xml/rss/nyt/Technology.xml');
    app(RssFeedController::class)->fetchAndStore('https://rss.nytimes.com/services/xml/rss/nyt/Sports.xml');
    app(RssFeedController::class)->fetchAndStore('https://rss.nytimes.com/services/xml/rss/nyt/Science.xml');
    app(RssFeedController::class)->fetchAndStore('https://rss.nytimes.com/services/xml/rss/nyt/Health.xml');
    app(RssFeedController::class)->fetchAndStore('https://rss.nytimes.com/services/xml/rss/nyt/Arts.xml');
    app(RssFeedController::class)->fetchAndStore('https://rss.nytimes.com/services/xml/rss/nyt/Opinion.xml');
    app(RssFeedController::class)->fetchAndStore('https://rss.nytimes.com/services/xml/rss/nyt/FashionandStyle.xml');
    app(RssFeedController::class)->fetchAndStore('https://rss.nytimes.com/services/xml/rss/nyt/Travel.xml');
    app(RssFeedController::class)->fetchAndStore('https://rss.nytimes.com/services/xml/rss/nyt/Books.xml');
    app(RssFeedController::class)->fetchAndStore('https://rss.nytimes.com/services/xml/rss/nyt/DiningandWine.xml');

    app(RssFeedController::class)->fetchAndStore('https://feeds.bbci.co.uk/news/rss.xml');
    // app(RssFeedController::class)->fetchAndStore('https://www.aljazeera.com/xml/rss/all.xml');
    app(RssFeedController::class)->fetchAndStore('https://rss.cnn.com/rss/cnn_latest.rss');
    app(RssFeedController::class)->fetchAndStore('http://feeds.reuters.com/reuters/topNews');
    app(RssFeedController::class)->fetchAndStore('https://feeds.skynews.com/feeds/rss/home.xml');
})->everyMinute();

// protected function schedule(Schedule $schedule)
// {
//     $schedule->call(function () {
//         app(RssFeedController::class)->fetchAndStore('https://example.com/rss');
//     })->hourly();  // الجلب كل ساعة
// }

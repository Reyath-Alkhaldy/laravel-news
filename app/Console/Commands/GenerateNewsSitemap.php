<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Category;
use App\Models\RssItem;
use Illuminate\Support\Carbon;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use Google\Client;
use Google\Service\SearchConsole;
class GenerateNewsSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:generate-news-sitemap';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // إنشاء ملف Sitemap
        $sitemap = Sitemap::create();
        $sitemap->add(Url::create('/')
            ->setPriority(1.0)
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
            ->setLastModificationDate(Carbon::now())
        );

        // $sitemap->add(Url::create('/about')
        //     ->setPriority(0.7)
        //     ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
        //     ->setLastModificationDate(Carbon::now())
        // );

        // إحضار جميع المقالات وتحديثات الموقع (مثال: المقالات الإخبارية)
        // $categories = Category::latest()->get();

        // // إضافة كل مقال للـ sitemap
        // foreach ($categories as $category) {
        //     $sitemap->add(
        //         Url::create(route('news.categories.show', $category->slug))
        //             ->setLastModificationDate(Carbon::now())
        //             ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
        //             ->setPriority(0.8)
        //     );
        // }

        // إضافة المقالات من قاعدة البيانات
        $rssItems = RssItem::latest()->get();
        foreach ($rssItems as $rssItem) {
            $sitemap->add(
                Url::create(route('news.show', $rssItem->slug))
                    ->setPriority(1.0)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
                    ->setLastModificationDate($rssItem->updated_at)
            );
        }
        // حفظ ملف sitemap في المسار المطلوب
        // $sitemap->writeToFile(public_path('sitemap.xml'));
         $path = public_path('sitemap.xml');

        // $path = storage_path('app/public/sitemap.xml');
        $sitemap->writeToFile($path);

        // تعديل ملف الـ sitemap لإضافة priority و changefreq يدويًا
        // $this->addPriorityAndChangefreq($path);
        // رسالة نجاح
        $this->submitSitemapToGoogle('https://new-news-summary.com/sitemap.xml');
        $this->info('Sitemap generated successfully!');

    }


    // دالة إرسال ملف sitemap إلى Google
    private function submitSitemapToGoogle($sitemapUrl)
    {
        $client = new Client();
        $client->setAuthConfig(storage_path('app/sitemap-project-439222-340c90d71e3b.json')); // استبدل المسار بمسار ملف Google JSON الخاص بك
        $client->addScope(SearchConsole::WEBMASTERS);

        $service = new SearchConsole($client);

        try {
            $siteUrl = "https://new-news-summary.com"; // ضع رابط موقعك
            $response = $service->sitemaps->submit($siteUrl, $sitemapUrl);

            $this->info("Sitemap submitted to Google successfully!");
        } catch (\Exception $e) {
            $this->error('Error submitting sitemap: ' . $e->getMessage());
        }
    }

    private function addPriorityAndChangefreq($path)
    {
        // تحميل محتويات ملف sitemap.xml
        $sitemapContent = file_get_contents($path);

        // تعديل المحتويات لإضافة changefreq و priority
        $sitemapContent = str_replace(
            '<loc>',
            "<loc>\n<changefreq>daily</changefreq>\n<priority>1.0</priority>",
            $sitemapContent
        );

        // حفظ التغييرات إلى الملف
        file_put_contents($path, $sitemapContent);
    } 
}

<?php

namespace App\Console\Commands;

use App\Models\Category;
use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use Illuminate\Support\Facades\Storage;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:generate-sitemap';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';
    // public function __construct()
    // {
    //     parent::__construct();
    // }
    /**
     * Execute the console command.
     */
    public function handle()
    {
        // إنشاء Sitemap جديدة
        $sitemap = Sitemap::create();

        // إضافة الصفحات الثابتة
        $sitemap->add(Url::create('/')
                        ->setPriority(1.0)
                        ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
                        ->setLastModificationDate(now()));

        $sitemap->add(Url::create('/about')
                        ->setPriority(0.7)
                        ->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)
                        ->setLastModificationDate(now()));

        // إضافة المقالات من قاعدة البيانات
        $categories = Category::all();
        foreach ($categories as $category) {
            $sitemap->add(Url::create("/news/{$category->slug}/category")
                            ->setPriority(0.8)
                            ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
                            ->setLastModificationDate($category->updated_at));
        }

        // كتابة ملف sitemap.xml إلى مجلد public
        // $sitemap->writeToFile(public_path('sitemap.xml'));
        // كتابة ملف sitemap.xml إلى مجلد storage
        // $path = storage_path('app/public/sitemap.xml');
        $path = public_path('sitemap.xml');
        $sitemap->writeToFile($path);

        // تعديل ملف الـ sitemap لإضافة priority و changefreq يدويًا
        $this->addPriorityAndChangefreq($path);

        // إخطار المستخدم عند الانتهاء
        $this->info('Sitemap has been generated successfully!');
    }


    private function addPriorityAndChangefreq($path)
    {
        // تحميل محتويات ملف sitemap.xml
        $sitemapContent = file_get_contents($path);

        // تعديل المحتويات لإضافة changefreq و priority
        $sitemapContent = str_replace(
            '<loc>',
            "<loc>\n<changefreq>daily</changefreq>\n<priority>0.8</priority>",
            $sitemapContent
        );

        // حفظ التغييرات إلى الملف
        file_put_contents($path, $sitemapContent);
    }
}

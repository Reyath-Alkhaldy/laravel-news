<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sitemap\Contracts\Sitemapable;
use Spatie\Sitemap\Tags\Url;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
        'name',
        'rss_feed_id',
        'slug'
        //  'parent_id'
    ];
    public function rssItems()
    {
        return $this->hasMany(RssItem::class);
    }
    public function cheldren()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }
    public function rssFeed()
    {
        return $this->belongsTo(RssFeed::class);
    }
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id', 'id');
    }
    public function trendings()
    {
        return $this->rssItems()->take(6)->latest('pub_date');
    }
    public function scopeGoogleNewsTrendings(Builder $builder)
    {
        $builder->where('name', 'Top stories - Google News');
    }
    public function getRouteKeyName(): string
    {
        return 'slug';
    }
    public function toSitemapTag(): Url | string | array
    {
        // Simple return:
        // return route('news.categories.show', $this);

        // Return with fine-grained control:
        return Url::create(route('news.categories.show', $this))
            ->setLastModificationDate(Carbon::create($this->updated_at))
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_HOURLY)
            ->setPriority(0.5);
    }
}

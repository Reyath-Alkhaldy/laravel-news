<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
// use Astrotomic\Translatable\Translatable;

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
}




// class Category extends Model implements TranslatableContract
// {
//     use Translatable,HasFactory;
//     public $translatedAttributes = ['title', 'content'];
//     protected $fillable = ['image','parent',];

// }

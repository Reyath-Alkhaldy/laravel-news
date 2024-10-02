<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RssItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'rss_feed_id',
        'title',
        'description',
        'link',
        // 'content',
        'image_url',
        'video_url',
        'author',
        'pub_date',
        'category_id'
    ];

    public function rssFeed()
    {
        return $this->belongsTo(RssFeed::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(
            Tag::class,
            'rss_item_tags',
            'rss_item_id',
            'tag_id',
            'id',
            'id',
        );
    }
}

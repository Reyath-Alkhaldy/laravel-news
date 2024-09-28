<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
// use Astrotomic\Translatable\Translatable;


class Tag extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = ['name'];

    public function rssItems()
    {
        return $this->belongsToMany(
            RssItem::class,
            'rss_item_tags',
            'tag_id',
            'rss_item_id',
            'id',
            'id',
        );
    }
}

// class Tag extends Model implements TranslatableContract
// {
//     use Translatable, HasFactory;
// }

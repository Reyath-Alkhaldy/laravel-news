<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RssFeed extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'link',
        'description',
        'source',
        'image_url'
    ];

    public function items()
    {
        return $this->hasMany(RssItem::class);
    }
    public function categories()
    {
        return $this->hasMany(Category::class);
    }
}

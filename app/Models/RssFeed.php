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
        'publication_date',
        'source'
    ];

    public function items()
    {
        return $this->hasMany(RssItem::class);
    }
}

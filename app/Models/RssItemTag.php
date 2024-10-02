<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class RssItemTag extends Pivot
{
    use HasFactory;
    protected $table = 'rss_item_tags'; 
    protected $fillable = ['rss_item_id','tag_id'];

    public $timestamps = false;

}

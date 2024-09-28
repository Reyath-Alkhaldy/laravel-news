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
    protected $fillable = ['image','parent','name'];
    public function rssItems()
    {
        return $this->hasMany(RssItem::class);
    }
    public function trendings()
    {
        return $this->rssItems()->take(6)->latest('pub_date');
    }
    public function scopeGoogleNewsTrendings(Builder $builder){
        $builder->where('name', 'Top stories - Google News');
    }

}




// class Category extends Model implements TranslatableContract
// {
//     use Translatable,HasFactory;
//     public $translatedAttributes = ['title', 'content'];
//     protected $fillable = ['image','parent',];

// }

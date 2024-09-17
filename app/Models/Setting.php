<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
class Setting extends Model implements TranslatableContract
{
    use Translatable,HasFactory;
    public $translatedAttributes = ['title', 'content'];
    protected $fillable = [ 'logo', 'favicon', 'facebook', 'instagram', 'email', 'phone',];
}

<?php
namespace App\Http\Facade;

use App\Repository\RssItemRepository;
use Illuminate\Support\Facades\Facade;

class RssItem extends Facade {

    protected static function getFacadeAccessor()
    {
        return RssItemRepository::class;
    }
}
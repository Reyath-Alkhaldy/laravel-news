<?php

namespace App\Repository;

interface   RssItemRepository
{
    /**
     * Display a listing of the resource.
     */
    public function get();

    /**
     * Display the specified resource.
     */
    public function show(string $slug);
}

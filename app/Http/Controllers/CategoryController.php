<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Category::all();
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request->all();
      return  Category::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    { 
        $categoryName = $category->name;
        $rssItems = $category->rssItems()->paginate();
        // dd($rssItems);
        // return $rssItems;
        
        // dd($category);
        return  view('dash.category',compact('rssItems','categoryName'));
    }

     /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $Category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class NewsController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $client = new Client();
        // $response = $client->request('GET', 'https://newsapi.org/v2/top-headlines',[
            $response = $client->request('GET', 'https://newsapi.org/v2/everything',[
            'query' => [
                // 'country' => 'us',
                'apiKey' => 'e6d81ab6c34d4d5295bda011d6a46741',
                'language'=>'ar',
                'q'=> 'yemen'
            ]
        ]);

        $data = json_decode($response->getBody(), true);
dd($data);
        return view('news', ['news' => $data['articles']]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
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

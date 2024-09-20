<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Str;

class SettingController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.settings');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return Setting::create($request->except(['_token']));
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
    public function update(Request $request, Setting $Setting)
    {
        $data = [
            'logo' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'favicon' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'facebook' => 'nullable|string',
            'instagram' => 'nullable|string',
            'phone' => 'nullable|string',
            'email' => 'nullable|email',
        ];
        foreach (config('translatable.languages') as $key => $value) {
            $data[$key . '*.title'] = 'nullable|string';
            $data[$key . '*.content'] = 'nullable|string';
            $data[$key . '*.address'] = 'nullable|string';
        }
        $validateData = $request->validate($data);
        //  dd($validateData,'val');
        $Setting->update($request->except(['_token', 'logo', 'favicon']));
        if ($request->file('logo')) {
            $file = $request->file('logo');
            $fileName = Str::uuid() . $file->getClientOriginalName();
            $file->move(public_path('images'), $fileName);
            $path = "/images/" . $fileName;
            $Setting->update(['logo' => $path]);
        }
        if ($request->file('favicon')) {
            $file = $request->file('favicon');
            $fileName = Str::uuid() . $file->getClientOriginalName();
            $file->move(public_path('images'), $fileName);
            $path = "/images/" . $fileName;
            $Setting->update(['favicon' => $path]);
        }
        return  redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Resources\MerchColorCollection;
use App\Http\Resources\MerchColorResource;
use App\Models\MerchColor;
use Illuminate\Http\Request;

class MerchColorController extends Controller
{
    public function index(): MerchColorCollection
    {
        return new MerchColorCollection(MerchColor::orderBy('order')->get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'image_src' => ['required'],
            'image_alt' => ['required'],
            'color' => ['required'],
            'selected_color' => ['required'],
            'order' => ['required', 'integer'],
        ]);

        return new MerchColorResource(MerchColor::create($request->validated()));
    }

    public function show(MerchColor $merchColor)
    {
        return new MerchColorResource($merchColor);
    }

    public function update(Request $request, MerchColor $merchColor)
    {
        $request->validate([
            'image_src' => ['required'],
            'image_alt' => ['required'],
            'color' => ['required'],
            'selected_color' => ['required'],
            'order' => ['required', 'integer'],
        ]);

        $merchColor->update($request->validated());

        return new MerchColorResource($merchColor);
    }

    public function destroy(MerchColor $merchColor)
    {
        $merchColor->delete();

        return response()->json();
    }
}

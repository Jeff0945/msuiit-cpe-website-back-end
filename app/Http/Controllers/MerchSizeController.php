<?php

namespace App\Http\Controllers;

use App\Http\Resources\MerchSizeCollection;
use App\Http\Resources\MerchSizeResource;
use App\Models\MerchSize;
use Illuminate\Http\Request;

class MerchSizeController extends Controller
{
    public function index()
    {
        return new MerchSizeCollection(MerchSize::orderBy('order')->get());
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'is_available' => ['required'],
            'order' => ['required', 'integer'],
        ]);

        return new MerchSizeResource(MerchSize::create($request->validated()));
    }

    public function show(MerchSize $merchSize)
    {
        return new MerchSizeResource($merchSize);
    }

    public function update(Request $request, MerchSize $merchSize)
    {
        $request->validate([
            'name' => ['required'],
            'is_available' => ['required'],
            'order' => ['required', 'integer'],
        ]);

        $merchSize->update($request->validated());

        return new MerchSizeResource($merchSize);
    }

    public function destroy(MerchSize $merchSize)
    {
        $merchSize->delete();

        return response()->json();
    }
}

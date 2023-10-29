<?php

namespace App\Http\Controllers;

use App\Http\Resources\MerchCollection;
use App\Http\Resources\MerchResource;
use App\Models\Merch;
use Illuminate\Http\Request;

class MerchController extends Controller
{
    public function index(): MerchCollection
    {
        return new MerchCollection(Merch::orderBy('order')->get());
    }

    public function store(Request $request): MerchResource
    {
        $this->authorize('create', Merch::class);

        return new MerchResource(Merch::create($request->validated()));
    }

    public function show(Merch $merch): MerchResource
    {
        return new MerchResource($merch->loadMissing(['merchColor', 'merchSize']));
    }

    public function update(Request $request, Merch $merch): MerchResource
    {
        $this->authorize('update', $merch);

        $merch->update($request->validated());

        return new MerchResource($merch);
    }

    public function destroy(Merch $merch): \Illuminate\Http\JsonResponse
    {
        $this->authorize('delete', $merch);

        $merch->delete();

        return response()->json();
    }
}

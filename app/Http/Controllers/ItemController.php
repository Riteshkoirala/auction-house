<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Http\Services\ImageSaver;
use App\Models\Auction;
use App\Models\Item;
use App\Models\Lot;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreItemRequest $request, ImageSaver $imageSaver)
    {
        $store = $request->validated();
        $image = $imageSaver->imageHelp($request, 'images/item');
        $store['image_name'] = $image;
        $lastLotNumber = Item::max('lot_number') ?? 9999999; // 9999999 is one less than 10000000

        $newLotNumber = $lastLotNumber + 1;


        $store['user_id'] = Auth::user()->id;
        $store['lot_number'] = $newLotNumber;
        $store['year_work_produced'] = date($request->year_work_produced);
        $sav = Item::create($store);

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        $lot = Lot::where('id',$item->lot_id)->first();
        $auction = Auction::where('id',$lot->auction_id)->first();

        return view('items.view-item', compact('item','lot','auction'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateItemRequest $request, Item $item)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $item->delete();

        return back();
    }
    public function  archiveItem(Item $item)
    {
        $up = $item->in_auction;
        if($up == 0){
            $item->update([
                'in_auction'=>1,
            ]);
        }
        else{
            $item->update([
                'in_auction'=>0,
            ]);
        }

        return back();
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAuctionRequest;
use App\Http\Requests\StoreLotRequest;
use App\Http\Requests\UpdateLotRequest;
use App\Models\Auction;
use App\Models\Item;
use App\Models\Lot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LotController extends Controller
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
    public function store(StoreLotRequest $request)
    {
        $lot = $request->validated();
        $lotCreate = Lot::create($lot);

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Lot $lot, Request $request)
    {
        if (Auth::user()->role == 'admin') {
            $items = Item::where('lot_id', $lot->id);
        }
        else{
            $items = Item::where('lot_id', $lot->id)->where('in_auction',1);
        }
        if($request->title){
            $items = $items->where('title', 'like', '%' . $request->title . '%');
        }
        if($request->category){
            $items = $items->where('category', $request->category);
        }
        if($request->name_of_artist){
            $items = $items->where('name_of_artist','like','%'. $request->name_of_artist.'%');
        }
        $items  = $items->latest()->get();

        $auction = Auction::where('id',$lot->auction_id)->first();
        return view('auction.auction-item-show', compact('auction', 'lot', 'items'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lot $lot)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLotRequest $request, Lot $lot)
    {
        $upLot = $request->validated();
        $upLot['updated_at'] = now();

        $update = $lot->update($upLot);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lot $lot)
    {
        $lot->delete();
        return back();
    }

    public function  archiveItem(Lot $lot)
    {
        $up = $lot->is_archive;
        if($up == 0){
            $lot->update([
                'is_archive'=>1,
            ]);
        }
        else{
            $lot->update([
                'is_archive'=>0,
            ]);
        }

        return back();
    }
}

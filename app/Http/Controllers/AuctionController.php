<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAuctionRequest;
use App\Http\Requests\UpdateAuctionRequest;
use App\Models\Auction;
use App\Models\Lot;
use Illuminate\Support\Facades\Auth;

class AuctionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::user()->role == 'admin'){
            $auction = Auction::latest()->get();
        }
        else{
            $auction = Auction::where('is_archive',1)->latest()->get();
        }
        return view('auction.index',compact('auction'));
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
    public function store(StoreAuctionRequest $request)
    {
        $auctionData = $request->validated();
        $createAuction = Auction::create($auctionData);

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Auction $auction)
    {
        if (Auth::user()->role == 'admin') {
            $lots = Lot::where('auction_id', $auction->id)->latest()->get();
        }
        else{
            $lots = Lot::where('auction_id', $auction->id)->where('is_archive',1)->latest()->get();
        }
        return view('auction.auction-show', compact('auction', 'lots'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Auction $auction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreAuctionRequest $request, Auction $auction)
    {
        $updateReq = $request->validated();
        $updateReq['updated_at'] = now();
        $update = $auction->update($updateReq);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Auction $auction)
    {
        $auction->delete();
        return back();
    }
    public function  archiveItem(Auction $auction)
    {
        $up = $auction->is_archive;
        if($up == 0){
            $auction->update([
                'is_archive'=>'1',
            ]);
        }
        else{
            $auction->update([
                'is_archive'=>'0',
            ]);
        }

        return back();
    }
}

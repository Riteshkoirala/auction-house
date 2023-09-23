<?php

use App\Http\Controllers\AuctionController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LotController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('auction',AuctionController::class);
    Route::resource('lot',LotController::class);
    Route::resource('items',ItemController::class);
    Route::get('update/item/{item}',[ItemController::class, 'archiveItem'])->name('item.up');
    Route::get('update/lot/{lot}',[LotController::class, 'archiveItem'])->name('lot.up');
    Route::get('update/auction/{auction}',[AuctionController::class, 'archiveItem'])->name('auction.up');

});

require __DIR__.'/auth.php';

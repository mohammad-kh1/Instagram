<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;



//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get("/" , \App\Livewire\Home::class)->name('home');
    Route::get("/explore" , \App\Livewire\Explore::class)->name('explore');


    Route::get("/profile/{user}" , \App\Livewire\Profile\Home::class)->name("profile.home");
    Route::get("/profile/{user}/reels" , \App\Livewire\Profile\Reels::class)->name("profile.reels");
    Route::get("/profile/{user}/saved" , \App\Livewire\Profile\Saved::class)->name("profile.saved");

});

require __DIR__.'/auth.php';

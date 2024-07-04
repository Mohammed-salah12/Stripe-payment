<?php

use App\Http\Controllers\DonationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/donate', [DonationController::class, 'showDonateForm'])->name('donate.form');
Route::post('/create-checkout-session', [DonationController::class, 'createCheckoutSession'])->name('checkout.session');


<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;    


Route::get('/', function () {
    return view('welcome');
});
Route::get('/home' ,[HomeController::class,"index"])->name("homepage");
// Route::get('/contact' ,[HomeController::class,"contact"])->name("contact");
Route::match(['get','post'],'/apply' ,[HomeController::class,"apply"])->name("apply");
Route::get('/courses' ,[HomeController::class,"courses"])->name("courses");
// Route::post("/online-payment/make-payment",[HomeController::class,"makePayment"])->name("makePayment");

// Route::match(["get","post"],'/online-payment' ,[HomeController::class,"onlinePayment"])->name("online-payment");
// Route::get('/online-payment-student', [HomeController::class, 'index2'])->name("online-payment");

Route::get('/online-payment', [HomeController::class, 'onlinePayment'])->name('online-payment');

Route::post("/online-payment/call-back",[HomeController::class,"store2"])->name("callback");



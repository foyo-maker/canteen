<?php

use App\Models\Voucher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GiftController;
use App\Http\Controllers\VoucherController;
use App\Http\Controllers\UserVoucherController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/
//protected route
//protected route
Route::group(['middleware' => ['auth:sanctum']], function () {
    //A route post to web service must be protected 
    Route::post('/users', [AuthController::class, 'store']);
    Route::get('/voucherDetail', [UserVoucherController::class, 'index']);
    Route::post('/userOwnVoucher', [UserVoucherController::class, 'store']);
    Route::get('/voucherDetail/{id}', [UserVoucherController::class, 'show']);
    Route::put('/voucherDetail/{id}', [UserVoucherController::class, 'update']);
    Route::get('/users', [AuthController::class, 'index']);
    Route::delete('/userUsedVoucher/{id}', [UserVoucherController::class, 'destroy']);
    Route::get('/memberGift', [GiftController::class, 'index']);
    Route::get('/memberGift/{id}', [GiftController::class, 'show']);
    Route::put('/memberGift/{id}', [GiftController::class, 'update']);
    
});




//Route::resource('vouchers',VoucherController::class);


Route::post('/generateToken', [AuthController::class, 'generateToken']);




Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/vouchers', [VoucherController::class, 'index']);
Route::get('/vouchers/{id}', [VoucherController::class, 'show']);



Route::get('/vouchers/search/{name}', [VoucherController::class, 'search']);

//protected route
Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::post('/vouchers', [VoucherController::class, 'store']);
    Route::put('/vouchers/{id}', [VoucherController::class, 'update']);
    Route::delete('/vouchers/{id}', [VoucherController::class, 'destroy']);


    Route::post('/logout', [AuthController::class, 'logout']);
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

<?php

use App\Http\Controllers\UserContoller;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user', [UserContoller::class, 'index']);
   
Route::put('/user/update', [UserContoller::class, 'update']);


Route::get('/update/{id}', [UserContoller::class, 'edit']);

Route::get('/delete/{id}', [UserContoller::class, 'delete']);
Route::get("/userUpdate", function(){
    return view("welcome");
 });

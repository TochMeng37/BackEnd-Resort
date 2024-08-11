<?php

use App\Http\Controllers\payments;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoomController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/get-all-room', [PostController::class, 'index']);
Route::get('/get-room/{id}', [PostController::class, 'getRoom']);
Route::post('/Room', [PostController::class, 'PostRoom']);


Route::post('/post-room',[RoomController::class, 'RoomRegisted']);
Route::get('/get-room-booking', [RoomController::class, 'getAllRooms']);
Route::get('/show/{id}', [RoomController::class, 'getRoomById']);

//payment
Route::post('/admin/post', [payments::class, 'admin']);

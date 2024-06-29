<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
// GET POST => method HTTP

Route::get('/',function(){
    echo 'Trang Chu';
});
Route::get('/test',function(){
    echo '123';
});


Route::get('/list-user',[UserController::class, 'showUser']);
Route::get('/thong-tin-sv',[UserController::class, 'thongTinSv']);

//params and Slup


// Slup 
// http://127.0.0.1:8000/get-user/1
Route::get('/get-user/{id}/{name?}',[UserController::class, 'getUser']);

// Params 
// http://127.0.0.1:8000/update-user?id=1&name=Phu
Route::get('/update-user',[UserController::class, 'updateUser']);


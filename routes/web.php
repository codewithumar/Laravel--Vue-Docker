<?php

use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/test', [TestController::class, 'test'])->name('test');
Route::get('/test2', [TestController::class, 'test2'])->name('test2');

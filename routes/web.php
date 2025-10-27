<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\BorrowRecordController;

Route::get('/', function () {
    return redirect()->route('categories.index');
});

Route::resource('categories', CategoryController::class);
Route::resource('books', BookController::class);
Route::resource('members', MemberController::class);
Route::resource('borrow-records', BorrowRecordController::class);

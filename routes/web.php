<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


//Route List
Route::get('/', [ProductController::class, 'products'])->name('Product');

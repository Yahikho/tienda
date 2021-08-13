<?php

use App\Http\Livewire\Admin\CreateProducts;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Admin\ShowProducts;

Route::get('/', ShowProducts::class)->name('admin.index');

Route::get('products/create', CreateProducts::class)->name('admin.products.create');

Route::get('products/{product}/edit', function () {
    
})->name('admin.products.edit');
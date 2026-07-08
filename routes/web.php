<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function(){ return view('about'); });
Route::get('/katalog', function(){ return view('katalog'); });
Route::get('/kontak', function(){ return view('kontak'); });
Route::get('/detail-produk', function () {
    return view('detail-produk');
});

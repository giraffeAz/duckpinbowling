<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('back.pages.login');
});

Route::view('/home','back.pages.home')->name('home');
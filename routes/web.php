<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('back.pages.login');
});

Route::view('/home','back.pages.home')->name('home');
Route::view('/setup','back.pages.setup')->name('setup');
Route::view('/organize','back.pages.organize')->name('organize');
Route::view('/player-registration','back.pages.playerreg')->name('player-registration');
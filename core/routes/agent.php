<?php

use Illuminate\Support\Facades\Route;

Route::namespace('Auth')->group(function () {
    // Login Controller
    Route::controller('LoginController')->group(function(){
        Route::get('/login', 'showLoginForm')->name('login');
        Route::post('/login', 'login')->name('login');
        Route::get('logout', 'logout')->middleware('auth')->name('logout');
    });
});

Route::controller('AgentController')->group(function(){
    Route::get('/dashboard', 'dashboard')->name('dashboard');
});

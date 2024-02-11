<?php

use Illuminate\Support\Facades\Route;

Route::namespace('Auth')->name('agent.')->group(function () {
    // Login Controller
    Route::controller('LoginController')->group(function(){
        Route::get('/login', 'showLoginForm')->name('login');
        Route::post('/login', 'login');
        Route::get('logout', 'logout')->middleware('auth')->name('logout');
    });

});

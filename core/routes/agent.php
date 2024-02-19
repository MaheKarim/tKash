<?php

use Illuminate\Support\Facades\Route;

Route::namespace('Agent\Auth')->name('agent.')->group(function () {
    // Login Controller
    Route::controller('LoginController')->group(function () {
        Route::get('/login', 'showLoginForm')->name('login');
        Route::post('/login', 'login');
        Route::get('logout', 'logout')->middleware('auth')->name('logout');
    });
});

Route::middleware('agent')->group(function () {
    Route::controller('Agent\AgentController')->group(function () {
        Route::get('/dashboard', 'dashboard')->name('dashboard');
    });
});

<?php

use Illuminate\Support\Facades\Route;

Route::namespace('Agent\Auth')->name('agent.')->group(function () {
    // Login Controller
    Route::controller('LoginController')->group(function () {
        Route::get('/login', 'showLoginForm')->name('login');
        Route::post('/login', 'login')->name('login');
        Route::get('logout', 'logout')->name('logout');
    });
});
//Route::controller('ManageAgentController')->namespace('Agent')->name('agent.')->group(function () {
//    Route::get('/dashboard', 'dashboard')->name('dashboard');
//});
Route::middleware(['agentCheckStatus'])->group(function () {
    Route::middleware('allowAgentRegistrationStep')->namespace('Agent')->group(function () {
        Route::controller('AgentController')->name('agent.')->group(function () {
            Route::get('/dashboard', 'dashboard')->name('dashboard');
        });
    });
});

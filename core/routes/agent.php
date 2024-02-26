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

Route::middleware(['agentCheckStatus'])->group(function () {
    Route::middleware('allowAgentRegistrationStep')->namespace('Agent')->group(function () {
        Route::controller('AgentController')->name('agent.')->group(function () {
            Route::get('/dashboard', 'dashboard')->name('dashboard');
            Route::get('transactions', 'transactions')->name('transactions');
        });

        Route::controller('AgentSupportTicketController')->prefix('ticket')->name('agent.ticket.')->group(function () {
            Route::get('/', 'supportTicket')->name('index');
            Route::get('new', 'openSupportTicket')->name('open');
            Route::post('create', 'storeSupportTicket')->name('store');
            Route::get('view/{ticket}', 'viewTicket')->name('view');
            Route::post('reply/{ticket}', 'replyTicket')->name('reply');
            Route::post('close/{ticket}', 'closeTicket')->name('close');
            Route::get('download/{ticket}', 'ticketDownload')->name('download');
        });
        // Cash In Controller
        Route::controller('CashInController')->name('agent.cashIn.')->group(function () {
            Route::get('/cashIn', 'index')->name('index');
            Route::post('/cashIn/store', 'store')->name('store');
        });
    });
    // AddMoney Controller
    Route::controller('Gateway\PaymentController')->name('agent.addMoney.')->group(function () {
        Route::get('/', 'deposit')->name('deposit');
        Route::post('insert', 'depositInsert')->name('depositInsert');
        Route::get('confirm', 'depositConfirm')->name('confirm');
    });

    // WithDraw Controller
    Route::controller('Agent\WithdrawMoneyController')->name('agent.withdraw.')->group(function () {
        Route::get('/withdraw', 'index')->name('index');
        Route::post('/withdraw/store', 'store')->name('money');
    });
});

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\Admin\AdminTicketController;

Route::get('/', function () {
    return view('welcome');
});

// jangan delete, routes untuk login logout register
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(['auth'])->group(function () {
    // tambah routes dalam ni kalau perlu login dulu

    Route::get('/test', function() {
        echo "Test route is working!";
    });

    Route::get('/tickets', [TicketController::class, 'index'])->name('tickets.index');
    Route::get('/tickets/create', [TicketController::class, 'create'])->name('tickets.create');
    Route::post('/tickets', [TicketController::class, 'store'])->name('tickets.store');

    // route untuk admin user
    Route::group(['middleware' => ['role:admin'], 'prefix' => 'admin'], function () {
        
        Route::get('/testadmin', function() {
            echo "Test admin route is working!";
        });

        Route::get('/tickets', [AdminTicketController::class, 'index'])->name('admin.tickets.index');
        Route::put('/tickets/{ticket}/close', [AdminTicketController::class, 'close'])->name('admin.tickets.close');
    });

});



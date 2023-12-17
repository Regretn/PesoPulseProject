<?php

use App\Http\Controllers\FinanceController;
use App\Http\Controllers\FinanceLogController;
use App\Livewire\FinanceComponent;
use App\Livewire\FinanceForm;
use App\Livewire\FinanceLog;
use App\Livewire\FinancePost;
use App\Livewire\UpdateComponent;
use Illuminate\Support\Facades\Route;
use App\Livewire\Counter;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/add', function () {
        return view('add');
    })->name('add');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/historylog', function () {
        return view('historylog');
    })->name('historylog');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/message', function () {
        return view('message');
    })->name('message');
});

Route::get('/finance-post', FinancePost::class)->name('finance-post');

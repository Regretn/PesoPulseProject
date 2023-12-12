<?php

use App\Http\Controllers\FinanceController;
use App\Http\Controllers\FinanceLogController;
use App\Livewire\Counter;
use App\Livewire\FinanceComponent;
use App\Livewire\FinanceForm;
use App\Livewire\FinanceLog;
use App\Livewire\FinancePost;
use App\Livewire\UpdateComponent;
use Illuminate\Support\Facades\Route;

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

Route::get('/counter', Counter::class);
Route::get('/finance-component', FinanceComponent::class);
Route::get('/finance-log', FinanceLog::class)->name('finance.log');

Route::get('/finance-post', FinancePost::class)->name('finance-post');
Route::get('/finance/create', [FinanceController::class, 'create'])->name('finance.create');

Route::post('/finance/store', [FinanceController::class, 'store'])->name('finance.store');

Route::post('/finances', [FinanceController::class, 'destroy'])->name('finances.destroy');

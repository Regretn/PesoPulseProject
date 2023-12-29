<?php

use App\Http\Controllers\FinanceController;
use App\Http\Controllers\FinanceLogController;
use App\Http\Livewire\MindeeComponent;
use App\Livewire\ExcelReader;
use App\Livewire\FinanceComponent;
use App\Livewire\FinanceForm;
use App\Livewire\FinanceLog;
use App\Livewire\FinancePost;
use App\Livewire\UpdateComponent;
use Illuminate\Support\Facades\Route;
use App\Livewire\Counter;
use App\Livewire\Transaction;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/file-upload', function () {
        return view('file-upload');
    })->name('file-upload'); 
});

Route::get('/finance-post', FinancePost::class)->name('finance-post');
Route::get('/transaction', Transaction::class);


Route::get('/excel-reader', ExcelReader::class);
Route::get('/excel-readers', ExcelReader::class)->name('livewire.excel-reader');


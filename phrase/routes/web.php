<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FolderController;
use App\Http\Controllers\PhraseUserController;
use App\Http\Controllers\CardController;

Route::get('/', function () {
    return redirect()->route('login');
});

// folder
Route::prefix('folder')->middleware(['auth'])
        ->controller(FolderController::class)
        ->name('folder.')
        ->group(function(){
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/', 'store')->name('store');
            Route::get('/{id}/show', 'show')->name('show');
            Route::get('/{id}/edit', 'edit')->name('edit');
            Route::put('/{id}/update', 'update')->name('update');
            Route::delete('/{id}', 'destroy')->name('destroy');
        });
//card
Route::prefix('card')->middleware(['auth'])
        ->controller(CardController::class)
        ->name('card.')
        ->group(function(){
            Route::get('{folder_id}/create', 'create')->name('create');
            Route::post('{folder_id}', 'store')->name('store');
            Route::get('{folder_id}/show', 'show')->name('show');
            Route::get('/{folder_id}/edit', 'edit')->name('edit');
            Route::put('/{id}/update', 'update')->name('update');
            Route::delete('/{id}', 'destroy')->name('destroy');
            Route::get('{folder_id}/search', 'search')->name('search');
        });

//認証ルーティング
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

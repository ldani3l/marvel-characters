<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\CharacterController;

/** URL'S LOGIN **/
Route::get('dashboard', [CustomAuthController::class, 'dashboard']);
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');

Route::get('/', [CharacterController::class, 'index'])->name('character.index');
Route::get('look-for', [CharacterController::class, 'lookFor'])->name('character.look-for');
Route::post('find', [CharacterController::class, 'find'])->name('character.find');

/** URL'S Personajes **/
Route::group(['prefix' => 'character', 'middleware' => ['auth']], function () {
    Route::get('store/{idMarvel}', [CharacterController::class, 'store'])->name('character.store');
    Route::get('edit/{character}', [CharacterController::class, 'edit'])->name('character.edit');
    Route::put('update/{character}', [CharacterController::class, 'update'])->name('character.update');
    Route::delete('destroy/{character}', [CharacterController::class, 'destroy'])->name('character.destroy');
});

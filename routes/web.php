<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/over-ons', [PageController::class, 'overOns'])->name('over-ons');
Route::get('/onderzoek', [PageController::class, 'onderzoek'])->name('onderzoek');
Route::get('/toekomst', [PageController::class, 'toekomst'])->name('toekomst');

Route::get('/contact', [ContactController::class, 'create'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

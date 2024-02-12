<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;


//Common resource routes
//index - show all listings
//show - show single listing
//create - show from to create new listing
//store - store new listing
//edit - show from to edit listing
//update - update listing
//destroy - dekete listing

// All listings
Route::get('/', [ListingController::class, 'index']);

//show create form
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');

//Store listing data
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');

//Show Edit form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

//Update listing
Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');

//Delete listing
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth');

//Manage listings
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');

//Single listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);

// show register/create form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

//Create New user
Route::post('/users', [UserController::class, 'store']);

//Logout user
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

//show login form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

//Log in user
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

// Route::get('/run-migration', function () {
//     Artisan::call('optimize:clear');
//     Artisan::call('migrate:fresh --seed');

//     return "Migrations executed successfully";
// });

// Route::get('/hello', function () {
//     return response('<h1>hello world</h1>', 200)
//         ->header('Content-Type', 'text/plan')
//         ->header('foo', 'bar');
// });
// Route::get('/posts/{id}', function ($id) {
//     //ddd($id); //Dump, Die, Debug
//     return response('Post ' . $id);
// })->where('id', '[0-9]+');

// Route::get('/search', function (Request $request) {
//     return $request->name . ' ' . $request->city;
// });

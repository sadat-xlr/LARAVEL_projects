<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeIspabController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/admin', function () {
    return view('home');
})->middleware('auth');
///notice section////

Route::post('/addNotice', [HomeIspabController::class, 'storeNotice'])->name('store.notice');
Route::get('/listNotice', [HomeIspabController::class, 'listNotice'])->name('list.notice');

///end notice section////

///News section////

Route::post('/addNews', [HomeIspabController::class, 'storeNews'])->name('store.news');
Route::get('/listNews', [HomeIspabController::class, 'listNews'])->name('list.news');

///end News section////

///Service section////

Route::post('/addServices', [HomeIspabController::class, 'storeService'])->name('store.service');
Route::get('/listServices', [HomeIspabController::class, 'listServices'])->name('list.service');

///end Service section////

///Events section////

Route::post('/addEvents', [HomeIspabController::class, 'storeEvent'])->name('store.event');
Route::get('/listEvents', [HomeIspabController::class, 'listEvent'])->name('list.event');

///end Events section////

///Memeber section////
Route::get('/addMember', [HomeIspabController::class, 'createMember'])->name('create.member');
Route::post('/addMember', [HomeIspabController::class, 'storeMember'])->name('store.member');
Route::get('/listMembers', [HomeIspabController::class, 'listMembers'])->name('list.member');

///end members section////
///gallery  section////
Route::get('/addImage', [HomeIspabController::class, 'addImage'])->name('create.image');
Route::post('/addImage', [HomeIspabController::class, 'gallery'])->name('store.image');
Route::get('/listImages', [HomeIspabController::class, 'listImages'])->name('list.image');

///end gallery section////
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

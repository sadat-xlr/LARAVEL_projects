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

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');
///notice section////
Route::get('/addNotice', [HomeIspabController::class, 'createNotice'])->name('create.notice');
Route::post('/addNotice', [HomeIspabController::class, 'storeNotice'])->name('store.notice');
Route::get('/listNotice', [HomeIspabController::class, 'listNotice'])->name('list.notice');

///end notice section////

///News section////
Route::get('/addNews', [HomeIspabController::class, 'createNews'])->name('create.news');
Route::post('/addNews', [HomeIspabController::class, 'storeNews'])->name('store.news');
Route::get('/listNews', [HomeIspabController::class, 'listNews'])->name('list.news');

///end News section////

///Service section////
Route::get('/addServices', [HomeIspabController::class, 'createService'])->name('create.service');
Route::post('/addServices', [HomeIspabController::class, 'storeService'])->name('store.service');
Route::get('/listServices', [HomeIspabController::class, 'listServices'])->name('list.service');

///end Service section////

///Events section////
Route::get('/addEvents', [HomeIspabController::class, 'createEvent'])->name('create.event');
Route::post('/addEvents', [HomeIspabController::class, 'storeEvent'])->name('store.event');
Route::get('/listEvents', [HomeIspabController::class, 'listEvent'])->name('list.event');

///end Events section////

///Memeber section////
Route::get('/addMember', [HomeIspabController::class, 'createMember'])->name('create.member');
Route::post('/addMember', [HomeIspabController::class, 'storeMember'])->name('store.member');
Route::get('/listMember', [HomeIspabController::class, 'listMembers'])->name('list.member');

///end members section////
///gallery  section////
Route::get('/addImage', [HomeIspabController::class, 'addImage'])->name('create.image');
Route::post('/addImage', [HomeIspabController::class, 'gallery'])->name('store.image');
Route::get('/listImages', [HomeIspabController::class, 'listImages'])->name('list.image');

///end gallery section////
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PageController;
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


/* AUTHENTICATION ROUTES */ 
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/auth', [LoginController::class, 'authenticate']);

/* DASHBOARD ROUTES */

Route::get('/dashboard/news', [AdminController::class, 'news'])->middleware('auth:admins');
Route::get('/dashboard/public_procurements', [AdminController::class, 'show_public_procurements'])->middleware('auth:admins');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/dashboard/add_news', [AdminController::class, 'show_add_news'])->middleware('auth:admins');
Route::post('/store_news', [AdminController::class, 'store_news'])->name('store_news');
Route::get('/edit_news', [AdminController::class, 'edit_news'])->name('edit_news');
Route::delete('/news/{id}', [AdminController::class, 'destroy'])->name('delete_news');
Route::get('/news/{id}/edit', [AdminController::class, 'edit'])->name('edit_news');
Route::put('/news/{id}', [AdminController::class, 'update'])->name('update_news');
Route::get('/dashboard/admins', [AdminController::class, 'show_admins']);
Route::get('/search', [AdminController::class, 'search'])->name('news_search');
Route::get('/dashboard/categories', [AdminController::class, 'show_categories']);
Route::get('/dashboard/categories/add', [AdminController::class, 'add_categories']);
Route::post('/store_categories', [AdminController::class, 'store_categories'])->name('store_categories');
Route::get('/dashboard/categories/{id}/edit', [AdminController::class, 'show_edit_categories'])->name('show_edit_categories');
Route::put('/categories/{id}/edit', [AdminController::class, 'edit_categories'])->name('edit_categories');
Route::delete('/categories/{id}', [AdminController::class, 'destroy_categories'])->name('delete_categories');


/* FRONTEND ROUTES */  

Route::get('/', [PageController::class, 'home']);
Route::get('/istorijat', [PageController::class, 'history']);
Route::get('/arheologija', [PageController::class, 'archaeology']);
Route::get('/vesti', [NewsController::class, 'get_news']);
Route::get('/vesti/{id}', [NewsController::class, 'show_news'])->name('news.show');
Route::get('/vesti/kategorija/{categoryId}', [NewsController::class, 'showNewsByCategory'])->name('news.category');

// Route::get('/vesti/{category}', [NewsController::class, 'showByCategory'])->name('news.category');
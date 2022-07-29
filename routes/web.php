<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TransactionController;

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

Route::get('/', [App\Http\Controllers\RootController::class, 'welcome']);
Route::get('/{string}', [App\Http\Controllers\SearchController::class, 'zoomsearchstring']);
Route::get('/rand/{url}', [App\Http\Controllers\RootController::class, 'rand']);
Route::get('/s/search', [App\Http\Controllers\SearchController::class, 'zoomsearchget']);
Route::post('/zs/post', [App\Http\Controllers\SearchController::class, 'zoomsearch']);
Route::get('/s/total', [App\Http\Controllers\RootController::class, 'total']);
Route::get('/tags/{string}', [App\Http\Controllers\RootController::class, 'tagstringredirect']);
Route::get('/s/gtrend', [App\Http\Controllers\AutomaticController::class, 'gtrend']);
Route::get('/s/gtrend24', [App\Http\Controllers\AutomaticController::class, 'gtrend24']);
Route::get('/s/kmker', [App\Http\Controllers\AutomaticController::class, 'keyword_maker']);
Route::get('/s/getwp/{url}/{end}', [App\Http\Controllers\AutomaticController::class, 'get_urls']);
Route::get('/s/geturlcontent', [App\Http\Controllers\AutomaticController::class, 'get_url_content']);
Route::get('/s/sexy', [App\Http\Controllers\AutomaticController::class, 'sexy']);
Route::get('/s/txtkey', [App\Http\Controllers\AutomaticController::class, 'txtkeywordmaker']);
Route::get('/s/rj', [App\Http\Controllers\AutomaticController::class, 'rj']);
Route::get('/s/wnumber', [App\Http\Controllers\AutomaticController::class, 'wnumber']);
Route::post('/s/add_wnumber', [App\Http\Controllers\AutomaticController::class, 'add_wnumberpost']);
Route::get('/s/gwnumber', [App\Http\Controllers\AutomaticController::class, 'gwnumber']);
Route::get('/s/getdburls', [App\Http\Controllers\AutomaticController::class, 'getdburls']); 
Route::get('/s/getallwebsite/{num}', [App\Http\Controllers\AutomaticController::class, 'getallwebsite']); 




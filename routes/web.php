<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\FeatureController;

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

 Route::get('/',[UserController::class,'index']);
 Route::get('posts',[PostController::class,'index'])->name('posts.index');
 Route::get('features',[FeatureController::class,'index'])->name('features.index');
 Route::get('features/{feature}',[FeatureController::class,'show'])->name('feature.show');
Route::get('members',[MemberController::class,'index'])->name('members.index');


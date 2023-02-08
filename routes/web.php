<?php

  use App\Http\Controllers\{FavoritesController, ProfilesController, ReplyController, ThreadController};
  use Illuminate\Support\Facades\Route;

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
  });

  Route::get('/threads', [ThreadController::class, 'index']);
  Route::get('/threads/create', [ThreadController::class, 'create']);
  Route::get('/threads/{channel}/{thread}', [ThreadController::class, 'show']);
  Route::delete('/threads/{channel}/{thread}', [ThreadController::class, 'destroy']);
  Route::post('/threads', [ThreadController::class, 'store']);

  Route::get('/threads/{channel}', [ThreadController::class, 'index']);
  Route::post('/threads/{channel}/{thread}/replies', [ReplyController::class, 'store']);

  Route::post('/replies/{reply}/favorites', [FavoritesController::class, 'store']);

  Route::get('/profiles/{user}', [ProfilesController::class, 'show']);



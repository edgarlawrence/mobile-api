<?php

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\StokController;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


// Route::get('/posted', [ApiController::class, 'index']);
// Route::post('/posted', [ApiController::class, 'store']);
// Route::put('/posted/{posteddd}', [ApiController::class, 'update']);
// Route::delete('/posts/{posteddd}', [ApiController::class, 'destroy']);



// Route::resource('posted', ApiController::class);
// Route::get('/posted/search/{nama_produk}', [ApiController::class, 'search']);

// Route::group(['middleware' => 'cors'], function() {
//     // Route::resource('posted', ApiController::class);
//     // // Route::get('/posted/search/{nama_produk}', [ApiController::class, 'search']);

//     // Route::resource('category', KategoriController::class);
//     // Route::get('/category/search/{nama_produk}', [KategoriController::class, 'search']);

//     // Route::resource('stock', StokController::class);
//   });

  Route::post('/register', [AuthController::class, 'register']);
  Route::post('/login', [AuthController::class, 'login']);

//   Route::post('posted/{posted}', [ApiController::class, 'update']);

  Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::resource('posted', ApiController::class);
    Route::get('/posted/search/{nama_produk}', [ApiController::class, 'search']);

    Route::resource('category', KategoriController::class);
    Route::get('/category/search/{nama_produk}', [KategoriController::class, 'search']);

    Route::resource('stock', StokController::class);

      Route::post('/logout', [AuthController::class, 'logout']);
  });


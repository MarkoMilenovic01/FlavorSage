<?php

use App\Models\User;
use App\Models\Recipe;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RecipeController;

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

// // Klasican index i show (index mi pokazuje sve recepte)
// Route::get('/', [RecipeController::class, 'index']);



// // Create
// Route::get('/recipes/create', [RecipeController::class , 'create'])->middleware('auth');

// Route::post('/recipes', [RecipeController::class, 'store'])->middleware('auth');

// //Update

// Route::get('/recipes/{id}/edit', [RecipeController::class, 'edit'])->middleware('auth');

// Route::put('/recipes/{id}', [RecipeController::class, 'update'])->middleware('auth');

// // Delete

// Route::delete('/recipes/{id}', [RecipeController::class , 'destroy'])->middleware('auth');

// //Manage
// Route::get('/recipes/manage', [RecipeController::class , 'manage'])->middleware('auth');


// // Show prikazuje samo jedan recept
// Route::get('/recipes/{id}',[RecipeController::class, 'show']);


// // Useri

// Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// Route::post('/users', [UserController::class, 'store'])->middleware('guest');

// Route::post('/logout', [UserController::class , 'logout'])->middleware('auth');

// Route::get('/login', [UserController::class , 'login'])->name('login')->middleware('guest');

// Route::post('/authenticate', [UserController::class , 'authenticate']);





// Nova verzija : CHATGPT generisana (radio je preko group ali ne kapiram uopste), malo ja (modifikacije)

Route::get('/', [RecipeController::class, 'index']);
Route::get('/recipes/{id}', [RecipeController::class,'show'])->where('id', '[0-9]+');
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
Route::post('/authenticate', [UserController::class, 'authenticate'])->middleware('guest');
Route::get('/register', [UserController::class, 'create'])->middleware('guest');
Route::put('/users/{id}', [UserController::class , 'promoteDemote'])->where('id', '[0-9]+')->middleware('auth');
Route::post('/users', [UserController::class, 'store'])->middleware('guest');
Route::post('/logout', [UserController::class , 'logout'])->middleware('auth');


Route::get('/recipes/{id}/edit', [RecipeController::class, 'edit'])->middleware('auth');
Route::put('/recipes/{id}', [RecipeController::class, 'update'])->middleware('auth');
Route::delete('/recipes/{id}', [RecipeController::class , 'destroy'])->middleware('auth');
Route::get('/recipes/create', [RecipeController::class , 'create'])->middleware('auth');
Route::post('/recipes', [RecipeController::class, 'store'])->middleware('auth');
Route::get('/recipes/manage', [RecipeController::class, 'manage'])->middleware('auth');

Route::get('/admin/dashboard', [UserController::class, 'dashboard'])->middleware('auth'); 
// Route::get('/admin/download/excel', [ExportController::class, 'excel'])->middleware('auth');
// Route::get('/admin/download/pdf', [ExportController::class, 'pdf'])->middleware('auth');










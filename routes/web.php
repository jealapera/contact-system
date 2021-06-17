<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Models\Contact;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [App\Http\Controllers\ContactController::class, 'index'])->name('home');
Route::get('contact/create', [App\Http\Controllers\ContactController::class, 'create']);
Route::post('contact', [App\Http\Controllers\ContactController::class, 'store']);
Route::get('contact/{contact}/edit', [App\Http\Controllers\ContactController::class, 'edit']);
Route::get('contact/{contact}', [App\Http\Controllers\ContactController::class, 'show']);
Route::put('contact/{contact}', [App\Http\Controllers\ContactController::class, 'update']);
Route::delete('contact/{contact}', [App\Http\Controllers\ContactController::class, 'destroy']);

Route::get('/convert-to-json', function() {
    return Contact::paginate(8);
});

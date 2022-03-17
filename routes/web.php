<?php

use App\Http\Controllers\PeticaoController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function(){

    Route::prefix('peticao')->group(function(){
        $controller = PeticaoController::class;
        Route::get('/', [$controller,'view'])->name('peticao');
        Route::post('create', [$controller,'create']);
        Route::get('list', [$controller,'list']);
        Route::put('update', [$controller,'update']);
        Route::put('delete', [$controller,'delete']);
    });
});

require __DIR__.'/auth.php';

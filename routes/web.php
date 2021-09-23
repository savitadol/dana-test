<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UrlController;
use App\Models\Url;
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
    return redirect('login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    Route::resource('url', UrlController::class)->only([
        'index', 'store'
    ]);
});



require __DIR__.'/auth.php';

Route::get('/{url:slug}', [UrlController::class,'destination'])->name('destination');

<?php

use Illuminate\Http\Request;
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

Route::get('/dashboard', function (Request $request) {
    $data = [
        'tokens' => \App\Models\PersonalAccessToken::where('tokenable_id', $request->user()->id)->get()
    ];
    return view('dashboard', $data);
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\uploadFile;

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

/*Route::get('/', function () {
    return view('upload');
});
*/

route::get('/Alinks',[uploadFile::class,'getTablOflinks'])->name('AktivLinks');
route::get('/alllinks',[uploadFile::class,'getTableOfAllLinks'])->name('AllLinks');
route::get('/',[uploadFile::class,'upload'])->name('home');
route::post('/',[uploadFile::class,'upload']);


<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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


Route::post('send', function(Request $request) {
    $file = $request->file('file');   
    $filename = $file->getClientOriginalName();     
    $contents = file_get_contents($file);
    Storage::disk('google')->put( $filename,$contents);

    return redirect('/')->with('message', 'Archivo subido');
})->name("upload");
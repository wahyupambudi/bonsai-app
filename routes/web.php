<?php

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

// Admin
// Route::get('/admin', function () {
//     return view('admin/index');
// });

// Route::get('/login', function () {
//     return view('admin/login');
// });

// Route::get('/signup', function () {
//     return view('admin/signup');
// });


// 
Route::get('/', function () {
    return view('beranda');
});

Route::get('/about', function () {
    return view('about');
});


Route::get('/produk', function () {
    return view('singleproduk');
});

Route::get('/blog', function () {
    return view('singleblog');
});

Route::get('/detail', function () {
    return view('detail');
});

Route::get('/cara-pemesanan', function () {
    return view('cara-pemesanan');
});

// Route::get('/login', 'ProdukController@cok');
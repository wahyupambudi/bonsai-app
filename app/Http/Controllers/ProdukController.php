<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facedes\DB;

class ProdukController extends Controller
{
    public function cok() {
        $nama = "Diki Alfarabi Hadi";
    	return view('produk',['nama' => $nama]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeminjamanController extends Controller
{
    public function index()
    {
        return DB::transaction(function() {

            $data["peminjaman"] = Transaksi::get();

            return view("page.peminjaman", $data);

        });
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\ManajemenMobil;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AppController extends Controller
{
    public function layouts()
    {
        return view("page.layouts.main");
    }

    public function transaksi($id)
    {
        $data["id_mobil"] = $id;
        return view("page.landing.transaksi", $data);
    }

    public function home()
    {
        $data['mobil'] = ManajemenMobil::get();

        return view("page.landing.home", $data);
    }

    public function dashboard()
    {
        $data["user"] = User::where("role", "user")->where("status", "1")->count();
        $data["admin"] = User::where("role", "admin")->where("status", "1")->count();
        $data["mobil"] = ManajemenMobil::count();

        return view("page.content.dashboard", $data);
    }

    public function post_transaksi(Request $request)
    {
        return DB::transaction(function() use ($request) {
            $transaksi = Transaksi::create([
                "tanggal_mulai" => $request->tanggal_mulai,
                "tanggal_selesai" => $request->tanggal_selesai,
                "mobil_id" => $request->mobil_id,
                "status" => "1"
            ]);

            Session::put("transaksi", $transaksi->id_transaksi);

            if (empty(Auth::user())) {
                return redirect("/login");
            } else {
                return redirect("/");
            }
        });
    }
}

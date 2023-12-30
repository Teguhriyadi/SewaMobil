<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AuthenticationController extends Controller
{
    public function login()
    {
        return view("page.authentication.login");
    }

    public function post(Request $request)
    {
        return DB::transaction(function() use ($request) {

            $cek = User::where("email", $request->email)->first();

            if ($cek) {
                if ($cek->status == "1") {
                    if (Auth::attempt(["email" => $request->email, "password" => $request->password])) {

                        $cek = User::where("email", $request->email)->first();

                        if ($cek->role == "admin") {
                            return redirect("/dashboard");
                        } else if ($cek->role == "user") {

                            $id_transaksi = Session::get("transaksi");

                            Transaksi::where("id_transaksi", $id_transaksi)->update([
                                "user_id" => Auth::user()->id
                            ]);

                            session()->forget("transaksi");

                            return redirect("/home");
                        }
                    }
                } else {
                    return redirect("/login");
                }
            } else {
                return redirect("/login");
            }

        });
    }

    public function daftar()
    {
        return view("page.authentication.daftar");
    }

    public function post_daftar(Request $request)
    {
        return DB::transaction(function() use ($request) {
            User::create([
                "nama" => $request->nama,
                "email" => $request->email,
                "password" => bcrypt($request->password),
                "alamat" => $request->alamat,
                "nomor_telepon" => $request->nomor_telepon,
                "nomor_sim" => $request->nomor_sim,
                "role" => "user"
            ]);

            return redirect("login");
        });
    }

    public function logout()
    {
        return DB::transaction(function() {
            Auth::logout();

            return redirect("/login");
        });
    }
}

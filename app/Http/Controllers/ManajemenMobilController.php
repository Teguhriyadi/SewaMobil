<?php

namespace App\Http\Controllers;

use App\Models\ManajemenMobil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ManajemenMobilController extends Controller
{
    public function index()
    {
        $data["mobil"] = ManajemenMobil::where("user_id", Auth::user()->id)->get();

        return view("page.landing.manajemen-mobil.index", $data);
    }

    public function manajamen()
    {
        $data["mobil"] = ManajemenMobil::get();

        return view("page.manajemen-mobil.index", $data);
    }

    public function create()
    {
        return view("page.landing.manajemen-mobil.create");
    }

    public function store(Request $request)
    {
        return DB::transaction(function () use ($request) {
            ManajemenMobil::create([
                "merek" => $request->merek,
                "model" => $request->model,
                "nomor_plat" => $request->nomor_plat,
                "tarif" => $request->tarif,
                "user_id" => Auth::user()->id
            ]);

            return back();
        });
    }

    public function edit($id_mobil)
    {
        return DB::transaction(function() use ($id_mobil) {

            $data["edit"] = ManajemenMobil::where("id_manajemen", $id_mobil)->first();

            return view("page.landing.manajemen-mobil.edit", $data);
        });
    }

    public function update(Request $request, $id_mobil)
    {
        return DB::transaction(function() use ($request, $id_mobil) {
            ManajemenMobil::where("id_manajemen", $id_mobil)->update([
                "merek" => $request->merek,
                "model" => $request->model,
                "nomor_plat" => $request->nomor_plat,
                "tarif" => $request->tarif
            ]);

            return back();
        });
    }

    public function destroy($id_mobil)
    {
        return DB::transaction(function() use ($id_mobil) {
            ManajemenMobil::where("id_manajemen", $id_mobil)->delete();

            return back();
        });
    }
}

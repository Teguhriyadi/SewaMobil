<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $data['user'] = User::where("role", "user")->get();

        return view("page.user.index", $data);
    }

    public function aktifkan($id)
    {
        return DB::transaction(function() use ($id) {
            User::where("id", $id)->update([
                "status" => "1"
            ]);

            return back();
        });
    }

    public function non_aktifkan($id)
    {
        return DB::transaction(function() use ($id) {
            User::where("id", $id)->update([
                "status" => "0"
            ]);

            return back();
        });
    }
}

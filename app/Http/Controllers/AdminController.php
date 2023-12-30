<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $data["administrator"] = User::where("role", "admin")->get();

        return view("page.administrator.index", $data);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\LuwesData;

class AdminController extends Controller
{
    public function index()
    {
        // $luwesData = DB::table('luwes_data')->orderByDesc('no')->get();
        // return view('admin.dashboard', compact('luwesData'));

        return view('admin.dashboard');
    }

    public function userlist()
    {
        return view('admin.manageuser');
    }
}

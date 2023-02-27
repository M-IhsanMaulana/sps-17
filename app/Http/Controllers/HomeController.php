<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Pengaduan;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $id = Auth()->user()->id;
        $pengaduan = Pengaduan::where('user_id', $id)->get();

        return view('users.dashboard', compact('pengaduan'));
    }

    public function petugasHome()
    {
        return view('petugas.home');
    }

    public function adminHome()
    {
        $userdata = User::all();
        $category = Category::all();
        $pengaduan = Pengaduan::all();
        return view('admin.dashboard', compact('userdata', 'category', 'pengaduan'));
    }
}

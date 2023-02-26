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
        return view('welcome');
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

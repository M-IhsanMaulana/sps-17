<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function buatPengaduan()
    {
        $data = Category::all();
        return view('users.buat-pengaduan', compact('data'));
    }

    public function postPengaduan(Request $request)
    {
        $this->validate($request, [
            'nama_pengadu' => 'required',
            'tipe_pengadu' => 'required',
            'category_id' => 'required',
            'judul_pengaduan' => 'required',
            'detail_pengaduan' => 'required|min:7',
            'tgl_pengaduan' => 'required',
        ]);

        $file = $request->file('bukti_pengaduan');
        $filename = $request->file('bukti_pengaduan')->getClientOriginalName();
        $file->move('public/data-image',$filename);

        $laporan = [
            'user_id' => Auth()->user()->id,
            'nama_pengadu' => $request->nama_pengadu,
            'tipe_pengadu' => $request->tipe_pengadu,
            'category_id' => $request->category_id,
            'judul_pengaduan' => $request->judul_pengaduan,
            'detail_pengaduan' => $request->detail_pengaduan,
            'tgl_pengaduan' => $request->tgl_pengaduan,
            'bukti_pengaduan' => $filename
        ];


        $pengaduan = Pengaduan::create($laporan);
        $pengaduan->save();
        return redirect()->route('user.home')->with('success', 'Berhasil');
    }

    public function datapengaduan()
    {
        $id = Auth()->user()->id;
        $data = Pengaduan::where('user_id', $id)->get();
        return view('users.dat-pengaduan', compact('data'));
    }

    public function detailPengaduan($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        return view('users.detail', compact('pengaduan'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Pengaduan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //Get Tampilan Controller
    public function pengaduanData()
    {
        $data = Pengaduan::with(['category', 'user'])->paginate(10);
        //ddd($data);
        //$paginate = Pengaduan::paginate(2);
        return view('admin.datapengaduan', compact('data'));
    }

    public function userData()
    {
        $data = User::all();
        return view('admin.datauser', compact('data'));
    }

    public function categoryData()
    {
        $data = Category::all();
        return view('admin.datacategory', compact('data'));
    }

    public function detailPengaduan($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        return view('admin.detail-pengaduan', compact('pengaduan'));
    }
    //CREATE DATA FOR ADMIN
    public function createUser(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'username' => ['required', 'unique:users,username'],
            'password' => ['required', 'min:7'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);
        $user->save();

        return redirect()->route('admin.data-user')->with('success', 'Berhasil Menambahkan data');
    }

    public function createCategory(Request $request)
    {
        $this->validate($request, ['name' => ['required']]);

        $category = Category::create(
            [ 'name' => $request->name ]
        );
        $category->save();

        return redirect()->route('admin.data-category')->with('success', 'Berhasil menambahkan category '. $request->name);
    }

    //Edit Data
    public function updatePengaduan(Request $request, $id)
    {
        $this->validate($request, [
            'status' => ['required'],
            'tanggapan_pengaduan' => ['required'],
        ]);

        $pengaduandata = [
            'status' => $request->status,
            'tanggapan_pengaduan' => $request->tanggapan_pengaduan
        ];
        Pengaduan::whereId($id)->update($pengaduandata);
        return redirect()->route('admin.data-pengaduan')->with('success', 'Data berhasil diperbarui dengan status pengaduan '. $request->status);
    }

    // Deleted Data
    public function deleteCategory($id)
    {
        $kelas = Category::find($id);
        $kelas->delete();
        return redirect()->route('admin.data-category')->with('success', 'Berhasil menghapus kelas dengan id'. $id);
    }

    public function deletePengaduan($id)
    {
        Pengaduan::whereId($id)->delete();
        return redirect()->route('admin.data-pengaduan')->with('success', 'Data berhasil dihapus');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Lingkungan;
use File;

class LingkunganController extends Controller
{
    public function index()
    {
        $data = Lingkungan::all();
        return view('lingkungan.index', ['data'=>$data]);
    }
    
    public function create()
    {
        return view('lingkungan.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lingkungan' => 'required',
        ]);
        
        $lingkungan = new Lingkungan;
        $lingkungan -> nama_lingkungan = $request-> nama_lingkungan;
        $lingkungan->save();

        return redirect('/admin/lingkungan')->with('success', 'Data Lingkungan tersimpan!');
    }

    public function edit($id)
    {
        $data = Lingkungan::find($id);
        if (!$data) {
            return redirect('/admin/lingkungan')->with('error', 'Data tidak ditemukan!');
        }
        return view('lingkungan.edit', ['data'=> $data]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_lingkungan'=> 'required',
        ]);

        $lingkungan = Lingkungan::find($id);
        
        if (!$lingkungan) {
            return redirect('/admin/lingkungan')->with('error', 'Data tidak ada!');
        }
        $lingkungan->nama_lingkungan   = $request-> nama_lingkungan;
        $lingkungan->save();
        
        return redirect('/admin/lingkungan')->with('success', 'Data tersimpan!');
    }

    public function destroy($id)
    {
        //
        $lingkungan = Lingkungan::find($id);
        
        if (!$lingkungan) {
            return redirect('/admin/lingkungan')->with('error', 'Data tidak ada!!');
        }
        $lingkungan->delete($id);
        File::delete($lingkungan->filename);

        return redirect('/admin/lingkungan')->with('success', 'Data lingkungan telah dihapus!');
    }
    
    // public function searchLingkungan(Request $request)
    // {
    //     $cari = $request->search;
    
    //     $key = 'Menampilkan hasil untuk "'.$cari.'"';
    //     $data = Warta::where('title', 'like', "%".$cari."%")->select(
    //         'id',
    //         'title',
    //         DB::raw("DATE_FORMAT(created_at, ' %d %b %Y') as date")
    //     )
    //     ->paginate(10);
    
    //     return view('frontend.list_warta', ['warta' => $data, 'key'=> $key]);
    // }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Renungan;

class RenunganController extends Controller
{
    public function index()
    {
        $data = Renungan::all();
        return view('renungan.index', ['data'=>$data]);
    }

    public function create()
    {
        return view('renungan.form');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'verse' => 'required',
            'content' => 'required',
            'image_url' => 'required|file|image|mimes:jpeg,png,gif,webp|max:2048',
        ]);

        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('image_url');
        $nama_file = $file->getClientOriginalName();

        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'storage/gambar_renungan';
        $file->move($tujuan_upload, $nama_file);

        $renungan = new Renungan;
        $renungan -> title = $request-> title;
        $renungan -> verse = $request-> verse;
        $renungan -> content = $request-> content;
        $renungan -> image_url = $tujuan_upload.'/'.$nama_file;
        $renungan->save();

        return redirect('/admin/renungan')->with('success', 'Renungan tersimpan!');
    }

    public function show($id)
    {
        $data = Renungan::find($id);
        if (!$data) {
            return redirect('/admin/renungan')->with('error', 'Data tidak ditemukan!');
        }
        return view('renungan.view', ['data'=> $data]);
    }
    
    public function edit($id)
    {
        $data = Renungan::find($id);
        if (!$data) {
            return redirect('/admin/renungan')->with('error', 'Data tidak ditemukan!');
        }
        return view('renungan.edit', ['data'=> $data]);
    }
    
    public function update(Request $request, $id)
    {
        $param = $request->all();
        
        $data = [
            'title'     => $param['title'],
            'verse'     => $param['verse'],
            'content'   => $param['content']
        ];

        $file = $request->file('image_url');

        // Kalo pas diedit gambar diganti / masukin gambar
        if ($file) {
            // menyimpan data file yang diupload ke variabel $file
            $nama_file = $file->getClientOriginalName();

            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'storage/gambar_renungan';
            $file->move($tujuan_upload, $nama_file);
            
            $data['image_url'] = $tujuan_upload."/".$nama_file; // Update field photo
        }

        try {
            DB::table('renungan') -> where('id', '=', $id) -> update($data);
                        
            return redirect('/admin/renungan')->with('success', 'Data tersimpan!');
        } catch (\Exception $e) {
            return redirect('/admin/renungan')->with('error', 'Data tidak ada!');
        }
    }
    
    public function destroy($id)
    {
        $renungan = Renungan::find($id);
        if (!$renungan) {
            return redirect('/admin/renungan')->with('error', 'Renungan tidak ditemukan!');
        }
        $renungan->delete($id);

        return redirect('/admin/renungan')->with('success', 'Renungan telah dihapus!');
    }
    
    
    public function searchRenungan(Request $request)
    {
        $cari = $request->search;
    
        $key = 'Menampilkan hasil untuk "'.$cari.'"';
        $data = Renungan::where('title', 'like', "%".$cari."%")->select(
            'id',
            'title',
            'verse',
            'content',
            'image_url',
            DB::raw("DATE_FORMAT(created_at, ' %d %b %Y') as date")
        )
        ->paginate(10);
    
        return view('frontend.list_renungan', ['renungan' => $data, 'key'=> $key]);
    }
}
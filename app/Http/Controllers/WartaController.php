<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Warta;
use File;

class WartaController extends Controller
{
    public function index()
    {
        $data = Warta::all();
        return view('warta.index', ['data'=>$data]);
    }
    
    public function create()
    {
        return view('warta.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'file' => 'required|file|mimes:pdf|max:2048',
        ]);

        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('file');
        $nama_file = $file->getClientOriginalName();

        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'storage/warta';
        $file->move($tujuan_upload, $nama_file);

        $warta = new Warta;
        $warta -> title = $request-> title;
        $warta -> filename = $tujuan_upload.'/'.$nama_file;
        $warta->save();

        return redirect('/admin/warta')->with('success', 'Warta terupload!');
    }

    public function edit($id)
    {
        $data = Warta::find($id);
        if (!$data) {
            return redirect('/admin/warta')->with('error', 'Data tidak ditemukan!');
        }
        return view('warta.edit', ['data'=> $data]);
    }

    public function update(Request $request, $id)
    {
        $param = $request->all();
        
        $data = [
            'title'   => $param['title']
        ];

        $file = $request->file('file');

        // Kalo pas diedit gambar diganti / masukin gambar
        if ($file) {
            // menyimpan data file yang diupload ke variabel $file
            $nama_file = $file->getClientOriginalName();

            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'storage/warta';
            $file->move($tujuan_upload, $nama_file);
            
            $data['filename'] = $tujuan_upload."/".$nama_file; // Update field photo
        }

        try {
            DB::table('warta') -> where('id', '=', $id) -> update($data);
                        
            return redirect('/admin/warta')->with('success', 'Data saved succesfully!');
        } catch (\Exception $e) {
            return redirect('/admin/warta')->with('error', 'Data tidak ada!');
        }
    }

    public function destroy($id)
    {
        //
        $warta = Warta::find($id);
        
        if (!$warta) {
            return redirect('/admin/warta')->with('error', 'Data tidak ada!!');
        }
        $warta->delete($id);
        File::delete($warta->filename);

        return redirect('/admin/warta')->with('success', 'Data telah dihapus!');
    }
    
    public function searchWarta(Request $request)
    {
        $cari = $request->search;
    
        $key = 'Menampilkan hasil untuk "'.$cari.'"';
        $data = Warta::where('title', 'like', "%".$cari."%")->select(
            'id',
            'title',
            DB::raw("DATE_FORMAT(created_at, ' %d %b %Y') as date")
        )
        ->paginate(10);
    
        return view('frontend.list_warta', ['warta' => $data, 'key'=> $key]);
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Liturgi;
use File;

class LiturgiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Liturgi::all();
        return view('liturgi.index', ['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('liturgi.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
        $tujuan_upload = 'storage/liturgi';
        $file->move($tujuan_upload, $nama_file);

        $warta = new Liturgi;
        $warta -> title = $request-> title;
        $warta -> filename = $tujuan_upload.'/'.$nama_file;
        $warta->save();

        return redirect('/admin/liturgi')->with('success', 'Liturgi terupload!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Liturgi::find($id);
        if (!$data) {
            return redirect('/admin/liturgi')->with('error', 'Data tidak ditemukan!');
        }
        return view('liturgi.edit', ['data'=> $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
            $tujuan_upload = 'storage/liturgi';
            $file->move($tujuan_upload, $nama_file);
            
            $data['filename'] = $tujuan_upload."/".$nama_file; // Update field photo
        }

        try {
            DB::table('liturgi') -> where('id', '=', $id) -> update($data);
                        
            return redirect('/admin/liturgi')->with('success', 'Data saved succesfully!');
        } catch (\Exception $e) {
            return redirect('/admin/liturgi')->with('error', 'Data tidak ada!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $liturgi = Liturgi::find($id);
        
        if (!$liturgi) {
            return redirect('/admin/liturgi')->with('error', 'Data tidak ada!!');
        }
        $liturgi->delete($id);
        File::delete($liturgi->filename);

        return redirect('/admin/liturgi')->with('success', 'Data telah dihapus!');
    }
    
    public function searchLiturgi(Request $request)
    {
        $cari = $request->search;
    
        $key = 'Menampilkan hasil untuk "'.$cari.'"';
        $data = Liturgi::where('title', 'like', "%".$cari."%")->select(
            'id',
            'title',
            DB::raw("DATE_FORMAT(created_at, ' %d %b %Y') as date")
        )
        ->paginate();
    
        return view('frontend.list_liturgi', ['liturgi' => $data, 'key'=> $key]);
    }
}
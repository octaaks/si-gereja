<?php

namespace App\Http\Controllers;

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
        ]);

        $renungan = new Renungan;
        $renungan -> title = $request-> title;
        $renungan -> verse = $request-> verse;
        $renungan -> content = $request-> content;
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
        $request->validate([
            'title' => 'required',
            'verse' => 'required',
            'content' => 'required',
        ]);
        
        $renungan = Renungan::find($id);
        
        if (!$renungan) {
            return redirect('/admin/renungan')->with('error', 'Renungan tidak ditemukan!');
        }
        
        $renungan -> title     = $request-> title;
        $renungan -> verse     = $request-> verse;
        $renungan -> content   = $request-> content;
        $renungan -> save();
        
        return redirect('/admin/renungan')->with('success', 'Renungan tersimpan!');
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
    
        $data = Renungan::where('title', 'like', "%".$cari."%")
        ->paginate();
    
        return view('frontend.list_renungan', ['renungan' => $data]);
    }
}
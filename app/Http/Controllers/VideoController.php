<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Video;
use File;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Video::all();
        return view('video.index', ['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('video.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title' => 'required',
            'url' => 'required',
        ]);

        $video = new Video;
        $video -> title = $request-> title;
        $video -> url = $request-> url;
        $video->save();

        return redirect('/admin/video')->with('success', 'Video tersimpan!');
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
        //
        $data = Video::find($id);
        if (!$data) {
            return redirect('/admin/video')->with('error', 'Data tidak ditemukan!');
        }
        return view('video.edit', ['data'=> $data]);
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
        //
        $request->validate([
            'title' => 'required',
            'url' => 'required',
        ]);

        $video = Video::find($id);
        
        if (!$video) {
            return redirect('/admin/video')->with('error', 'Video tidak ada!');
        }
        $video -> title     = $request-> title;
        $video -> url       = $request-> url;
        $video->save();
        
        return redirect('/admin/video')->with('success', 'Video tersimpan!');
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
        $video = Video::find($id);
        if (!$video) {
            return redirect('/admin/video')->with('error', 'Video tidak ada!');
        }
        $video->delete($id);

        return redirect('/admin/video')->with('success', 'Data telah dihapus!');
    }
    
    public function searchVideo(Request $request)
    {
        $cari = $request->search;
    
        $data = Video::where('title', 'like', "%".$cari."%")
        ->paginate(12);
    
        return view('frontend.list_video', ['video' => $data])->with('key', 'Hasil pencarian untuk "'. $cari .'"');
    }
}
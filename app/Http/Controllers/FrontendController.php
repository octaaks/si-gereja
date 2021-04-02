<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Liturgi;
use App\Warta;
use App\Video;

class FrontendController extends Controller
{
    public function index()
    {
        $video = Video::all();
        return view('frontend.home', ['video'=>$video]);
    }

    public function listLiturgi()
    {
        $liturgi = DB::table('liturgi')->paginate(10);
        return view('frontend.list_liturgi', ['liturgi'=>$liturgi]);
    }

    public function listWarta()
    {
        $warta = DB::table('warta')->paginate(10);
        return view('frontend.list_warta', ['warta'=>$warta]);
    }

    public function listVideo()
    {
        $video = DB::table('video')->paginate(10);
        return view('frontend.list_video', ['video'=>$video]);
    }

    public function viewLiturgi($id)
    {
        $liturgi = DB::table('liturgi')->find($id);
        return view('frontend.view_liturgi', ['liturgi'=>$liturgi]);
    }

    public function viewWarta($id)
    {
        $warta = DB::table('warta')->find($id);
        return view('frontend.view_warta', ['warta'=>$warta]);
    }

    public function viewVideo($id)
    {
        $warta = DB::table('video')->find($id);
        return view('frontend.view_warta', ['warta'=>$warta]);
    }
}

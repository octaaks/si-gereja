<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Liturgi;
use App\Warta;

class FrontendController extends Controller
{
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
}

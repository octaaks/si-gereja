<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Liturgi;
use App\Warta;
use App\Video;
use Illuminate\Support\Facades\Mail;

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
    
    public function sendEmail(Request $request)
    {
        // Kirim Email
        // Mail::send('email_template', $data, function ($mail) use ($email) {
        //     $mail->to($email, 'no-reply')
        //             ->subject("Sample Email Laravel");
        //     $mail->from('rizalhilman68@gmail.com', 'Testing');
        // });
        
        // dd(env('MAIL_FROM_ADDRESS'));

        Mail::send('email_template', [
            'name' => $request->name,
            'email' => $request->email,
            'email_body' => $request->message
             
            ], function ($mail) use ($request) {
                $mail->from(env('MAIL_FROM_ADDRESS'), $request->name);
                $mail->to("freakstrngr@gmail.com")->subject($request->subject);
            });

        // Cek kegagalan
        if (Mail::failures()) {
            return redirect('/#email')->with('error', 'Gagal kirim email!');
        }
        return redirect('/#email')->with('success', 'Berhasil kirim email!');
    }
}
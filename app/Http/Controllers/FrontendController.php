<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Liturgi;
use App\Warta;
use App\Video;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class FrontendController extends Controller
{
    public function index()
    {
        $video = Video::orderBy('created_at', 'DESC')->get();
        return view('frontend.home', ['video'=>$video]);
    }

    public function listLiturgi()
    {
        $liturgi = DB::table('liturgi')->select(
            'id',
            'title',
            DB::raw("DATE_FORMAT(created_at, ' %d %b %Y') as date")
        )
        ->orderBy('created_at', 'DESC')->paginate(10);
            
        return view('frontend.list_liturgi', ['liturgi'=>$liturgi]);
    }

    public function listWarta()
    {
        $warta = DB::table('warta')->select(
            'id',
            'title',
            DB::raw("DATE_FORMAT(created_at, ' %d %b %Y') as date")
        )
            ->orderBy('created_at', 'DESC')->paginate(10);
        return view('frontend.list_warta', ['warta'=>$warta]);
    }
    
    public function listRenungan()
    {
        $renungan = DB::table('renungan')->select(
            'id',
            'title',
            'verse',
            'content',
            'image_url',
            DB::raw("DATE_FORMAT(created_at, ' %d %b %Y') as date")
        )->orderBy('date', 'DESC')->paginate(10);
        
        return view('frontend.list_renungan', ['renungan'=>$renungan]);
    }

    public function listVideo()
    {
        // $video = DB::table('video')->select(
        //     'id',
        //     'title',
        //     'url',
        //     DB::raw("created_at->diffForHumans() as date")
        // )->get();

        $video = Video::orderBy('created_at', 'DESC')->get();
        
        // dd(Carbon::parse($video->created_at)->diffForHumans());
        // $video->created_at->diffForHumans();
        
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

    public function viewRenungan($id)
    {
        $renungan = DB::table('renungan')->find($id);
        return view('frontend.view_renungan', ['renungan'=>$renungan]);
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
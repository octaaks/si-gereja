<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Jemaat;
use App\Pernikahan;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function dashboard()
    {
        // $knownDate = Carbon::create(2021, 12, 29);
        // Carbon::setTestNow($knownDate);

        $date = date('Y-m-d', strtotime(Carbon::now()));

        $fd = Carbon::createFromFormat('Y-m-d', $date)->startOfWeek(Carbon::SUNDAY);
        $ld = Carbon::createFromFormat('Y-m-d', $date)->endOfWeek(Carbon::SATURDAY);

        // dd(Carbon::create(date('Y'), 12, 26));
        // dd(strtotime($fd) < strtotime(Carbon::create(date('Y'), 12, 26)));

        if (strtotime($fd) < strtotime(Carbon::create(date('Y'), 12, 26))) {
            $first_date = date('z', strtotime($fd)) + 2;
            $last_date = date('z', strtotime($ld)) + 1;

            // dd($first_date);
            
            $data = Jemaat::whereRaw("DAYOFYEAR(date_of_birth) BETWEEN $first_date AND $last_date")->get();
            $data2 = Pernikahan::whereRaw("DAYOFYEAR(date) BETWEEN $first_date AND $last_date")->get();
        } else {
            $first_date = date('z', strtotime($fd)) + 1;
            $last_date = date('z', strtotime(date('Y-12-31'))) + 1;

            // dd($first_date, $last_date);

            $x = $last_date - $first_date;
            $days_left = round(6 - $x);
            
            $first_date2 = date('z', strtotime(date('Y-1-1')));
            $last_date2 = date('z', strtotime(date('Y-1-1'))) + $days_left;

            // dd($first_date, $last_date, $first_date2, $last_date2, $x, $days_left);

            $data = Jemaat::whereRaw("DAYOFYEAR(date_of_birth) BETWEEN $first_date AND $last_date")
            ->orWhereRaw("DAYOFYEAR(date_of_birth) BETWEEN $first_date2 AND $last_date2")
            ->orderBy('date_of_birth', DESC)
            ->get();

            $data2 = Pernikahan::whereRaw("DAYOFYEAR(date) BETWEEN $first_date AND $last_date")
            ->orWhereRaw("DAYOFYEAR(date) BETWEEN $first_date2 AND $last_date2")
            ->orderBy('date', DESC)
            ->get();

            // $data = Jemaat::whereBetween(date('z', strtotime(date('date_of_birth'))), [$first_date, $last_date])
            // ->orWhereBetween(date('z', strtotime(date('date_of_birth'))), [$first_date2, $last_date2])
            // ->get();

            // $data2 = Pernikahan::whereBetween(date('z', strtotime(date('date'))), [$first_date, $last_date])
            // ->orWhereBetween(date('z', strtotime(date('date'))), [$first_date2, $last_date2])
            // ->get();
        }

        // dd(($first_date));
        
        // $data = Jemaat::whereBetween(
        //     date($year.'-m-d', strtotime('date_of_birth')),
        //     [date('Y-m-d', strtotime($first_date)),
        //     date('Y-m-d', strtotime($last_date))]
        // )->get();

        // $data = Jemaat::whereRaw("DAYOFYEAR(date_of_birth) BETWEEN $first_date AND $last_date")
        // ->select(
        //     DB::raw(date($year.'-m-d', strtotime('date_of_birth')).' as date'),
        // )
        // ->get();
        // dd($data->pluck('date'));

        // dd($data);

        return view('dashboard', [
            'data'  => $data,
            'data2' => $data2,
            // 'tgl'   => date('d/m/Y ', strtotime('-1 day', strtotime($fd)))." - ".date('d/m/Y', strtotime('-1 day', strtotime($ld)))
            'tgl'   => date('d/m/Y ', strtotime($fd))." - ".date('d/m/Y', strtotime($ld))
            ]);
    }

    public function jemaat()
    {
        $data = Jemaat::all();
        return view('jemaat', ['data'=>$data]);
    }

    public function pernikahan()
    {
        $data = Pernikahan::all();
        return view('pernikahan', ['data'=>$data]);
    }
}

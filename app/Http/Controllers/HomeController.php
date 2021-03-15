<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Jemaat;
use App\Pernikahan;
use App\Liturgi;
use App\Warta;
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
            
            $data = Jemaat::whereRaw("DAYOFYEAR(date_of_birth) BETWEEN $first_date AND $last_date")
            ->select(
                'head_of_family',
                'name',
                DB::raw('YEAR(CURDATE())-DATE_FORMAT(date_of_birth, "%Y") as age'),
                DB::raw('CONCAT(DATE_FORMAT(date_of_birth, "%d-%c-"),YEAR(CURDATE())) as date_of_birth')
            )
            ->orderBy('date_of_birth', 'ASC')
            ->get();
            $data2 = Pernikahan::whereRaw("DAYOFYEAR(date) BETWEEN $first_date AND $last_date")
            ->select(
                'name',
                DB::raw('YEAR(CURDATE())-DATE_FORMAT(date, "%Y") as age'),
                DB::raw('CONCAT(DATE_FORMAT(date, "%d-%c-"),YEAR(CURDATE())) as date')
            )
            ->orderBy('date', 'ASC')
            ->get();
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
            ->select(
                'head_of_family',
                'name',
                DB::raw('YEAR(CURDATE())-DATE_FORMAT(date_of_birth, "%Y") as age'),
                DB::raw('CONCAT(DATE_FORMAT(date_of_birth, "%d-%c-"),YEAR(CURDATE())) as date_of_birth')
            )
            ->orderBy('date_of_birth', 'ASC')
            ->get();

            $data2 = Pernikahan::whereRaw("DAYOFYEAR(date) BETWEEN $first_date AND $last_date")
            ->orWhereRaw("DAYOFYEAR(date) BETWEEN $first_date2 AND $last_date2")
            ->select(
                'name',
                DB::raw('YEAR(CURDATE())-DATE_FORMAT(date, "%Y") as age'),
                DB::raw('CONCAT(DATE_FORMAT(date, "%d-%c-"),YEAR(CURDATE())) as date')
            )
            ->orderBy('date', 'ASC')
            ->get();
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
    public function week(Request $request)
    {
        $date_range = $request->input('range');

        $date_range = explode(' - ', $date_range);
        $tgl1 = date('Y-m-d', strtotime($date_range[0]));
        $tgl2 = date('Y-m-d', strtotime($date_range[1]));

        $date = date('Y-m-d', strtotime(Carbon::now()));

        $fd = Carbon::createFromFormat('Y-m-d', $tgl1)->startOfWeek(Carbon::SUNDAY);
        $ld = Carbon::createFromFormat('Y-m-d', $tgl1)->endOfWeek(Carbon::SATURDAY);

        if (strtotime($fd) < strtotime(Carbon::create(date('Y'), 12, 26))) {
            $first_date = date('z', strtotime($fd)) + 2;
            $last_date = date('z', strtotime($ld)) + 1;

            // dd($first_date);
            
            $data = Jemaat::whereRaw("DAYOFYEAR(date_of_birth) BETWEEN $first_date AND $last_date")
            ->select(
                'head_of_family',
                'name',
                DB::raw('YEAR(CURDATE())-DATE_FORMAT(date_of_birth, "%Y") as age'),
                DB::raw('CONCAT(DATE_FORMAT(date_of_birth, "%d-%c-"),YEAR(CURDATE())) as date_of_birth')
            )
            ->orderBy('date_of_birth', 'ASC')
            ->get();
            $data2 = Pernikahan::whereRaw("DAYOFYEAR(date) BETWEEN $first_date AND $last_date")
            ->select(
                'name',
                DB::raw('YEAR(CURDATE())-DATE_FORMAT(date, "%Y") as age'),
                DB::raw('CONCAT(DATE_FORMAT(date, "%d-%c-"),YEAR(CURDATE())) as date')
            )
            ->orderBy('date', 'ASC')
            ->get();
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
            ->select(
                'head_of_family',
                'name',
                DB::raw('YEAR(CURDATE())-DATE_FORMAT(date_of_birth, "%Y") as age'),
                DB::raw('CONCAT(DATE_FORMAT(date_of_birth, "%d-%c-"),YEAR(CURDATE())) as date_of_birth')
            )
            ->orderBy('date_of_birth', 'ASC')
            ->get();

            $data2 = Pernikahan::whereRaw("DAYOFYEAR(date) BETWEEN $first_date AND $last_date")
            ->orWhereRaw("DAYOFYEAR(date) BETWEEN $first_date2 AND $last_date2")
            ->select(
                'name',
                DB::raw('YEAR(CURDATE())-DATE_FORMAT(date, "%Y") as age'),
                DB::raw('CONCAT(DATE_FORMAT(date, "%d-%c-"),YEAR(CURDATE())) as date')
            )
            ->orderBy('date', 'ASC')
            ->get();
        }

        return view('dashboard', [
            'data'  => $data,
            'data2' => $data2,
            // 'tgl'   => date('d/m/Y ', strtotime('-1 day', strtotime($fd)))." - ".date('d/m/Y', strtotime('-1 day', strtotime($ld)))
            'tgl'   => date('d/m/Y ', strtotime($tgl1))." - ".date('d/m/Y', strtotime($tgl2))
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

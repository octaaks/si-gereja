<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Jemaat;
use App\Pernikahan;
use Carbon\Carbon;

class DataController extends Controller
{
    public function weekData(Request $request)
    {
        $date_range = $request->input('range');

        $date_range = explode(' - ', $date_range);
        $tgl1 = date('Y-m-d', strtotime($date_range[0]));
        $tgl2 = date('Y-m-d', strtotime($date_range[1]));

        // $knownDate = Carbon::create(2021, 12, 29);
        // Carbon::setTestNow($knownDate);

        // $date = date('Y-m-d', strtotime(Carbon::now()));

        $fd = Carbon::createFromFormat('Y-m-d', $tgl1)->startOfWeek(Carbon::SUNDAY);
        $ld = Carbon::createFromFormat('Y-m-d', $tgl2)->endOfWeek(Carbon::SATURDAY);

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
        }

        // return view('dashboard', [
        //     'data'  => $data,
        //     'data2' => $data2,
        //     // 'tgl'   => date('d/m/Y ', strtotime('-1 day', strtotime($fd)))." - ".date('d/m/Y', strtotime('-1 day', strtotime($ld)))
        //     'tgl'   => date('d/m/Y ', strtotime($fd))." - ".date('d/m/Y', strtotime($ld))
        // ]);
        return response() -> json([
            'data'  => $data,
            'data2' => $data2
        ]);
    }
}

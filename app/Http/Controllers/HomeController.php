<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Jemaat;
use App\Pernikahan;
use App\Liturgi;
use App\Warta;
use App\Lingkungan;
use Carbon\Carbon;

use Illuminate\Support\Facades\Mail;

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
                'name1',
                'name2',
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
                'name1',
                'name2',
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
                'name1',
                'name2',
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
                'name1',
                'name2',
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
        $lingkungan = Lingkungan::all();
        return view('jemaat', ['data'=>$data, 'lingkungan'=>$lingkungan]);
    }

    public function jemaatFilterByLingkungan($idLingkungan)
    {
        $selectedLingkungan = Lingkungan::find($idLingkungan);
        $data = Jemaat::where('lingkungan_id', '=', $selectedLingkungan->id)->get();
        
        $lingkungan = Lingkungan::all();

        return view('jemaat', ['data'=>$data, 'lingkungan'=>$lingkungan]);
    }

    public function jemaatCreate()
    {
        $lingkungan = Lingkungan::all();
        return view('jemaatInsert', ['lingkungan'=>$lingkungan]);
    }

    public function jemaatStore(Request $request)
    {
        $request->validate([
            'no_kk'             => 'required',
            'nik'               => 'required',
            'name'              => 'required',
            'lingkungan_id'     => 'required',
            'head_of_family'    => 'required',
            'birthplace'        => 'required',
            'date_of_birth'     => 'required',
        ]);
        $jemaat = new Jemaat;
        $jemaat->no_kk            = $request-> no_kk;
        $jemaat->nik              = $request-> nik;
        $jemaat->name             = $request-> name;
        $jemaat->lingkungan_id    = $request-> lingkungan_id;
        $jemaat->head_of_family   = $request-> head_of_family;
        $jemaat->birthplace       = $request-> birthplace;
        $jemaat->date_of_birth    = $request-> date_of_birth;
        $jemaat->save();
        
        return redirect('/admin/jemaat')->with('success', 'Data telah disimpan!');
    }

    public function jemaatView($id)
    {
        $data = Jemaat::find($id);
        $relate = Jemaat::where('no_kk', '=', $data->no_kk)->get();
        $lingkungan = Lingkungan::all();
        
        return view('jemaatView', ['data'=>$data, 'relate'=>$relate, 'lingkungan'=>$lingkungan]);
    }

    public function jemaatUpdate(Request $request, $id)
    {
        $request->validate([
            'no_kk'             => 'required',
            'nik'               => 'required',
            'name'              => 'required',
            'lingkungan_id'     => 'required',
            'head_of_family'    => 'required',
            'birthplace'        => 'required',
            'date_of_birth'     => 'required',
        ]);

        $jemaat = Jemaat::find($id);
        
        if (!$jemaat) {
            return redirect('/admin/jemaat')->with('error', 'Data tidak ada!');
        }

        $jemaat->no_kk            = $request-> no_kk;
        $jemaat->nik              = $request-> nik;
        $jemaat->name             = $request-> name;
        $jemaat->lingkungan_id    = $request-> lingkungan_id;
        $jemaat->head_of_family   = $request-> head_of_family;
        $jemaat->birthplace       = $request-> birthplace;
        $jemaat->date_of_birth    = $request-> date_of_birth;
        $jemaat->save();
        
        return redirect('/admin/jemaat')->with('success', 'Data tersimpan!');
    }
    
    public function jemaatDelete($id)
    {
        //
        $jemaat = Jemaat::find($id);
        if (!$jemaat) {
            return redirect('/admin/jemaat')->with('error', 'Data tidak ada!');
        }
        $jemaat->delete($id);

        return redirect('/admin/jemaat')->with('success', 'Data telah dihapus!');
    }

    public function pernikahan()
    {
        $data = Pernikahan::all();
        return view('pernikahan', ['data'=>$data]);
    }
    
    public function pernikahanCreate()
    {
        return view('pernikahanInsert');
    }

    public function pernikahanStore(Request $request)
    {
        $request->validate([
            'name1'=> 'required',
            'name2'=> 'required',
            'date' => 'required',
        ]);

        $pernikahan = new Pernikahan;
        $pernikahan->name1   = $request-> name1;
        $pernikahan->name2   = $request-> name2;
        $pernikahan->date    = $request-> date;
        $pernikahan->save();
        
        return redirect('/admin/pernikahan')->with('success', 'Data telah disimpan!');
    }

    public function pernikahanView($id)
    {
        $data = Pernikahan::find($id);
        return view('pernikahanView', ['data'=>$data]);
    }

    public function pernikahanUpdate(Request $request, $id)
    {
        $request->validate([
            'name1'=> 'required',
            'name2'=> 'required',
            'date' => 'required',
        ]);

        $pernikahan = Pernikahan::find($id);
        
        if (!$pernikahan) {
            return redirect('/admin/pernikahan')->with('error', 'Data tidak ada!');
        }
        $pernikahan->name1   = $request-> name1;
        $pernikahan->name2   = $request-> name2;
        $pernikahan->date    = $request-> date;
        $pernikahan->save();
        
        return redirect('/admin/pernikahan')->with('success', 'Data tersimpan!');
    }
    
    public function pernikahanDelete($id)
    {
        $pernikahan = Pernikahan::find($id);
        if (!$pernikahan) {
            return redirect('/admin/pernikahan')->with('error', 'Data tidak ada!');
        }
        $pernikahan->delete($id);

        return redirect('/admin/pernikahan')->with('success', 'Data telah dihapus!');
    }
}
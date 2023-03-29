<?php

namespace App\Http\Controllers;

use App\Models\RealisasiModel;
use App\Models\RefKecamatan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;


class ReportController extends Controller
{
    public function IndexRealisasi() {

<<<<<<< HEAD
        $tahun      = Carbon::now()->format('Y');
        $date       = date('Y-m-d');
        $kec        = RefKecamatan::all();

        $result     = RealisasiModel::where('sppt.status_pembayaran_sppt', 1)
                    ->where('sppt.thn_pajak_sppt', $tahun)
                    ->where('sppt.tgl_pembayaran_sppt',$date)
                    ->get();
                     // dd($result);  
        return view('content.realisasi.latest',compact('result','kec'),["title" => "Report"]);
=======
    public function index() {

        $tahun  = Carbon::now()->format('Y');
        $tgl    = date('Y-m-d');
        $result = DB::table('sppt')
        ->leftJoin('pembayaran_sppt', [
   
            ['sppt.kd_kecamatan',   '=', 'pembayaran_sppt.kd_kecamatan'],
            ['sppt.kd_kelurahan',   '=', 'pembayaran_sppt.kd_kelurahan'],
            ['sppt.kd_blok',        '=', 'pembayaran_sppt.kd_blok'],
            ['sppt.no_urut',        '=', 'pembayaran_sppt.no_urut'],
            ['sppt.kd_jns_op',      '=', 'pembayaran_sppt.kd_jns_op'],
            ['sppt.thn_pajak_sppt', '=', 'pembayaran_sppt.thn_pajak_sppt']

        ])
        ->leftJoin('ref_kelurahan', [
   
            ['sppt.kd_kecamatan',   '=', 'ref_kelurahan.kd_kecamatan'],
            ['sppt.kd_kelurahan',   '=', 'ref_kelurahan.kd_kelurahan'],                                  

        ])    
            ->where('sppt.status_pembayaran_sppt', 1)
            ->where('sppt.thn_pajak_sppt', $tahun)
            ->where('sppt.tgl_pembayaran_sppt',$tgl)
            ->get();

        return view('content.report',compact('result'),["title" => "Realisasi"]);
>>>>>>> a124703d14a1f1ec0e0cd728df52ff72695fb74d
    }

    public function RangeRealisasi (Request $request){
     
        $tahun      = Carbon::now()->format('Y');
        $kec        = RefKecamatan::all();

        $kecamatan  = (request()->kecamatan);
        $start_date = Carbon::parse(request()->start_date)->format('Y-m-d');
        $end_date   = Carbon::parse(request()->end_date)->format('Y-m-d');

<<<<<<< HEAD
        if ($request->kecamatan)
            {
                $result = RealisasiModel::where('sppt.kd_kecamatan',$kecamatan)
                ->where('sppt.status_pembayaran_sppt', 1)
                ->where('sppt.thn_pajak_sppt', $tahun)
                ->get();
            }

        if($request->start_date && $request->end_date)
            {        
                $result = RealisasiModel::whereBetween('sppt.tgl_pembayaran_sppt', [$start_date,$end_date])
                ->where('sppt.status_pembayaran_sppt', 1)
                ->where('sppt.thn_pajak_sppt', $tahun)
                ->get();
            }

        if($request->start_date && $request->end_date && $request->kecamatan)
            {       
                $result = RealisasiModel::whereBetween('sppt.tgl_pembayaran_sppt', [$start_date,$end_date])
                ->where('sppt.status_pembayaran_sppt', 1)
                ->where('sppt.thn_pajak_sppt', $tahun)
                ->where('sppt.kd_kecamatan',$kecamatan)
                ->get();
            }
            // dd($result);
            return view('content.realisasi.tes',compact('result','kec'),["title" => "Report"]);
          
=======
        ])    
            ->where('sppt.status_pembayaran_sppt', 1)
            ->where('sppt.thn_pajak_sppt', $tahun)
            ->whereBetween('sppt.tgl_pembayaran_sppt', [$start_date,$end_date])
            ->get();
            // dd($result);  
             return view('content.date_report', compact('result'),["title" => "Realisasi"]);     
        
>>>>>>> a124703d14a1f1ec0e0cd728df52ff72695fb74d
    }
}
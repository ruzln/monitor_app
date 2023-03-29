<?php

namespace App\Http\Controllers;

use App\Models\RealisasiModel;
use App\Models\RefKecamatan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;


class ReportController extends Controller
{
    public function IndexRealisasi() {

        $tahun      = Carbon::now()->format('Y');
        $date       = date('Y-m-d');
        $kec        = RefKecamatan::all();

        $result     = RealisasiModel::where('sppt.status_pembayaran_sppt', 1)
                    ->where('sppt.thn_pajak_sppt', $tahun)
                    ->where('sppt.tgl_pembayaran_sppt',$date)
                    ->get();
                     // dd($result);  
        return view('content.realisasi.latest',compact('result','kec'),["title" => "Report"]);
    }

    public function RangeRealisasi (Request $request){
     
        $tahun      = Carbon::now()->format('Y');
        $kec        = RefKecamatan::all();

        $kecamatan  = (request()->kecamatan);
        $start_date = Carbon::parse(request()->start_date)->format('Y-m-d');
        $end_date   = Carbon::parse(request()->end_date)->format('Y-m-d');

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
          
    }
}
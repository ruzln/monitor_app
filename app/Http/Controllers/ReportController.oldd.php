<?php

namespace App\Http\Controllers;

use App\Models\RefKecamatan;
use Illuminate\Http\Request;
use App\Models\RealisasiModel;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;


class ReportController extends Controller
{
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
    }

    public function RangeRealisasi (Request $request){
     
        $tahun      = Carbon::now()->format('Y');
        $kec        = RefKecamatan::all();

        $kecamatan  = (request()->kecamatan);
        $start_date = Carbon::parse(request()->start_date)->format('Y-m-d');
        $end_date   = Carbon::parse(request()->end_date)->format('Y-m-d');

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
            ->whereBetween('sppt.tgl_pembayaran_sppt', [$start_date,$end_date])
            ->get();
            // dd($result);  
             return view('content.date_report', compact('result'),["title" => "Realisasi"]);     
        
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\RefKecamatan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{

    public function index() {
        // $tahun      = Carbon::now()->format('Y');
        // $date       = date('Y-m-d');
         $kec        = RefKecamatan::all();             
       
        // $result     = RealisasiModel::where('sppt.status_pembayaran_sppt', 1)
        //             ->where('sppt.thn_pajak_sppt', $tahun)
        //             ->where('sppt.tgl_pembayaran_sppt',$date)
        //             ->get();
        //              // dd($result);  
        return view('content.report',compact('kec'),["title" => "Report"]);
    }
    public function RangeRealisasi (Request $request){
     
        $kec        = RefKecamatan::all();
        $tahun      = (request()->tahun);
        $kecamatan  = (request()->kecamatan);
        $start_date = Carbon::parse(request()->start_date)->format('Y-m-d');
        $end_date   = Carbon::parse(request()->end_date)->format('Y-m-d');

// query join
        $cek = DB::table('sppt')                
        ->leftJoin('pembayaran_sppt', [   
            ['sppt.kd_propinsi',    '=', 'pembayaran_sppt.kd_propinsi'],
            ['sppt.kd_dati2',    '=', 'pembayaran_sppt.kd_dati2'],
            ['sppt.kd_kecamatan',   '=', 'pembayaran_sppt.kd_kecamatan'],
            ['sppt.kd_kelurahan',   '=', 'pembayaran_sppt.kd_kelurahan'],
            ['sppt.kd_blok',        '=', 'pembayaran_sppt.kd_blok'],
            ['sppt.no_urut',        '=', 'pembayaran_sppt.no_urut'],
            ['sppt.kd_jns_op',      '=', 'pembayaran_sppt.kd_jns_op'],
            ['sppt.thn_pajak_sppt', '=', 'pembayaran_sppt.thn_pajak_sppt']
        ])
        ->leftJoin('dat_objek_pajak', [
   
            ['sppt.kd_propinsi',    '=', 'dat_objek_pajak.kd_propinsi'],
            ['sppt.kd_dati2',    '=', 'dat_objek_pajak.kd_dati2'],
            ['sppt.kd_kecamatan',   '=', 'dat_objek_pajak.kd_kecamatan'],
            ['sppt.kd_kelurahan',   '=', 'dat_objek_pajak.kd_kelurahan'],
            ['sppt.kd_blok',        '=', 'dat_objek_pajak.kd_blok'],
            ['sppt.no_urut',        '=', 'dat_objek_pajak.no_urut'],
            ['sppt.kd_jns_op',      '=', 'dat_objek_pajak.kd_jns_op']
        ])
        ->leftJoin('ref_kelurahan', [
   
            ['sppt.kd_kecamatan',   '=', 'ref_kelurahan.kd_kecamatan'],
            ['sppt.kd_kelurahan',   '=', 'ref_kelurahan.kd_kelurahan'],
        ])
         ->where('sppt.status_pembayaran_sppt', 1);

// Pencarian berdasarkan Tahun Pajak
        if (!empty($request->query('tahun'))) {
            $result = $cek->where('sppt.thn_pajak_sppt', $request->query('tahun'));
        }
// Pencarian berdasarkan Kecamatan     
        if (!empty($request->query('kecamatan'))) {
             $result = $cek->where('sppt.kd_kecamatan', $request->query('kecamatan'));
        }
// Pencarian berdasarkan Tanggal Bayar      
        if (!empty($request->query('start_date','end_date'))) {
             $result= $cek ->whereBetween('sppt.tgl_pembayaran_sppt', [$start_date,$end_date]);              
         }
             $result= $cek ->get();
            // dd($result);
            return view('content.date_report',compact('result','kec'),["title" => "Report"]);
          
    }
}
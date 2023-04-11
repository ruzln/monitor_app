<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){

    $tahun  = Carbon::now()->format('Y');
   
     $result =  DB::table('sppt')
     ->leftJoin('pembayaran_sppt', [
                    
        ['sppt.kd_kecamatan',   '=', 'pembayaran_sppt.kd_kecamatan'],
        ['sppt.kd_kelurahan',   '=', 'pembayaran_sppt.kd_kelurahan'],
        ['sppt.kd_blok',        '=', 'pembayaran_sppt.kd_blok'],
        ['sppt.no_urut',        '=', 'pembayaran_sppt.no_urut'],
        ['sppt.kd_jns_op',      '=', 'pembayaran_sppt.kd_jns_op'],
        ['sppt.thn_pajak_sppt', '=', 'pembayaran_sppt.thn_pajak_sppt']
        

    ])
            ->selectRaw('
            SUM(sppt.pbb_yg_harus_dibayar_sppt) as target,
            COUNT(sppt.pbb_yg_harus_dibayar_sppt) as jumlah_sppt,
            SUM(pembayaran_sppt.jml_sppt_yg_dibayar) as realisasi_total,
            SUM(pembayaran_sppt.jml_sppt_yg_dibayar)- SUM(pembayaran_sppt.denda_sppt) as realisasi_pokok,
            (SUM(pembayaran_sppt.jml_sppt_yg_dibayar)- SUM(pembayaran_sppt.denda_sppt))/SUM(sppt.pbb_yg_harus_dibayar_sppt)*100 as persen
            ')
            
            ->where('sppt.thn_pajak_sppt',2022)
            ->get();
    //    dd(compact('result'));
         return view('home', ["title" => "Dashboard"],compact('result')); 
    }
}

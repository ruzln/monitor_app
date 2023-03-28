<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class KelurahanController extends Controller
{
   
    public function index(){
                  
        $tahun = Carbon::now()->format('Y');
         //$tgl  = date('Y-m-d');
                

$hasil =  DB::table
         ('sppt')
         ->leftJoin('pembayaran_sppt',function($join) {
             $join->on('sppt.kd_kecamatan',  '=','pembayaran_sppt.kd_kecamatan')
             ->on('sppt.kd_kelurahan',       '=','pembayaran_sppt.kd_kelurahan')
             ->on('sppt.kd_blok',            '=','pembayaran_sppt.kd_blok')
             ->on('sppt.no_urut',            '=','pembayaran_sppt.no_urut')
             ->on('sppt.kd_jns_op',          '=','pembayaran_sppt.kd_jns_op')
             ->on('sppt.thn_pajak_sppt',     '=','pembayaran_sppt.thn_pajak_sppt');
         })
        ->join('ref_kelurahan',function($join) {
             $join
             ->on('sppt.kd_kecamatan','=','ref_kelurahan.kd_kecamatan')
             ->on('sppt.kd_propinsi', '=','ref_kelurahan.kd_propinsi')
             ->on('sppt.kd_kelurahan','=','ref_kelurahan.kd_kelurahan');
           
         })
         
             ->select('ref_kelurahan.nm_kelurahan')
                  ->selectRaw
                     ('
                     COUNT(sppt.no_urut) as total_wp,
                     SUM(sppt.pbb_yg_harus_dibayar_sppt) as target,
                     SUM(pembayaran_sppt.jml_sppt_yg_dibayar)- SUM(pembayaran_sppt.denda_sppt) as realisasi_pokok,
                     SUM(pembayaran_sppt.denda_sppt) as total_denda, 
                     SUM(pembayaran_sppt.jml_sppt_yg_dibayar) as realisasi_total
                     ')
                 
             ->where('sppt.thn_pajak_sppt',$tahun) 
             ->groupBy('ref_kelurahan.nm_kelurahan')
             ->orderBy ('ref_kelurahan.nm_kelurahan','asc')

             ->get();
            //  dd($hasil);
             return view('content.kelurahan', compact('hasil'),["title" => "Desa/Kelurahan"]); 
                                
    }

}

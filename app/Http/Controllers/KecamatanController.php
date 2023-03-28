<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class KecamatanController extends Controller
{
    public function index(){
    
        $tahun = Carbon::now()->format('Y');
        //$tgl  = date('Y-m-d');
    
       
        $hasil =  DB::table('sppt')
                ->leftJoin('pembayaran_sppt',function($join) {
                    $join->on('sppt.kd_kecamatan',  '=','pembayaran_sppt.kd_kecamatan')
                    ->on('sppt.kd_kelurahan',       '=','pembayaran_sppt.kd_kelurahan')
                    ->on('sppt.kd_blok',            '=','pembayaran_sppt.kd_blok')
                    ->on('sppt.no_urut',            '=','pembayaran_sppt.no_urut')
                    ->on('sppt.kd_jns_op',          '=','pembayaran_sppt.kd_jns_op')
                    ->on('sppt.thn_pajak_sppt',     '=','pembayaran_sppt.thn_pajak_sppt');
                })
               ->join('ref_kecamatan',function($join) {
                    $join
                    ->on('sppt.kd_kecamatan','=','ref_kecamatan.kd_kecamatan')
                    ->on('sppt.kd_propinsi', '=','ref_kecamatan.kd_propinsi');                             
                })
                    ->select('ref_kecamatan.nm_kecamatan')
                    //->select('sppt.thn_pajak_sppt')
                    ->selectRaw('
                    SUM(sppt.pbb_yg_harus_dibayar_sppt) as target,
                    SUM(pembayaran_sppt.jml_sppt_yg_dibayar)- SUM(pembayaran_sppt.denda_sppt) as realisasi_pokok, 
                    SUM(pembayaran_sppt.denda_sppt) as total_denda, 
                    SUM(pembayaran_sppt.jml_sppt_yg_dibayar) as realisasi_total')
       
        
                    ->where('sppt.thn_pajak_sppt',$tahun)
                    ->groupBy('ref_kecamatan.nm_kecamatan')
                    ->get();
        return view('content.kecamatan', compact('hasil'),["title" => "Kecamatan"]); 
        // dd($hasil);
                       
        
        }
}

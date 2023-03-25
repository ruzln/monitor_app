<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DHKPController extends Controller
{        
    public function index(){
    
    $tahun  = Carbon::now()->format('Y');
   // $tgl    = date('Y-m-d');
   // $tgl    = date('Y-m-d',strtotime('2022-09-20'));

    $result = DB::table('sppt')
                  
                ->leftJoin('pembayaran_sppt', [
           
                    ['sppt.kd_propinsi',    '=', 'pembayaran_sppt.kd_propinsi'],
                    ['sppt.kd_dati2',       '=', 'pembayaran_sppt.kd_dati2'],
                    ['sppt.kd_kecamatan',   '=', 'pembayaran_sppt.kd_kecamatan'],
                    ['sppt.kd_kelurahan',   '=', 'pembayaran_sppt.kd_kelurahan'],
                    ['sppt.kd_blok',        '=', 'pembayaran_sppt.kd_blok'],
                    ['sppt.no_urut',        '=', 'pembayaran_sppt.no_urut'],
                    ['sppt.kd_jns_op',      '=', 'pembayaran_sppt.kd_jns_op'],
                    ['sppt.thn_pajak_sppt', '=', 'pembayaran_sppt.thn_pajak_sppt']
    
                ])

                ->leftJoin('dat_objek_pajak', [
                    ['sppt.kd_propinsi',    '=', 'dat_objek_pajak.kd_propinsi'],
                    ['sppt.kd_dati2',       '=', 'dat_objek_pajak.kd_dati2'],
                    ['sppt.kd_kecamatan',   '=', 'dat_objek_pajak.kd_kecamatan'],
                    ['sppt.kd_kelurahan',   '=', 'dat_objek_pajak.kd_kelurahan'],
                    ['sppt.kd_blok',        '=', 'dat_objek_pajak.kd_blok'],
                    ['sppt.no_urut',        '=', 'dat_objek_pajak.no_urut'],
                    ['sppt.kd_jns_op',      '=', 'dat_objek_pajak.kd_jns_op']

                ])

                ->leftJoin('ref_kelurahan', [
           
                    ['sppt.kd_propinsi',    '=', 'ref_kelurahan.kd_propinsi'],
                    ['sppt.kd_dati2',       '=', 'ref_kelurahan.kd_dati2'],
                    ['sppt.kd_kecamatan',   '=', 'ref_kelurahan.kd_kecamatan'],
                    ['sppt.kd_kelurahan',   '=', 'ref_kelurahan.kd_kelurahan']                                  
    
                ])    
                ->leftJoin('ref_kecamatan', [
           
                    ['sppt.kd_propinsi',    '=', 'ref_kecamatan.kd_propinsi'],
                    ['sppt.kd_dati2',       '=', 'ref_kecamatan.kd_dati2'],
                    ['sppt.kd_kecamatan',   '=', 'ref_kecamatan.kd_kecamatan']                                  
    
                ]) 
                  //  ->select('ref_kecamatan.nm_kecamatan','ref_kelurahan.nm_kelurahan','sppt.nm_wp_sppt')
                    
                    ->where('sppt.thn_pajak_sppt', $tahun)
                    ->where('sppt.kd_kecamatan','010')
                    
                    //->simplePaginate(200);
                   ->get();
                return view('content.dhkp', compact('result'),["title" => "DHKP"]);
               //  ddd ($result); 

    
    }
}

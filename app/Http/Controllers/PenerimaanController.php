<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class PenerimaanController extends Controller
{
    public function index(){

    // $tahunawal   = '2018';
    $tahun  = Carbon::now()->format('Y');
    $tgl    = date('Y-m-d');
    // $tgl1    = date('Y-m-d',strtotime('2022-09-20'));
    // $tgl2    = date('Y-m-d',strtotime('2022-11-31'));

    $totalbayar=DB::table('sppt')
                ->leftJoin('pembayaran_sppt', [
                    
                    ['sppt.kd_kecamatan',   '=', 'pembayaran_sppt.kd_kecamatan'],
                    ['sppt.kd_kelurahan',   '=', 'pembayaran_sppt.kd_kelurahan'],
                    ['sppt.kd_blok',        '=', 'pembayaran_sppt.kd_blok'],
                    ['sppt.no_urut',        '=', 'pembayaran_sppt.no_urut'],
                    ['sppt.kd_jns_op',      '=', 'pembayaran_sppt.kd_jns_op'],
                    ['sppt.thn_pajak_sppt', '=', 'pembayaran_sppt.thn_pajak_sppt']

                ])
                ->selectRaw
                        ('SUM(pembayaran_sppt.jml_sppt_yg_dibayar) as total_hari_ini')
                        // ->whereBetween('sppt.thn_pajak_sppt', [$tahunawal,$tahunakhir])
                        // ->whereBetween('sppt.tgl_pembayaran_sppt', [$tgl1,$tgl2])
                        ->where('sppt.thn_pajak_sppt', $tahun)
                        ->where('sppt.tgl_pembayaran_sppt',$tgl)
                        ->get();

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

        return view('content.today', compact('result','totalbayar'),["title" => "Hari Ini"]);
                    //return $result;

    
    }
}

<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RealisasiModel extends Model
{
    protected $connection = 'oracle';
    protected $table = 'SPPT';
        

    public function getRealisasi($request)
    {
        $result = DB::table('sppt')                
        ->leftJoin('pembayaran_sppt', [
   
            ['sppt.kd_propinsi',    '=', 'pembayaran_sppt.kd_propinsi'],
            ['sppt.kd_kd_dati2',    '=', 'pembayaran_sppt.kd_kd_dati2'],
            ['sppt.kd_kecamatan',   '=', 'pembayaran_sppt.kd_kecamatan'],
            ['sppt.kd_kelurahan',   '=', 'pembayaran_sppt.kd_kelurahan'],
            ['sppt.kd_blok',        '=', 'pembayaran_sppt.kd_blok'],
            ['sppt.no_urut',        '=', 'pembayaran_sppt.no_urut'],
            ['sppt.kd_jns_op',      '=', 'pembayaran_sppt.kd_jns_op'],
            ['sppt.thn_pajak_sppt', '=', 'pembayaran_sppt.thn_pajak_sppt']
        ])

        ->leftJoin('dat_objek_pajak', [
   
            ['sppt.kd_propinsi',    '=', 'dat_objek_pajak.kd_propinsi'],
            ['sppt.kd_kd_dati2',    '=', 'dat_objek_pajak.kd_dati2'],
            ['sppt.kd_kecamatan',   '=', 'dat_objek_pajak.kd_kecamatan'],
            ['sppt.kd_kelurahan',   '=', 'dat_objek_pajak.kd_kelurahan'],
            ['sppt.kd_blok',        '=', 'dat_objek_pajak.kd_blok'],
            ['sppt.no_urut',        '=', 'dat_objek_pajak.no_urut'],
            ['sppt.kd_jns_op',      '=', 'dat_objek_pajak.kd_jns_op']
        ])
        ->leftJoin('ref_kelurahan', [
   
            ['sppt.kd_kecamatan',   '=', 'ref_kelurahan.kd_kecamatan'],
            ['sppt.kd_kelurahan',   '=', 'ref_kelurahan.kd_kelurahan'],
        ]);
        
         //->get();
         return $result;
    }
    
}

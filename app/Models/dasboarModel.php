<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class dasboarModel extends Model
{
    protected $connection = 'oracle';
    protected $table = 'PEMBAYARAN_SPPT';
 
   public function getdasboard($request)
   
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
        ]);

    }

}

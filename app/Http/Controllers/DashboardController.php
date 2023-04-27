<?php

namespace App\Http\Controllers;

use App\Models\dasboarModel;
use Facade\Ignition\QueryRecorder\Query;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){

    $tahun  = Carbon::now()->format('Y');
  //  Query penerimaan piutang
    $pjanuari = dasboarModel::selectRaw('SUM(pembayaran_sppt.jml_sppt_yg_dibayar) as pjan')
                            ->whereMonth('pembayaran_sppt.tgl_pembayaran_sppt',1)
                            ->whereYear('pembayaran_sppt.tgl_pembayaran_sppt',$tahun)
                            ->where('pembayaran_sppt.thn_pajak_sppt','!=',$tahun)
                            ->get();
    $pfebruari = dasboarModel::selectRaw('SUM(pembayaran_sppt.jml_sppt_yg_dibayar) as pfeb')
                            ->whereMonth('pembayaran_sppt.tgl_pembayaran_sppt',2)
                            ->whereYear('pembayaran_sppt.tgl_pembayaran_sppt',$tahun)
                            ->where('pembayaran_sppt.thn_pajak_sppt','!=',$tahun)
                            ->get();
    $pmaret = dasboarModel::selectRaw('SUM(pembayaran_sppt.jml_sppt_yg_dibayar) as pmar')
                            ->whereMonth('pembayaran_sppt.tgl_pembayaran_sppt',3)
                            ->whereYear('pembayaran_sppt.tgl_pembayaran_sppt',$tahun)
                            ->where('pembayaran_sppt.thn_pajak_sppt','!=',$tahun)
                            ->get();   
    $papril = dasboarModel::selectRaw('SUM(pembayaran_sppt.jml_sppt_yg_dibayar) as papr')
                            ->whereMonth('pembayaran_sppt.tgl_pembayaran_sppt',4)
                            ->whereYear('pembayaran_sppt.tgl_pembayaran_sppt',$tahun)
                            ->where('pembayaran_sppt.thn_pajak_sppt','!=',$tahun)
                            ->get();
    $pmei = dasboarModel::selectRaw('SUM(pembayaran_sppt.jml_sppt_yg_dibayar) as pmei')
                            ->whereMonth('pembayaran_sppt.tgl_pembayaran_sppt',5)
                            ->whereYear('pembayaran_sppt.tgl_pembayaran_sppt',$tahun)
                            ->where('pembayaran_sppt.thn_pajak_sppt','!=',$tahun)
                            ->get();
    $pjuni = dasboarModel::selectRaw('SUM(pembayaran_sppt.jml_sppt_yg_dibayar) as pjun')
                            ->whereMonth('pembayaran_sppt.tgl_pembayaran_sppt',6)
                            ->whereYear('pembayaran_sppt.tgl_pembayaran_sppt',$tahun)
                            ->where('pembayaran_sppt.thn_pajak_sppt','!=',$tahun)
                            ->get();   
    $pjuli = dasboarModel::selectRaw('SUM(pembayaran_sppt.jml_sppt_yg_dibayar) as pjul')
                            ->whereMonth('pembayaran_sppt.tgl_pembayaran_sppt',7)
                            ->whereYear('pembayaran_sppt.tgl_pembayaran_sppt',$tahun)
                            ->where('pembayaran_sppt.thn_pajak_sppt','!=',$tahun)
                            ->get();
    $pagustus = dasboarModel::selectRaw('SUM(pembayaran_sppt.jml_sppt_yg_dibayar) as pags')
                            ->whereMonth('pembayaran_sppt.tgl_pembayaran_sppt',8)
                            ->whereYear('pembayaran_sppt.tgl_pembayaran_sppt',$tahun)
                            ->where('pembayaran_sppt.thn_pajak_sppt','!=',$tahun)
                            ->get();
    $pseptember = dasboarModel::selectRaw('SUM(pembayaran_sppt.jml_sppt_yg_dibayar) as psep')
                            ->whereMonth('pembayaran_sppt.tgl_pembayaran_sppt',9)
                            ->whereYear('pembayaran_sppt.tgl_pembayaran_sppt',$tahun)
                            ->where('pembayaran_sppt.thn_pajak_sppt','!=',$tahun)
                            ->get();     
    $poktober = dasboarModel::selectRaw('SUM(pembayaran_sppt.jml_sppt_yg_dibayar) as pokt')
                            ->whereMonth('pembayaran_sppt.tgl_pembayaran_sppt',10)
                            ->whereYear('pembayaran_sppt.tgl_pembayaran_sppt',$tahun)
                            ->where('pembayaran_sppt.thn_pajak_sppt','!=',$tahun)
                            ->get();
    $pnovember = dasboarModel::selectRaw('SUM(pembayaran_sppt.jml_sppt_yg_dibayar) as pnov')
                            ->whereMonth('pembayaran_sppt.tgl_pembayaran_sppt',11)
                            ->whereYear('pembayaran_sppt.tgl_pembayaran_sppt',$tahun)
                            ->where('pembayaran_sppt.thn_pajak_sppt','!=',$tahun)
                            ->get();
    $pdesember = dasboarModel::selectRaw('SUM(pembayaran_sppt.jml_sppt_yg_dibayar) as pdes')
                            ->whereMonth('pembayaran_sppt.tgl_pembayaran_sppt',12)
                            ->whereYear('pembayaran_sppt.tgl_pembayaran_sppt',$tahun)
                            ->where('pembayaran_sppt.thn_pajak_sppt','!=',$tahun)
                            ->get();               
                            
//  Query penerimaan tahun aktif
$januari = dasboarModel::selectRaw('SUM(pembayaran_sppt.jml_sppt_yg_dibayar) as jan')
->whereMonth('pembayaran_sppt.tgl_pembayaran_sppt',1)
->whereYear('pembayaran_sppt.tgl_pembayaran_sppt',$tahun)
->where('pembayaran_sppt.thn_pajak_sppt',$tahun)
->get();
$februari = dasboarModel::selectRaw('SUM(pembayaran_sppt.jml_sppt_yg_dibayar) as feb')
->whereMonth('pembayaran_sppt.tgl_pembayaran_sppt',2)
->whereYear('pembayaran_sppt.tgl_pembayaran_sppt',$tahun)
->where('pembayaran_sppt.thn_pajak_sppt',$tahun)
->get();
$maret = dasboarModel::selectRaw('SUM(pembayaran_sppt.jml_sppt_yg_dibayar) as mar')
->whereMonth('pembayaran_sppt.tgl_pembayaran_sppt',3)
->whereYear('pembayaran_sppt.tgl_pembayaran_sppt',$tahun)
->where('pembayaran_sppt.thn_pajak_sppt',$tahun)
->get();   
$april = dasboarModel::selectRaw('SUM(pembayaran_sppt.jml_sppt_yg_dibayar) as apr')
->whereMonth('pembayaran_sppt.tgl_pembayaran_sppt',4)
->whereYear('pembayaran_sppt.tgl_pembayaran_sppt',$tahun)
->where('pembayaran_sppt.thn_pajak_sppt',$tahun)
->get();
$mei = dasboarModel::selectRaw('SUM(pembayaran_sppt.jml_sppt_yg_dibayar) as mei')
->whereMonth('pembayaran_sppt.tgl_pembayaran_sppt',5)
->whereYear('pembayaran_sppt.tgl_pembayaran_sppt',$tahun)
->where('pembayaran_sppt.thn_pajak_sppt',$tahun)
->get();
$juni = dasboarModel::selectRaw('SUM(pembayaran_sppt.jml_sppt_yg_dibayar) as jun')
->whereMonth('pembayaran_sppt.tgl_pembayaran_sppt',6)
->whereYear('pembayaran_sppt.tgl_pembayaran_sppt',$tahun)
->where('pembayaran_sppt.thn_pajak_sppt',$tahun)
->get();   
$juli = dasboarModel::selectRaw('SUM(pembayaran_sppt.jml_sppt_yg_dibayar) as jul')
->whereMonth('pembayaran_sppt.tgl_pembayaran_sppt',7)
->whereYear('pembayaran_sppt.tgl_pembayaran_sppt',$tahun)
->where('pembayaran_sppt.thn_pajak_sppt',$tahun)
->get();
$agustus = dasboarModel::selectRaw('SUM(pembayaran_sppt.jml_sppt_yg_dibayar) as ags')
->whereMonth('pembayaran_sppt.tgl_pembayaran_sppt',8)
->whereYear('pembayaran_sppt.tgl_pembayaran_sppt',$tahun)
->where('pembayaran_sppt.thn_pajak_sppt',$tahun)
->get();
$september = dasboarModel::selectRaw('SUM(pembayaran_sppt.jml_sppt_yg_dibayar) as sep')
->whereMonth('pembayaran_sppt.tgl_pembayaran_sppt',9)
->whereYear('pembayaran_sppt.tgl_pembayaran_sppt',$tahun)
->where('pembayaran_sppt.thn_pajak_sppt',$tahun)
->get();     
$oktober = dasboarModel::selectRaw('SUM(pembayaran_sppt.jml_sppt_yg_dibayar) as okt')
->whereMonth('pembayaran_sppt.tgl_pembayaran_sppt',10)
->whereYear('pembayaran_sppt.tgl_pembayaran_sppt',$tahun)
->where('pembayaran_sppt.thn_pajak_sppt',$tahun)
->get();
$november = dasboarModel::selectRaw('SUM(pembayaran_sppt.jml_sppt_yg_dibayar) as nov')
->whereMonth('pembayaran_sppt.tgl_pembayaran_sppt',11)
->whereYear('pembayaran_sppt.tgl_pembayaran_sppt',$tahun)
->where('pembayaran_sppt.thn_pajak_sppt',$tahun)
->get();
$desember = dasboarModel::selectRaw('SUM(pembayaran_sppt.jml_sppt_yg_dibayar) as des')
->whereMonth('pembayaran_sppt.tgl_pembayaran_sppt',12)
->whereYear('pembayaran_sppt.tgl_pembayaran_sppt',$tahun)
->where('pembayaran_sppt.thn_pajak_sppt',$tahun)
->get();                                                              
                            
  // CARD
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
            ->where('sppt.thn_pajak_sppt',$tahun)
            ->get();
    //    dd(compact('result'));
         return view('home', ["title" => "Dashboard"],compact('result','januari','februari','maret','april','mei','juni','juli','agustus','september','oktober','november','desember','pjanuari','pfebruari','pmaret','papril','pmei','pjuni','pjuli','pagustus','pseptember','poktober','pnovember','pdesember')); 
    }
}

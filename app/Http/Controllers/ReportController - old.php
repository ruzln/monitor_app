<?php

namespace App\Http\Controllers;

use App\Models\ModelSPPT;
use Illuminate\View\View;
use App\Models\RefKecamatan;
use Illuminate\Http\Request;
use App\Models\RealisasiModel;
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
// Pencarian berdasarkan Tahun Pajak
        if ($request->tahun != null)
            {
                $result     = DB::table('sppt')                
                ->leftJoin('pembayaran_sppt', [
        
                    ['sppt.kd_kecamatan',   '=', 'pembayaran_sppt.kd_kecamatan'],
                    ['sppt.kd_kelurahan',   '=', 'pembayaran_sppt.kd_kelurahan'],
                    ['sppt.kd_blok',        '=', 'pembayaran_sppt.kd_blok'],
                    ['sppt.no_urut',        '=', 'pembayaran_sppt.no_urut'],
                    ['sppt.kd_jns_op',      '=', 'pembayaran_sppt.kd_jns_op'],
                    ['sppt.thn_pajak_sppt', '=', 'pembayaran_sppt.thn_pajak_sppt']
                ])
                ->leftJoin('dat_objek_pajak', [
        
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
                ->where('sppt.thn_pajak_sppt', $tahun)
                ->where('sppt.status_pembayaran_sppt', 1)
                ->get();
            }
// Pencarian berdasarkan Kecamatan            
        if ($request->kecamatan != null)
            {
                $result     = DB::table('sppt')                
                ->leftJoin('pembayaran_sppt', [
           
                    ['sppt.kd_kecamatan',   '=', 'pembayaran_sppt.kd_kecamatan'],
                    ['sppt.kd_kelurahan',   '=', 'pembayaran_sppt.kd_kelurahan'],
                    ['sppt.kd_blok',        '=', 'pembayaran_sppt.kd_blok'],
                    ['sppt.no_urut',        '=', 'pembayaran_sppt.no_urut'],
                    ['sppt.kd_jns_op',      '=', 'pembayaran_sppt.kd_jns_op'],
                    ['sppt.thn_pajak_sppt', '=', 'pembayaran_sppt.thn_pajak_sppt']
                ])
                ->leftJoin('dat_objek_pajak', [
           
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
                ->where('sppt.kd_kecamatan',$kecamatan)
                ->where('sppt.status_pembayaran_sppt', 1)
                ->get();
            }
// Pencarian berdasarkan Tanggal Bayar      
        if ($request->start_date && $request->end_date != null)
            {        
                $result     = DB::table('sppt')                
                ->leftJoin('pembayaran_sppt', [
           
                    ['sppt.kd_kecamatan',   '=', 'pembayaran_sppt.kd_kecamatan'],
                    ['sppt.kd_kelurahan',   '=', 'pembayaran_sppt.kd_kelurahan'],
                    ['sppt.kd_blok',        '=', 'pembayaran_sppt.kd_blok'],
                    ['sppt.no_urut',        '=', 'pembayaran_sppt.no_urut'],
                    ['sppt.kd_jns_op',      '=', 'pembayaran_sppt.kd_jns_op'],
                    ['sppt.thn_pajak_sppt', '=', 'pembayaran_sppt.thn_pajak_sppt']
                ])
                ->leftJoin('dat_objek_pajak', [
           
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
                ->whereBetween('sppt.tgl_pembayaran_sppt', [$start_date,$end_date])
                ->where('sppt.status_pembayaran_sppt', 1)
                ->get();
            }
// Pencarian berdasarkan Tahun Pajak dan Tanggal Bayar
        if ($request->start_date && $request->end_date && $request->tahun != null)
            {        
                $result     = DB::table('sppt')                
                ->leftJoin('pembayaran_sppt', [
           
                    ['sppt.kd_kecamatan',   '=', 'pembayaran_sppt.kd_kecamatan'],
                    ['sppt.kd_kelurahan',   '=', 'pembayaran_sppt.kd_kelurahan'],
                    ['sppt.kd_blok',        '=', 'pembayaran_sppt.kd_blok'],
                    ['sppt.no_urut',        '=', 'pembayaran_sppt.no_urut'],
                    ['sppt.kd_jns_op',      '=', 'pembayaran_sppt.kd_jns_op'],
                    ['sppt.thn_pajak_sppt', '=', 'pembayaran_sppt.thn_pajak_sppt']
                ])
                ->leftJoin('dat_objek_pajak', [
           
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
                ->whereBetween('sppt.tgl_pembayaran_sppt', [$start_date,$end_date])
                ->where('sppt.status_pembayaran_sppt', 1)
                ->where('sppt.thn_pajak_sppt',$tahun)
                ->get();
            }    
// Pencarian berdasarkan Tanggal Bayar dan Kecamatan
        if ($request->start_date && $request->end_date && $request->kecamatan != null)
            {        
                $result     = DB::table('sppt')                
                ->leftJoin('pembayaran_sppt', [
           
                    ['sppt.kd_kecamatan',   '=', 'pembayaran_sppt.kd_kecamatan'],
                    ['sppt.kd_kelurahan',   '=', 'pembayaran_sppt.kd_kelurahan'],
                    ['sppt.kd_blok',        '=', 'pembayaran_sppt.kd_blok'],
                    ['sppt.no_urut',        '=', 'pembayaran_sppt.no_urut'],
                    ['sppt.kd_jns_op',      '=', 'pembayaran_sppt.kd_jns_op'],
                    ['sppt.thn_pajak_sppt', '=', 'pembayaran_sppt.thn_pajak_sppt']
                ])
                ->leftJoin('dat_objek_pajak', [
           
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
                ->whereBetween('sppt.tgl_pembayaran_sppt', [$start_date,$end_date])
                ->where('sppt.status_pembayaran_sppt', 1)
                ->where('sppt.kd_kecamatan',$kecamatan)
                ->get();
            }    
// Pencarian berdasarkan Tahun Pajak dan Kecamatan
        if ($request->kecamatan && $request->tahun != null)
            {
                $result     = DB::table('sppt')                
                ->leftJoin('pembayaran_sppt', [
           
                    ['sppt.kd_kecamatan',   '=', 'pembayaran_sppt.kd_kecamatan'],
                    ['sppt.kd_kelurahan',   '=', 'pembayaran_sppt.kd_kelurahan'],
                    ['sppt.kd_blok',        '=', 'pembayaran_sppt.kd_blok'],
                    ['sppt.no_urut',        '=', 'pembayaran_sppt.no_urut'],
                    ['sppt.kd_jns_op',      '=', 'pembayaran_sppt.kd_jns_op'],
                    ['sppt.thn_pajak_sppt', '=', 'pembayaran_sppt.thn_pajak_sppt']
                ])
                ->leftJoin('dat_objek_pajak', [
           
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
                ->where('sppt.kd_kecamatan',$kecamatan)
                ->Where('sppt.thn_pajak_sppt', $tahun)
                ->where('sppt.status_pembayaran_sppt', 1)
                ->get();
            }    
// Pencarian berdasarkan Tahun Pajak, Kecamatan dan Tanggal Bayar
        if ($request->start_date && $request->end_date && $request->kecamatan && $request->tahun != null)
            {       
                $result     = DB::table('sppt')                
                ->leftJoin('pembayaran_sppt', [
           
                    ['sppt.kd_kecamatan',   '=', 'pembayaran_sppt.kd_kecamatan'],
                    ['sppt.kd_kelurahan',   '=', 'pembayaran_sppt.kd_kelurahan'],
                    ['sppt.kd_blok',        '=', 'pembayaran_sppt.kd_blok'],
                    ['sppt.no_urut',        '=', 'pembayaran_sppt.no_urut'],
                    ['sppt.kd_jns_op',      '=', 'pembayaran_sppt.kd_jns_op'],
                    ['sppt.thn_pajak_sppt', '=', 'pembayaran_sppt.thn_pajak_sppt']
                ])
                ->leftJoin('dat_objek_pajak', [
           
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
                ->whereBetween('sppt.tgl_pembayaran_sppt', [$start_date,$end_date])
                ->where('sppt.status_pembayaran_sppt', 1)
                ->Where('sppt.thn_pajak_sppt', $tahun)
                ->Where('sppt.kd_kecamatan',$kecamatan)
                ->get();
            }
            // dd($result);
            return view('content.date_report',compact('result','kec'),["title" => "Report"]);
          
    }
}
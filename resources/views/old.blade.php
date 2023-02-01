@foreach ($result as $item)
 <div>
    Jumlah SPPT= {{ $item->jumlah_sppt }}<br>
 </div>
 <div>
    Target =   @currency ($item->target)<br>
 </div>
 <div>
    persentase =  @percent($item->realisasi_pokok/$item->target)<br>
 </div>
 <div>
    realisasi pokok = @currency ($item->realisasi_pokok)<br>
 </div>
 <div>
    realisasi total = @currency ($item->realisasi_total)
 </div>

@endforeach
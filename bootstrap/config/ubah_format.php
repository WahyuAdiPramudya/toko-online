<?php
  function ubah_format($tanggal){
    $ex = explode("-",$tanggal);
    $tahun = $ex[0];
    $bulan = $ex[1];
    $tanggal = $ex[2];
    $hasil_ubah = $tanggal."/".$bulan."/".$tahun;
    return $hasil_ubah;
  }
?>

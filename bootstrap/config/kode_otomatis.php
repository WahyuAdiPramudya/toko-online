<?php
  function kode_otomatis($field,$table,$conn){
    $query = mysqli_query($conn,"SELECT {$field} FROM {$table} order by {$field} DESC limit 0,1");
    $hitung = mysqli_num_rows($query);
      if($hitung == "0"){
        $kode_terakhir = "1";
        $ex_table = explode('_',$table);
        $kode1 = strtoupper(substr($ex_table[0],0,1));
        $kode2 = strtoupper(substr($ex_table[1],0,1));
        $kode_surat = $kode1.$kode2;

          if($kode_terakhir>0){
            $kode_baru = $kode_terakhir;
            $kode_otomatis = $kode_surat."-".$kode_baru;
          }
          else{
            $kode_otomatis = $kode_surat."-1";
          }
      }
      else{
        $array = mysqli_fetch_assoc($query);
        $ex = explode('-',$array[$field]);
        $kode_terakhir = $ex[1];
        $ex_table = explode('_',$table);
        $kode1 = strtoupper(substr($ex_table[0],0,1));
        $kode2 = strtoupper(substr($ex_table[1],0,1));
        $kode_surat = $kode1.$kode2;

          if($kode_terakhir>0){
            $kode_baru = $kode_terakhir+1;
            $kode_otomatis = $kode_surat."-".$kode_baru;
          }
          else{
            $kode_otomatis = $kode_surat."-1";
          }
      }

      return $kode_otomatis;
  }
?>

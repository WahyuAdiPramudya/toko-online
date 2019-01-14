<?php
include "../config/paket.php";
$db = new DB();
if(isset($_POST['save_edit'])){
  $table = "surat_masuk";
  $val = $_POST['id_edit'];
  $data = array(
            "id_surat_masuk" => $val,
            "id_jenis"       => $_POST['jenis_edit'],
            "tanggal_kirim"  => $_POST['tanggal_kirim_edit'],
            "tanggal_terima" => $_POST['tanggal_terima_edit'],
            "no_surat_masuk" => $_POST['no_edit'],
            "pengirim"       => $_POST['pengirim_edit'],
            "perihal"        => $_POST['perihal_edit'],
            "id_disposisi"    => $_POST['tujuan_edit']
          );
  $field = "id_surat_masuk";
  $update = $db->update($table, $data, $field, $val,$conn);
    if($update = TRUE){
      echo "<script>alert('success');</script>";
      echo "<meta http-equiv='refresh' content='0'>";
    }
}

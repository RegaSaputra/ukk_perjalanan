<?php
session_start();
$nik        = $_SESSION['nik'];
$nama_lengkap = $_SESSION['nama_lengkap'];
$tanggal = $_POST['tanggal'];
$jam = $_POST['jam'];
$lokasi = $_POST['lokasi'];
$suhu = $_POST['suhu'];
$id_catatan = $_POST['id_catatan'];

$format = "$id_catatan|$nik|$nama_lengkap|$tanggal|$jam|$lokasi|$suhu";

$np = 0;
$data = file('catatan.txt', FILE_IGNORE_NEW_LINES);
foreach($data as $value){
    $no++;
    $pecah = explode("|",$value);
    if($pecah['0']==$id_catatan){
        $line = $no-1; //mencari urutan baris ke berapa
    }
}

$data[$line] = $format;
$data = implode("\n",$data);
file_put_contents('catatan.txt',$data);
?>



<script type="text/javascript">
    alert('Data Catatan Perjalanan Sudah Terubah');
    window.location.assign('user.php?url=catatan_perjalanan');
</script>
<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "anggota_bpjs";
$koneksi = mysqli_connect($host, $user, $pass, $db);
// menyimpan data kedalam variabel
$id_rekam_medis = $_POST['id_rekam_medis'];
$id_anggota = $_POST['id_anggota'];
$tanggal_rekam = $_POST['tanggal_rekam'];
$gejala = $_POST['gejala'];
$tindakan = $_POST['tindakan'];
$resep_obat = $_POST['tindakan'];
$pasien = mysqli_query($koneksi, "Select * from rekam_medis where id_rekam_medis ='$id_rekam_medis'");
$row = mysqli_fetch_array($pasien);
$sql1 = "UPDATE rekam_medis SET id_rekam_medis='$id_rekam_medis',id_anggota='$id_anggota',tanggal_rekam='$tanggal_rekam',gejala='$gejala',tindakan='$tindakan',resep_obat='$resep_obat' where id_rekam_medis='$id_rekam_medis'";
$query = mysqli_query($koneksi, $sql1);
if ($query) {
    echo "<script> alert ('Data berhasil diubah')</script>";
    header("refresh:0;rekam_medis.php");
} else {
    $data = array(
        'status' => 'failed',
    );
    echo json_encode($data);
}
?>
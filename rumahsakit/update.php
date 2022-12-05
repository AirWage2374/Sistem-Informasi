<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "anggota_bpjs";
$koneksi = mysqli_connect($host, $user, $pass, $db);
// menyimpan data kedalam variabel
$id_anggota = $_POST['id_anggota'];
$nama = $_POST['nama'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$pasien = mysqli_query($koneksi, "Select * from anggota_bpjs where id_anggota ='$id_anggota'");
$row = mysqli_fetch_array($pasien);
$sql1 = "UPDATE anggota_bpjs SET id_anggota='$id_anggota',nama='$nama',jenis_kelamin='$jenis_kelamin',jenis_kelamin='$jenis_kelamin',tanggal_lahir='$tanggal_lahir' where id_anggota='$id_anggota'";
$query = mysqli_query($koneksi, $sql1);
if ($query) {
    echo "<script> alert ('Data berhasil diubah')</script>";
    header("refresh:0;index.php");
} else {
    $data = array(
        'status' => 'failed',
    );
    echo json_encode($data);
}
// mengalihkan ke halaman index.php

header("location:index.php");
?>
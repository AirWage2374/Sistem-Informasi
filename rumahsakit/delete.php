<?php
$host   = "localhost";
$user   = "root";
$pass   = "";
$db     = "anggota_bpjs";
$koneksi = mysqli_connect($host,$user,$pass,$db);
// menyimpan data id kedalam variabel
$id_anggota  = $_GET['id_anggota'];
// query SQL untuk insert data
$query="DELETE from anggota_bpjs where id_anggota='$id_anggota'";
mysqli_query($koneksi, $query);
// mengalihkan ke halaman index.php
header("location:index.php");
?>
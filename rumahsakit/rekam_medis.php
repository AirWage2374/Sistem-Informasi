<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "anggota_bpjs";

$id_anggota = "";
$nama = "";
$koneksi = mysqli_connect($host, $user, $pass, $db);
$data2 = mysqli_query($koneksi, "SELECT * from rekam_medis");
$row = mysqli_fetch_array($data2);
if (!$koneksi) {
    die("Eror : Tidak Terkoneksi ke Database");
}

if(isset($_POST['nama'])) {
    $nama = $_POST['nama'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rumah Sakit</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <style>
        .mx-auto {
            width: 1600px
        }
        .card {
            margin-top: 10px
        }
    </style>
</head>

<body>
    <div class="mx-auto">
        <!-- Memunculkan table rekam medis -->
                <div class="text-center">
                <img class="w-15 p-3" src="https://assets.coingecko.com/coins/images/3519/large/heart-logo-for-mediccoin-version-2-1200.png">
                <div class="card-header text-success">
                <h1>Data Rekam Medis <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-heart-pulse-fill" viewBox="0 0 16 16">
  <path d="M1.475 9C2.702 10.84 4.779 12.871 8 15c3.221-2.129 5.298-4.16 6.525-6H12a.5.5 0 0 1-.464-.314l-1.457-3.642-1.598 5.593a.5.5 0 0 1-.945.049L5.889 6.568l-1.473 2.21A.5.5 0 0 1 4 9H1.475Z"/>
  <path d="M.88 8C-2.427 1.68 4.41-2 7.823 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C11.59-2 18.426 1.68 15.12 8h-2.783l-1.874-4.686a.5.5 0 0 0-.945.049L7.921 8.956 6.464 5.314a.5.5 0 0 0-.88-.091L3.732 8H.88Z"/>
</svg></h1>
                <a href="tambah_rm.php" class="btn btn-outline-primary" class="d-grid gap-2 d-md-flex justify-content-md-end"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus" viewBox="0 0 16 16">
  <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
  <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
</svg> Tambah Data</a>
            </div>
                </div>
                <table id="tabel-data" class="table table-bordered table-hover">
                    <thead>
                        <tr class="table-secondary">
                            <th>ID Rekam Medis</th>
                            <th>ID Anggota</th>
                            <th>Tanggal Rekam</th>
                            <th>Gejala</th>
                            <th>Tindakan</th>
                            <th>Resep Obat</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    if(isset($_GET['id_anggota'])) {
                        $id_anggota = $_GET['id_anggota'];
                        $rekam_medis = mysqli_query($koneksi, "select * from rekam_medis where id_anggota ='$id_anggota'");
                    while ($cetak = mysqli_fetch_array($rekam_medis)) {
                    echo "<tr>
                    <td>" . $cetak['id_rekam_medis'] . "</td>
                    <td>" . $cetak['id_anggota'] . "</td>
                    <td>" . $cetak['tanggal_rekam'] . "</td>
                    <td>" . $cetak['gejala'] . "</td>
                    <td>" . $cetak['tindakan'] . "</td>
                    <td>" . $cetak['resep_obat'] . "</td>            
                    </tr>";
                    }
                    }?>
                    </tbody>
                </table>
    </div>
</body>

</html>
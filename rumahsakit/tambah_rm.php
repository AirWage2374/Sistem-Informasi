<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "anggota_bpjs";

$koneksi = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) {
    die("Eror : Tidak Terkoneksi ke Database");
}

$id_rekam_medis = "";
$id_anggota = "";
$tanggal_rekam = "";
$gejala = "";
$tindakan = "";
$resep_obat = "";
$sukses = "";
$error = "";

if (isset($_POST['save'])) {
    $id_rekam_medis = $_POST['id_rekam_medis'];
    $id_anggota = $_POST['id_anggota'];
    $tanggal_rekam = $_POST['tanggal_rekam'];
    $gejala = $_POST['gejala'];
    $tindakan = $_POST['tindakan'];
    $resep_obat = $_POST['resep_obat'];

    if ($id_rekam_medis && $id_anggota && $tanggal_rekam && $gejala && $tindakan && $resep_obat) {
        $sql1 = "insert into rekam_medis (id_rekam_medis,id_anggota,tanggal_rekam,gejala,tindakan,resep_obat) values ('$id_rekam_medis','$id_anggota','$tanggal_rekam','$gejala','$tindakan','$resep_obat')";
        $sq1 = mysqli_query($koneksi, $sql1);
        if ($sq1) {
            $sukses = "Berhasil memasukkan data baru";
            header("refresh:0;rekam_medis.php?id_rekam_medis=$cetak[id_rekam_medis]");
        } else {
            $error = "Gagal memasukkan data baru";
        }
    } else {
        $error = "Silahkan masukkan semua data ";
    }
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
            width: 800px
        }

        .card {
            margin-top: 10px
        }
    </style>
</head>

<body>
    <div class="mx-auto">
        <!-- Memasukkan data rekam medis -->
        <div class="card border-success">
            <div class="card-header text-success">
                <h2>Tambahkan Riwayat Rekam Medis Pada Pasien</h2>
            </div>
            <div class="card-body text-light">
                <?php
                if ($error) {
                ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $error ?>
                </div>
                <?php
                }
                ?>
                <?php
                if ($sukses) {
                ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $sukses ?>
                </div>
                <?php
                }
                ?>
                <form action="" method="POST">
                    <div class="mb-3 row">
                        <label for="id_rekam_medis" class="col-sm-2 col-form-label">ID Rekam Medis</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id_rekam_medis" name="id_rekam_medis"
                                value="<?php echo $id_rekam_medis ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="id_anggota" class="col-sm-2 col-form-label">ID Anggota</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id_anggota" name="id_anggota"
                                value="<?php echo $id_anggota ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="tanggal_rekam" class="col-sm-2 col-form-label">Tanggal Rekam Medis</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="tanggal_rekam" name="tanggal_rekam"
                                value="<?php echo $tanggal_rekam ?>" placeholder="YYYY-MM-DD">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="gejala" class="col-sm-2 col-form-label">Gejala</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="gejala" name="gejala"
                                value="<?php echo $gejala ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="tindakan" class="col-sm-2 col-form-label">Tindakan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="tindakan" name="tindakan"
                                value="<?php echo $tindakan ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="resep_obat" class="col-sm-2 col-form-label">Resep Obat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="resep_obat" name="resep_obat"
                                value="<?php echo $resep_obat ?>">
                        </div>
                    </div>
                    <div class="col-12">
                        <input type="submit" name="save" value="Simpan data" class="btn btn-primary" />
                    </div>
                </form>
            </div>
        </div>

<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "anggota_bpjs";

$koneksi = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) {
    die("Eror : Tidak Terkoneksi ke Database");
}

$id_anggota = "";
$nama = "";
$jenis_kelamin = "";
$tanggal_lahir = "";
$sukses = "";
$error = "";

if (isset($_POST['simpan'])) {
    $id_anggota = $_POST['id_anggota'];
    $nama = $_POST['nama'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $tanggal_lahir = $_POST['tanggal_lahir'];

    if ($id_anggota && $nama && $jenis_kelamin && $tanggal_lahir) {
        $sql1 = "insert into anggota_bpjs (id_anggota,nama,jenis_kelamin,tanggal_lahir) values ('$id_anggota','$nama','$jenis_kelamin','$tanggal_lahir')";
        $sq1 = mysqli_query($koneksi, $sql1);
        if ($sq1) {
            $sukses = "Berhasil memasukkan data baru";
            header("refresh:0;index.php");
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
    <title>Tambah Data</title>

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
        <!-- Memasukkan Data Anggota BPJS -->
        <div class="card border-primary">
            <div class="card-header text-primary">
                <h2>Masukan Data Pasien Anggota BPJS</h2>
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
                        <label for="id_anggota" class="col-sm-2 col-form-label">ID Anggota</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id_anggota" name="id_anggota"
                                value="<?php echo $id_anggota ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                                <option value=""> Pilih Jenis Kelamin</option>
                                <option value="Laki-laki" <?php if ($jenis_kelamin=="Laki-laki")
                                    echo "selected" ?>
                                    >Laki-laki</option>
                                <option value="Perempuan" <?php if ($jenis_kelamin=="Perempuan")
                                    echo "selected" ?>
                                    >Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                                value="<?php echo $tanggal_lahir ?>" placeholder="YYYY-MM-DD">
                        </div>
                    </div>

                    <div class="col-12">
                        <input type="submit" name="simpan" value="Simpan data" class="btn btn-success" />
                    </div>
                </form>
            </div>
        </div>
            </tbody>
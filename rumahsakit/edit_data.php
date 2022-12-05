<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "anggota_bpjs";

$koneksi = mysqli_connect($host, $user, $pass, $db);
$id_anggota = $_GET['id_anggota'];
$pasien = mysqli_query($koneksi, "Select * from anggota_bpjs where id_anggota = '$id_anggota'");
$hasil = mysqli_fetch_array($pasien);
$jenis_kelamin = "";
// membuat function untuk set aktif radio button
function active_radio_button($value, $input)
{
    // apabilan value dari radio sama dengan yang di input
    $result = $value == $input ? 'checked' : '';
    return $result;
}
?>
<!DOCTYPE html>
<html>

<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.13.1/datatables.min.css" />
    <title>Edit</title>
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
<form method="post" action="update.php?id_anggota = $_GET['id_anggota']">
        <input type="hidden" value="<?php echo $row['id_anggota']; ?>" name="id_anggota">
        <div class="mx-auto">
        <div class="card border-primary">
            <div class="card-header text-success">
                <h2>Ubah Data Pasien Anggota BPJS</h2>
            </div>
        <table>
            <tr>
                <td>Id_anggota</td>
                <td><input for="disabledTextInput" type="text" name="id_anggota" value="<?php echo $hasil['id_anggota']; ?>"></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><input type="text" value="<?php echo $hasil['nama']; ?>" name="nama"></td>
            </tr>
            <tr>
                <td>JENIS KELAMIN</td>
                <td>
                    <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                        <option value=""> -- Pilih Jenis Kelamin --</option>
                        <option value="Laki-laki" <?php if ($jenis_kelamin=="Laki-laki")
                                    echo "selected" ?>>Laki-laki
                        </option>
                        <option value="Perempuan" <?php if ($jenis_kelamin=="Perempuan")
                                    echo "selected" ?>>Perempuan
                        </option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                 <td><input value="<?php echo $hasil['tanggal_lahir']; ?>" type="date" name="tanggal_lahir"></td>
            </tr>
            <tr>
                <td colspan="2"><button type="submit" name="changes" value="simpan">SIMPAN PERUBAHAN</button>
                    <a href="index.php">Kembali</a>
                </td>
            </tr>
        </table>
    </div>
    </div>
    </form>
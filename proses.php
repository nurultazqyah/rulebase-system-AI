<?php
include 'koneksi.php';

// ======================
// AMBIL DATA FORM
// ======================

$nama = $_POST['nama'];
$jurusan = $_POST['jurusan'];
$penghasilan = $_POST['penghasilan'];
$tanggungan = $_POST['tanggungan'];
$jalur = $_POST['jalur'];
$prestasi = $_POST['prestasi'];
$kondisi_ortu = $_POST['kondisi_ortu'];
$semester = $_POST['semester'];

// ======================
// DEFAULT
// ======================

$grade = 1;
$nominal = 400000;

// ======================
// RULE PRESTASI
// ======================

if ($prestasi == "Hafal 30 Juz") {

    $grade = 1;

}

// ======================
// RULE KONDISI ORTU
// ======================

else if ($kondisi_ortu == "Kedua Meninggal") {

    $grade = 1;

}

// ======================
// RULE PENGHASILAN
// ======================

else {

    if ($penghasilan <= 2000000 && $tanggungan >= 4) {

        $grade = 1;

    }

    else if ($penghasilan <= 4000000) {

        $grade = 2;

    }

    else if ($penghasilan <= 6000000) {

        $grade = 3;

    }

    else if ($penghasilan <= 8000000) {

        $grade = 4;

    }

    else if ($penghasilan <= 10000000) {

        $grade = 5;

    }

    else {

        $grade = 6;

    }
}

// ======================
// RULE TANGGUNGAN
// ======================

if ($tanggungan >= 5 && $grade > 1) {

    $grade--;

}

// ======================
// RULE JALUR MANDIRI
// ======================

if ($jalur == "Mandiri" && $grade < 7) {

    $grade++;

}

// ======================
// DATA UKT BERDASARKAN JURUSAN
// ======================

if ($jurusan == "Pendidikan Agama Islam") {

    $data = [
        1 => 400000,
        2 => 2461000,
        3 => 2942500,
        4 => 3477500,
        5 => 3905500,
        6 => 4387000,
        7 => 4547500
    ];

}

else if ($jurusan == "Pendidikan Guru Madrasah") {

    $data = [
        1 => 400000,
        2 => 2461000,
        3 => 2942500,
        4 => 3477500,
        5 => 3905500,
        6 => 4387000,
        7 => 4547500
    ];

}

else if ($jurusan == "Ekonomi Syariah") {

    $data = [
        1 => 400000,
        2 => 2728500,
        3 => 3317000,
        4 => 3745000,
        5 => 4012500,
        6 => 4387000,
        7 => 4601000
    ];

}

else if ($jurusan == "Komunikasi Penyiaran Islam") {

    $data = [
        1 => 400000,
        2 => 2461000,
        3 => 2942500,
        4 => 3477500,
        5 => 3905500,
        6 => 4066000,
        7 => 4280000
    ];

}

else if ($jurusan == "Kedokteran") {

    $data = [
        1 => 400000,
        2 => 17750000,
        3 => 22650000,
        4 => 26200000,
        5 => 30300000,
        6 => 32650000,
        7 => 35550000
    ];

}

else {

    die("Jurusan tidak ditemukan");

}

// ======================
// AMBIL NOMINAL UKT
// ======================

$nominal = $data[$grade];

// ======================
// POTONGAN SEMESTER
// ======================

$ukt_awal = $nominal;
$potongan = 0;

// semester 12 ke atas dapat potongan

if ($semester >= 12) {

    $potongan = $nominal * 0.5;

    $nominal = $nominal - $potongan;

}

// ======================
// SIMPAN DATABASE
// ======================

$query = "INSERT INTO mahasiswa (
    nama,
    jurusan,
    penghasilan,
    tanggungan,
    jalur,
    prestasi,
    kondisi_ortu,
    semester,
    grade_ukt,
    nominal_ukt
)

VALUES (
    '$nama',
    '$jurusan',
    '$penghasilan',
    '$tanggungan',
    '$jalur',
    '$prestasi',
    '$kondisi_ortu',
    '$semester',
    'Grade $grade',
    '$nominal'
)";

mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html>
<head>

    <title>Hasil UKT</title>

    <link rel="stylesheet" href="style.css">

    <style>

        body{
            font-family: Arial;
            background: #f4f4f4;
        }

        .container{
            width: 550px;
            margin: 50px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.2);
        }

        h1{
            text-align: center;
            color: #0066cc;
        }

        p{
            font-size: 18px;
        }

        a{
            text-decoration: none;
            padding: 10px 15px;
            background: #0066cc;
            color: white;
            border-radius: 5px;
            margin-right: 10px;
        }

        a:hover{
            background: #004999;
        }

    </style>

</head>

<body>

<div class="container">

    <h1>HASIL PENENTUAN UKT</h1>

    <p>
        <b>Nama:</b>
        <?php echo $nama; ?>
    </p>

    <p>
        <b>Jurusan:</b>
        <?php echo $jurusan; ?>
    </p>

    <p>
        <b>Semester:</b>
        <?php echo $semester; ?>
    </p>

    <p>
        <b>Grade UKT:</b>
        Grade <?php echo $grade; ?>
    </p>

    <?php if ($semester >= 12) { ?>

        <p>
            <b>UKT Awal:</b>
            Rp <?php echo number_format($ukt_awal, 0, ',', '.'); ?>
        </p>

        <p>
            <b>Potongan 50%:</b>
            Rp <?php echo number_format($potongan, 0, ',', '.'); ?>
        </p>

        <p>
            <b>UKT Setelah Potongan:</b>
            Rp <?php echo number_format($nominal, 0, ',', '.'); ?>
        </p>

    <?php } else { ?>

        <p>
            <b>Nominal UKT:</b>
            Rp <?php echo number_format($nominal, 0, ',', '.'); ?>
        </p>

    <?php } ?>

    <br><br>

    <a href="index.php">Kembali</a>

    <a href="data.php">Lihat Data</a>

</div>

</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <title>Sistem UKT UIN Mataram</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

<h1>Sistem Penentuan UKT UIN Mataram</h1>

<form action="proses.php" method="POST">

<label>Nama Mahasiswa</label>
<input type="text" name="nama" required>

<label>Jurusan</label>
<select name="jurusan" required>
    <option value="Pendidikan Agama Islam">Pendidikan Agama Islam</option>
    <option value="Pendidikan Guru Madrasah">Pendidikan Guru Madrasah</option>
    <option value="Ekonomi Syariah">Ekonomi Syariah</option>
    <option value="Kedokteran">Kedokteran</option>
    <option value="Komunikasi Penyiaran Islam">Komunikasi Penyiaran Islam</option>
</select>

<label>Penghasilan Orang Tua</label>
<input type="number" name="penghasilan" required>

<label>Jumlah Tanggungan</label>
<input type="number" name="tanggungan" required>

<label>Jalur Masuk</label>
<select name="jalur">
    <option value="SPAN">SPAN</option>
    <option value="Prestasi">Prestasi</option>
    <option value="Mandiri">Mandiri</option>
</select>

<label>Prestasi</label>
<select name="prestasi">
    <option value="Tidak Ada">Tidak Ada</option>
    <option value="Hafal 30 Juz">Hafal 30 Juz</option>
</select>

<label>Kondisi Orang Tua</label>
<select name="kondisi_ortu">
    <option value="Lengkap">Lengkap</option>
    <option value="Salah Satu Meninggal">Salah Satu Meninggal</option>
    <option value="Kedua Meninggal">Kedua Meninggal</option>
</select>

<label>Semester</label>
<input type="number" name="semester" required>

<button type="submit">Proses UKT</button>

</form>

</div>

</body>
</html>

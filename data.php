<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'koneksi.php';

$data = mysqli_query($conn, "SELECT * FROM mahasiswa");

?>

<!DOCTYPE html>
<html>
<head>

    <title>Data Mahasiswa</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

    <h1>Data Mahasiswa UKT</h1>

    <table>

        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Jurusan</th>
            <th>Grade</th>
            <th>Nominal UKT</th>
        </tr>

        <?php

        $no = 1;

        while($row = mysqli_fetch_assoc($data)) {

        ?>

        <tr>

            <td><?php echo $no++; ?></td>

            <td><?php echo $row['nama']; ?></td>

            <td><?php echo $row['jurusan']; ?></td>

            <td><?php echo $row['grade_ukt']; ?></td>

            <td>
                Rp <?php echo number_format($row['nominal_ukt'],0,',','.'); ?>
            </td>

        </tr>

        <?php } ?>

    </table>

</div>

</body>
</html>

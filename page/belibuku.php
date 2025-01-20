<?php
include 'koneksi.php';
$id_user = $_SESSION['user']['id'];

if(isset($_GET['kembalikan'])) {
    $id_pinjam = $_GET['kembalikan'];
    $koneksi->query("UPDATE pinjam SET status = 'dikembalikan' WHERE id = '$id_pinjam'");
    $_SESSION['alert'] = 'Buku berhasil dikembalikan';
    header('Location: belibuku.php');
    die;
}

if(isset($_GET['beli'])) {
    $id_buku = $_GET['beli'];
    // cek apakah buku ini sudah dipinjam oleh user ini
    $query = $koneksi->query("SELECT * FROM pinjam WHERE buku_id = '$id_buku' AND user_id = '$id_user' AND status = 'dipinjam'");
    if($query->num_rows > 0) {
        $_SESSION['alert'] = 'Buku ini sudah dibeli';
        header('Location: homepage.php#content');
        die;
    }
    $status = 'dipinjam';
    $tanggal = date('Y-m-d');
    $koneksi->query("INSERT INTO pinjam (buku_id, user_id, status, tanggal) VALUES ('$id_buku', '$id_user', '$status', '$tanggal')");
    $_SESSION['alert'] = 'Buku berhasil dibeli';
    header('Location: belibuku.php');
    die;
}

$query = $koneksi->query("SELECT  buku.*,  pinjam.id, buku.id as id_buku FROM pinjam INNER JOIN buku ON pinjam.buku_id = buku.id WHERE user_id = '$id_user' AND status = 'dipinjam'");
?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Beli Buku</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../assets/style.css">
</head>

<body>
    <?php include 'header.php'; ?>

   
    <section class="content" id="content"> 
        <h3 class="title">
            Buku Saya Beli
        </h3>

        <?php include 'alert.php'; ?>
        
        <div class="container">
            <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Buku</th>
                        <th>Pengarang</th>
                        <th>Penerbit</th>
                        <th>Tahun Terbit</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
              
                    <?php $no=1; while ($data = $query->fetch_array()) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $data['judul']; ?></td>
                        <td><img src="../buku/sampul/<?= $data['sampul']; ?>" style="width:60px"></td>
                        <td><?= $data['pengarang']; ?></td>
                        <td><?= $data['penerbit']; ?></td>
                        <td><?= $data['tahun']; ?></td>
                        <td>
                        <a href="?kembalikan=<?= $data['id']; ?>" class="btn3 btn-dark">Hapus</a>
                        <a href="showbuku.php?show=<?= $data['id_buku']; ?>" class="btn3 btn-dark">Lihat</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                        
                </tbody>
            </table>
            </div>
        </div>
            



        </div>
    </section>


    <footer>
        <p>Beli Buku</p>
        <p>@copyright Beli Buku 2025</p>
        <ul>
            
        </ul>
    </footer>
</body>

</html>
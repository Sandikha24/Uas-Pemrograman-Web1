<?php
include 'koneksi.php';

if(isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $sql = "DELETE FROM buku WHERE id = '$id'";
    $query = $koneksi->query($sql);
    if($query) {
        $_SESSION['alert'] = 'Buku berhasil dihapus';
    }
}

$sq = "SELECT * FROM buku";
$query = $koneksi->query($sq);


?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pinjam Buku</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../assets/style.css">
</head>

<body>
    <?php include 'header.php'; ?>

   
    <section class="content" id="content"> 
        <h3 class="title">
            Buku
        </h3>

        <?php include 'alert.php'; ?>
        
        <div class="container">
            <a href="listbuku-tambah.php" class="btn3 btn-blue mb-1">Tambah</a>
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
                        <a href="listbuku-edit.php?id=<?= $data['id']; ?>" class="btn3 btn-dark">Edit</a>
                        <a href="?hapus=<?= $data['id']; ?>" class="btn3 btn-dark">Hapus</a>
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
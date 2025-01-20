<?php
include 'koneksi.php';
if(isset($_POST['judul'])) {
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];
    $tahun = $_POST['tahun'];
    $id = $_GET['id'];

    // Move FIle
    if(isset($_FILES['buku']) && $_FILES['buku']['name'] != '') {
        $nama_buku = $_FILES['buku']['name'];
        $tmp_file = $_FILES['buku']['tmp_name'];
        $upload = move_uploaded_file($tmp_file, '../buku/pdf/'.$nama_buku);
        $sql = "UPDATE buku SET buku = '$nama_buku' WHERE id = '$id'";
        $koneksi->query($sql);
    }
    if(isset($_FILES['sampul']) && $_FILES['sampul']['name'] != '') {
        $nama_sampul = $_FILES['sampul']['name'];
        $tmp_file = $_FILES['sampul']['tmp_name'];
        $upload = move_uploaded_file($tmp_file, '../buku/sampul/'.$nama_sampul);
        $sql = "UPDATE buku SET sampul = '$nama_sampul' WHERE id = '$id'";
        $koneksi->query($sql);
    }

        $sql = "UPDATE buku SET judul = '$judul', pengarang = '$pengarang', penerbit = '$penerbit', tahun = '$tahun' WHERE id = '$id'";
        $query = $koneksi->query($sql);
        if($query) {
            $_SESSION['alert'] = 'Buku berhasil disimpan';
            header('Location: listbuku.php');
            die;
        } else {
            $_SESSION['alert'] = 'Buku gagal disimpan';
        }
}

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM buku WHERE id = '$id'";
    $query = $koneksi->query($sql);
    $data = $query->fetch_array();
}

?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Beli  Buku</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../assets/style.css">
</head>

<body>
    <?php include 'header.php'; ?>

   
    <section class="content" id="content"> 
        <h3 class="title">
            Tambah Buku
        </h3>
        
        <div class="container">
            <?php include 'alert.php'; ?>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="judul">Judul</label>
                    <input type="text" id="judul" name="judul" required value="<?= $data['judul']; ?>">
                </div>
                <div class="form-group">
                    <label for="pengarang">Pengarang</label>
                    <input type="text" id="pengarang" name="pengarang" required value="<?= $data['pengarang']; ?>">
                </div>
                <div class="form-group">
                    <label for="penerbit">Penerbit</label>
                    <input type="text" id="penerbit" name="penerbit" required value="<?= $data['penerbit']; ?>">
                </div>
                <div class="form-group">
                    <label for="tahun">Tahun Terbit</label>
                    <input type="text" id="tahun" name="tahun" required value="<?= $data['tahun']; ?>">
                </div>
                <div class="form-group">
                    <label for="buku">Buku <sup>*Pdf</sup></label>
                    <input type="file" id="buku" name="buku" accept="application/pdf">
                </div>
                <div class="form-group">
                    <label for="sampul">Sampul</label>
                    <input type="file" id="sampul" name="sampul" accept="image/*">
                </div>
                <button type="submit" class="btn2 btn-dark">Simpan</button>
            </form>
            
        </div>
            



        </div>
    </section>


    <footer>
        <p>Beli  Buku</p>
        <p>@copyright Beli  Buku 2025</p>
        <ul>
            
        </ul>
    </footer>
</body>

</html>
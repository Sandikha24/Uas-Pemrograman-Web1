<?php
include 'koneksi.php';

$buku = $koneksi->query("SELECT * FROM buku");
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

    <section class="hero" id="home">
        <div style="background-image: url('../assets/background.jpg')"
            class="background-image"></div>
        <div class="hero-content-area">
            <h1>Beli Buku</h1>
            <h3>Tambah Pengetahan dengan membaca buku</h3>
            <a href="#content" class="btn">Beli Sekarang!!!</a>
        </div>
    </section>
    <section class="content" id="content"> 
        <h3 class="title">
            Buku
        </h3>

        <?php include 'alert.php'; ?>
        
        <div class="caribuku">
            <input type="search" placeholder="Cari Buku..." id="cari">
        </div>

        <div class="row" id="listbuku">

            <?php $no = 1; while ($data = $buku->fetch_array()) : ?>
            <div class="column">
                <div class="card">
                    <img src="../buku/sampul/<?= $data['sampul']; ?>" class="buku-image">
                    <div class="container">
                        <h2 class="buku-title"><?= $data['judul']; ?></h2>
                        <p class="buku-description">
                            <?= $data['pengarang']; ?> , <?= $data['penerbit']; ?> , <?= $data['tahun']; ?>
                        </p>
                        <?php if(isset($_SESSION['user'])) :?>
                            <?php if($_SESSION['user']['role'] == 'user') : ?>
                            <p><a href="belibuku.php?beli=<?= $data['id']; ?>" class="btn2 btn-dark">Beli</a></p>
                            <?php endif; ?>
                        <?php else : ?>
                            <p><a href="login.php" class="btn2 btn-dark">Beli</a></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php $no++; endwhile; ?>
            



        </div>
    </section>


    <section class="motivasi" id="motivasi">
        <h3 class="title">Bacalah Buku Biar Berilmu</h3>
        <p> Membaca adalah pintu gerbang menuju imajinasi dan kreativitas    
        </p>
    </section>
    <footer>
        <p>Beli Buku</p>
        <p>@copyright Beli Buku 2025</p>
        <ul>
            
        </ul>
    </footer>
    <script src="../assets/main.js"></script>
</body>

</html>
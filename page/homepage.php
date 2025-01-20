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
        <h3 class="title">Bacalah Buku Biar Berilmu, Seperti Pepatah China Mengatakan</h3>
        <p> 学问渊博的人，懂了还要问; 学问浅薄的人，不懂也不问 一天不练手脚慢，两天不练丢一半，三天不练门外汉，四天不练瞪眼看
        有时候，你不懂得欣赏爱你，全心全意谁的人，直到，直到你失去它。当时，这是没用的，因为后悔也不用心碎一次。
        你爱一个人面部/面部，他的财富和地位，但心爱的他的善良和他的诚意，因为这一切之中，只是善良和真诚的他的心脏依然存在。    
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
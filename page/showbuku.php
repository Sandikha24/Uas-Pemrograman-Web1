<?php
include 'koneksi.php';
$id_user = $_SESSION['user']['id'];

if(isset($_GET['show'])) {
    $id = $_GET['show'];
    $sql = "SELECT * FROM buku WHERE id = '$id'";
    $query = $koneksi->query($sql);
    $buku = $query->fetch_array();
}
  
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
            <?= $buku['judul']; ?>
        </h3>

        <?php include 'alert.php'; ?>
        
        <div class="container">
            <iframe src="../buku/pdf/<?= $buku['buku']; ?>" frameborder="0" width="100%" height="500px"></iframe>
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
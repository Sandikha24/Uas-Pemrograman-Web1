<?php
include 'koneksi.php';
if(isset($_POST['username'])) {
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = "user";
    // cek username
    $ssql = "SELECT * FROM user WHERE username = '$username'";
    $squery = $koneksi->query($ssql);
    if($squery->num_rows > 0) {
        $_SESSION['alert'] = 'Username sudah ada, gunakan username lain';
        header('Location: daftar.php');
        die;
    }
    $sql = "INSERT INTO user VALUES(null, '$nama', '$username', '$password', '$role')";
    $query = $koneksi->query($sql);
    if($query) {
        $_SESSION['alert'] = 'User berhasil ditambahkan';
        header('Location: login.php');
        die;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar</title>
    <link rel="stylesheet" href="../assets/login.css">
</head>
<body>
<div id="loginWrap">
    <div id="loginHeader">
        <h2>User Daftar<h2>
    </div>    
    <div id="loginBody">
        <?php if(isset($_SESSION['alert'])) { ?>
            <div class="alert-danger"><?= $_SESSION['alert']; ?></div>
        <?php unset($_SESSION['alert']); } ?>
        <form action="" method="post">                
            <input type="text" placeholder="Nama" class="input" name="nama" />
            <input type="text" placeholder="Username" name="username" />
            <input type="password" placeholder="Password" name="password" />    
            <button type="submit" class="loginBtn">Daftar</button>
        </form>
    </div> 
</div>
</body>
</html>
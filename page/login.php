<?php
include 'koneksi.php'; 
if(isset($_POST['username'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
    $query = $koneksi->query($sql);
    $data = $query->fetch_array();
    if($query->num_rows > 0) {
        $_SESSION['user'] = $data;
        if($data['role'] == 'user') {
            header('Location: homepage.php');
            die;
        }
        header('Location: listbuku.php');
        die;
    }else{
        $_SESSION['alert'] = 'Username atau Password Salah';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../assets/login.css">
</head>
<body>
<div id="loginWrap">
    <div id="loginHeader">
        <h2>User Login<h2>
    </div>    
    <div id="loginBody">
        <?php if(isset($_SESSION['alert'])) { ?>
            <span class="alert-danger"><?php echo $_SESSION['alert']; unset($_SESSION['alert']); ?></span>
        <?php } ?>
        <form action="" method="post">                
            <input type="text" placeholder="Username" name="username" />
            <input type="password" placeholder="Password" name="password" />    
            <button class="loginBtn" type="submit" >Login</button>
            <a class="loginBtn btn2" href="daftar.php">Daftar</a>
        </form>
    </div> 
</div>
</body>
</html>

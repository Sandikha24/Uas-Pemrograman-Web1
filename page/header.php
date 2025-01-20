<header class="header-top-menu">
        <h2><a href="#">Beli Buku</a></h2>
        <nav>
            <?php if(isset($_SESSION['user'])): ?>
                <li><a href="homepage.php#home">Home</a></li>
                <?php if($_SESSION['user']['role'] == 'admin'): ?>
                <li><a href="listbuku.php">Manage Buku</a></li>
                <?php else: ?>
                <li><a href="belibuku.php">Buku Saya</a></li>
                <?php endif; ?>
                <li><a href="logout.php" class="btn2 btn-dark">Logout</a></li>
            <?php else: ?>
            <li><a href="homepage.php#home">Home</a></li>
            <li><a href="homepage.php#content">Buku</a></li>
            <li><a href="homepage.php#motivasi">Motivasi</a></li>
            <li><a href="login.php" class="btn2 btn-dark">Login</a></li>
            <?php endif; ?>
        </nav>
    </header>
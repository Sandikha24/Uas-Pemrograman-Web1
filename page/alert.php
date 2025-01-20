<?php if(isset($_SESSION['alert'])): ?>
    <div class="alert"><?= $_SESSION['alert']; ?></div>
<?php 
unset($_SESSION['alert']);
endif; ?>

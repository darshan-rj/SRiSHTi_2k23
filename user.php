<?php

if (isset($_SESSION['login'])) {

    $name = $_SESSION['name'];

    ?>

        <li><a href="profile.php" class="nav-link scrollto"><i class="fas fa-user"></i> <span><?php echo $name; ?></span></a></li>

<?php } else {
    ?>
        <li><a href="login.php"><i class="fas fa-user"></i> <span>Register</span></a></li>


        <?php }?>
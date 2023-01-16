<?php

use App\Models\Menu;

$menu = new Menu();
?>

<!-- ======= Navbar ======= -->
<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">

        <div class="logo me-auto">
            <h1><a href="index.html">Scaffold</a></h1>
        </div>

        <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
                <?php foreach ($menu->main_menu() as $main) {
                    $sub = $menu->sub_menu($main['id']);
                ?>
                <?php if ($sub) { ?>
                <li class=" nav-item dropdown active">

                    <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?= $main['title'] ?>
                    </a>
                    <ul class=" dropdown-menu">
                        <?php foreach ($sub as $item) { ?>
                        <li><a href="<?= $item['link'] ?>" class="dropdown-item"><?= $item['title'] ?></a>
                        </li>
                        <?php } ?>
                    </ul>
                </li>
                <?php } else { ?>
                <li class=" nav-item active">
                    <a href="<?= $main['link'] ?>" class="nav-link">
                        <?= $main['title'] ?>
                    </a>
                </li>
                <?php } ?>
                <?php } ?>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
        <!-- .navbar -->

        <div class="header-social-links d-flex align-items-center">
            <a href="https://twitter.com" class="twitter"><i class="bi bi-twitter"></i></a>
            <a href="https://facebook.com" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="https://instagram.com" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="https://www.linkedin.com/" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
        </div>
    </div>
</header>
<!-- End Navbar -->
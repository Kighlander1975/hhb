<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="utf-8">
    <title>HHB - HausHaltsBuch</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="<?= site_url('assets/') ?>img/favicon.ico" rel="icon">

    <link rel="stylesheet" href="<?= site_url('assets/') ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= site_url('assets/') ?>css/portal.css">
    <link rel="stylesheet" href="<?= site_url('assets/') ?>css/bootstrap-icons.css">

    <link href="<?= site_url("assets/") ?>css/fontawesome.css" rel="stylesheet">
    <link href="<?= site_url("assets/") ?>css/brands.css" rel="stylesheet">
    <link href="<?= site_url("assets/") ?>css/solid.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?= site_url('assets/') ?>lib/animate/animate.min.css" rel="stylesheet">
    <link href="<?= site_url('assets/') ?>lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- project Stylesheet -->
    <link rel="stylesheet" href="<?= site_url('assets/') ?>css/haushaltsbuch_backend_default.css">

    <!-- Template Stylesheet -->
    <link href="<?= site_url('assets/') ?>css/style.css" rel="stylesheet">

</head>


<body>

    <body class="app">
        <header class="app-header fixed-top">
            <div class="app-header-inner">
                <div class="container-fluid py-2">
                    <div class="app-header-content">
                        <div class="row justify-content-between align-items-center">

                            <div class="col-auto">
                                <a id="sidepanel-toggler" class="sidepanel-toggler d-inline-block d-xl-none" href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" role="img">
                                        <title>Menu</title>
                                        <path stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="2" d="M4 7h22M4 15h22M4 23h22"></path>
                                    </svg>
                                </a>
                            </div><!--//col-->
                            <?php /*  ?>
                            <div class="search-mobile-trigger d-sm-none col">
                                <i class="search-mobile-trigger-icon fas fa-search"></i>
                            </div><!--//col-->
                            <div class="app-search-box col">
                                <form class="app-search-form">
                                    <input type="text" placeholder="Search..." name="search" class="form-control search-input">
                                    <button type="submit" class="btn search-btn btn-primary" value="Search"><i class="fas fa-search"></i></button>
                                </form>
                            </div><!--//app-search-box-->
                            <?php  */ ?>
                            <div class="app-utilities col-auto">
                                <div class="app-utility-item">
                                    Kontostand: EUR <span class="px-2 text-white <?= getUserAmmount(user_id())->ammount >= 0 ? "bg-success" : "bg-danger"?>"><?= getUserAmmount(user_id())->ammount ?></span> |
                                    Role:
                                    <?php
                                        $rollen = $user->getGroups();
                                        $count = 0;
                                        $anz = count($rollen);
                                        foreach($rollen as $rolle) {
                                            echo $rolle;
                                            $count++;
                                            if($count < $anz) echo ", ";
                                        }
                                    ?>
                                </div>

                                <div class="app-utility-item app-notifications-dropdown dropdown">
                                    <a class="dropdown-toggle no-toggle-arrow" id="notifications-dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false" title="Notifications">
                                        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                                        <i class="fa-solid fa-bell fa-xl"></i>
                                        <?php /* ?>
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-bell icon" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2z" />
                                            <path fill-rule="evenodd" d="M8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z" />
                                        </svg>
                                        <?php */ ?>
                                        <?php /* ?>
                                        <span class="icon-badge">1</span>
                                        <?php */ ?>
                                    </a><!--//dropdown-toggle-->

                                    <div class="dropdown-menu p-0" aria-labelledby="notifications-dropdown-toggle">
                                        <div class="dropdown-menu-header p-3">
                                            <h5 class="dropdown-menu-title mb-0">Notifications</h5>
                                        </div><!--//dropdown-menu-title-->
                                        <div class="dropdown-menu-content">

                                            <?php /* ?>
                                            <div class="item p-3">
                                                <div class="row gx-2 justify-content-between align-items-center">
                                                    <div class="col-auto">
                                                        <img class="profile-image" src="<?= site_url('assets/') ?>images/profiles/profile-1.png" alt="">
                                                    </div><!--//col-->
                                                    <div class="col">
                                                        <div class="info">
                                                            <div class="desc">Amy shared a file with you. Lorem ipsum dolor sit amet, consectetur adipiscing elit. </div>
                                                            <div class="meta"> 2 hrs ago</div>
                                                        </div>
                                                    </div><!--//col-->
                                                </div><!--//row-->
                                                <a class="link-mask" href="notifications.html"></a>
                                            </div><!--//item-->
                                            <?php */ ?>

                                        </div><!--//dropdown-menu-content-->

                                        <div class="dropdown-menu-footer p-2 text-center">
                                            <a href="#">View all</a>
                                        </div>

                                    </div><!--//dropdown-menu-->
                                </div><!--//app-utility-item-->
                                <div class="app-utility-item">
                                    <a href="#" title="Settings">
                                        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                                        <i class="fa-solid fa-gear fa-xl"></i>
                                        <?php /* ?>
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-gear icon" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M8.837 1.626c-.246-.835-1.428-.835-1.674 0l-.094.319A1.873 1.873 0 0 1 4.377 3.06l-.292-.16c-.764-.415-1.6.42-1.184 1.185l.159.292a1.873 1.873 0 0 1-1.115 2.692l-.319.094c-.835.246-.835 1.428 0 1.674l.319.094a1.873 1.873 0 0 1 1.115 2.693l-.16.291c-.415.764.42 1.6 1.185 1.184l.292-.159a1.873 1.873 0 0 1 2.692 1.116l.094.318c.246.835 1.428.835 1.674 0l.094-.319a1.873 1.873 0 0 1 2.693-1.115l.291.16c.764.415 1.6-.42 1.184-1.185l-.159-.291a1.873 1.873 0 0 1 1.116-2.693l.318-.094c.835-.246.835-1.428 0-1.674l-.319-.094a1.873 1.873 0 0 1-1.115-2.692l.16-.292c.415-.764-.42-1.6-1.185-1.184l-.291.159A1.873 1.873 0 0 1 8.93 1.945l-.094-.319zm-2.633-.283c.527-1.79 3.065-1.79 3.592 0l.094.319a.873.873 0 0 0 1.255.52l.292-.16c1.64-.892 3.434.901 2.54 2.541l-.159.292a.873.873 0 0 0 .52 1.255l.319.094c1.79.527 1.79 3.065 0 3.592l-.319.094a.873.873 0 0 0-.52 1.255l.16.292c.893 1.64-.902 3.434-2.541 2.54l-.292-.159a.873.873 0 0 0-1.255.52l-.094.319c-.527 1.79-3.065 1.79-3.592 0l-.094-.319a.873.873 0 0 0-1.255-.52l-.292.16c-1.64.893-3.433-.902-2.54-2.541l.159-.292a.873.873 0 0 0-.52-1.255l-.319-.094c-1.79-.527-1.79-3.065 0-3.592l.319-.094a.873.873 0 0 0 .52-1.255l-.16-.292c-.892-1.64.902-3.433 2.541-2.54l.292.159a.873.873 0 0 0 1.255-.52l.094-.319z" />
                                            <path fill-rule="evenodd" d="M8 5.754a2.246 2.246 0 1 0 0 4.492 2.246 2.246 0 0 0 0-4.492zM4.754 8a3.246 3.246 0 1 1 6.492 0 3.246 3.246 0 0 1-6.492 0z" />
                                        </svg>
                                        <?php */ ?>
                                    </a>
                                </div><!--//app-utility-item-->

                                <div class="app-utility-item app-user-dropdown dropdown">
                                    <a class="dropdown-toggle" id="user-dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"><img src="<?= site_url('assets/images/avatar.php?name=') . $user->username ?>" style="border-radius: 100%;" /></a>
                                    <ul class="dropdown-menu" aria-labelledby="user-dropdown-toggle">
                                        <li><a class="dropdown-item" href="#">Account</a></li>
                                        <li><a class="dropdown-item" href="#">Settings</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="<?= site_url('/logout') ?>">Log Out</a></li>
                                    </ul>
                                </div><!--//app-user-dropdown-->
                            </div><!--//app-utilities-->
                        </div><!--//row-->
                    </div><!--//app-header-content-->
                </div><!--//container-fluid-->
            </div><!--//app-header-inner-->
            <div id="app-sidepanel" class="app-sidepanel">
                <div id="sidepanel-drop" class="sidepanel-drop"></div>
                <div class="sidepanel-inner d-flex flex-column">
                    <a href="#" id="sidepanel-close" class="sidepanel-close d-xl-none">&times;</a>
                    <div class="app-branding">
                        <a class="app-logo" href="<?= site_url('/dashboard') ?>"><img class="logo-icon me-2" src="<?= site_url('assets/') ?>images/app-logo.svg" alt="logo"><span class="logo-text">HausHaltsBuch</span></a>

                    </div><!--//app-branding-->

                    <nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1">
                        <ul class="app-menu list-unstyled accordion" id="menu-accordion">
                            <li class="nav-item">
                                <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                                <a class="nav-link<?= ($menu === 1) ? " active" : "" ?>" href="<?= site_url('/dashboard') ?>">
                                    <span class="nav-icon">
                                        <i class="fa-solid fa-home" style="margin-top:6px"></i>
                                    </span>
                                    <span class="nav-link-text">Überblick</span>
                                </a><!--//nav-link-->
                            </li><!--//nav-item-->
                            <li class="nav-item">
                                <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                                <a class="nav-link<?= ($menu === 2) ? " active" : "" ?>" href="<?= site_url('/transaction') ?>">
                                    <span class="nav-icon">
                                        <i class="fa-solid fa-coins" style="margin-top:6px"></i>
                                    </span>
                                    <span class="nav-link-text">Neue Buchung</span>
                                </a><!--//nav-link-->
                            </li><!--//nav-item-->
                            <li class="nav-item">
                                <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                                <a class="nav-link<?= ($menu === 3) ? " active" : "" ?>" href="<?= site_url('/statistics') ?>">
                                    <span class="nav-icon">
                                        <i class="fa-solid fa-chart-pie" style="margin-top:6px"></i>
                                    </span>
                                    <span class="nav-link-text">Statistiken</span>
                                </a><!--//nav-link-->
                            </li><!--//nav-item-->
                            <?php if (auth()->user()->inGroup('user', 'premiumuser', 'superadmin')) : ?>
                                <li class="nav-item has-submenu">
                                    <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                                    <a class="nav-link submenu-toggle<?= ($menu === 4) ? " active" : "" ?>" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-1" aria-expanded="<?= ($menu === 4) ? "true" : "false" ?>" aria-controls="submenu-1">
                                        <span class="nav-icon">
                                            <i class="fa-solid fa-sliders" style="margin-top:6px"></i>
                                        </span>
                                        <span class="nav-link-text">Kontenrahmen</span>
                                        <span class="submenu-arrow">
                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                                            </svg>
                                        </span><!--//submenu-arrow-->
                                    </a><!--//nav-link-->
                                    <div id="submenu-1" class="collapse submenu submenu-1<?= ($menu === 4) ? " show" : "" ?>" data-bs-parent="#menu-accordion">
                                        <ul class="submenu-list list-unstyled">
                                            <li class="submenu-item"><a class="submenu-link<?= ($submenu1 === 1) ? " active" : "" ?>" href="<?= site_url('/catlist') ?>">Kategorie-Liste</a></li>
                                            <li class="submenu-item"><a class="submenu-link<?= ($submenu1 === 2) ? " active" : "" ?>" href="<?= site_url('/newcat') ?>">Neue Kategorie vorschlagen</a></li>
                                            <?php if (auth()->user()->inGroup('premiumuser', 'superadmin')) : ?>
                                                <li class="submenu-item"><a class="submenu-link<?= ($submenu1 === 3) ? " active" : "" ?>" href="<?= site_url('/subcatlist') ?>">Unterkategorien-Liste <span class="badge bg-danger">Premium</span></a></li>
                                                <li class="submenu-item"><a class="submenu-link<?= ($submenu1 === 4) ? " active" : "" ?>" href="<?= site_url('/newsubcat') ?>">Neue Unterkategorie <span class="badge bg-danger">Premium</span></a></li>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                </li><!--//nav-item-->
                            <?php endif; ?>
                            <?php if (auth()->user()->inGroup('superadmin')) : ?>
                                <li class="nav-item has-submenu">
                                    <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                                    <a class="nav-link submenu-toggle<?= ($menu === 5) ? " active" : "" ?>" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-2" aria-expanded="<?= ($menu === 5) ? "true" : "false" ?>" aria-controls="submenu-2">
                                        <span class="nav-icon">
                                            <i class="fa-solid fa-folder-open" style="margin-top:6px"></i>
                                        </span>
                                        <span class="nav-link-text">Admin Bereich</span>
                                        <span class="submenu-arrow">
                                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                                            </svg>
                                        </span><!--//submenu-arrow-->
                                    </a><!--//nav-link-->
                                    <div id="submenu-2" class="collapse submenu submenu-1<?= ($menu === 5) ? " show" : "" ?>" data-bs-parent="#menu-accordion">
                                        <ul class="submenu-list list-unstyled">
                                            <li class="submenu-item"><a class="submenu-link<?= ($submenu2 === 1) ? " active" : "" ?>" href="<?= site_url('/admin1') ?>">Benutzerverwaltung</a></li>
                                            <li class="submenu-item"><a class="submenu-link<?= ($submenu2 === 2) ? " active" : "" ?>" href="<?= site_url('/admin2') ?>">Seiteneinstellungen</a></li>
                                            <li class="submenu-item"><a class="submenu-link<?= ($submenu2 === 3) ? " active" : "" ?>" href="<?= site_url('/admin3') ?>">Logs</a></li>
                                            <li class="submenu-item"><a class="submenu-link<?= ($submenu2 === 4) ? " active" : "" ?>" href="<?= site_url('/admin4') ?>">Datenbank</a></li>
                                            <li class="submenu-item"><a class="submenu-link<?= ($submenu2 === 5) ? " active" : "" ?>" href="<?= site_url('/admin5') ?>">Nachrichten&Newsletter</a></li>
                                        </ul>
                                    </div>
                                </li><!--//nav-item-->
                            <?php endif; ?>

                            <li class="nav-item">
                                <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                                <a class="nav-link<?= ($menu === 6) ? " active" : "" ?>" href="<?= site_url('/help') ?>">
                                    <span class="nav-icon">
                                        <i class="fa-solid fa-circle-question" style="margin-top:6px"></i>
                                    </span>
                                    <span class="nav-link-text">Hilfe</span>
                                </a><!--//nav-link-->
                            </li><!--//nav-item-->
                        </ul><!--//app-menu-->
                    </nav><!--//app-nav-->
                    <div class="app-sidepanel-footer">
                        <nav class="app-nav app-nav-footer">
                            <ul class="app-menu footer-menu list-unstyled">
                                <li class="nav-item">
                                    <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                                    <a class="nav-link" href="#">
                                        <span class="nav-icon">
                                            <i class="fa-solid fa-globe" style="margin-top:6px"></i>
                                        </span>
                                        <span class="nav-link-text">Dummy</span>
                                    </a><!--//nav-link-->
                                </li><!--//nav-item-->
                            </ul><!--//footer-menu-->
                        </nav>
                    </div><!--//app-sidepanel-footer-->

                </div><!--//sidepanel-inner-->
            </div><!--//app-sidepanel-->
        </header><!--//app-header-->

        <div class="app-wrapper">

            <div class="app-content pt-3 p-md-3 p-lg-4">
                <div class="container-xl">
                    <?php if (session('warning') !== null) : ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Hinweis!</strong> <?= session('warning'); ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>
                    <?php if (session('info') !== null) : ?>
                        <div class="alert alert-info alert-dismissible fade show" role="alert">
                            <strong>Hinweis!</strong> <?= session('info'); ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>
                    <?= $this->renderSection('content') ?>
                </div>
            </div><!--//app-content-->

            <footer class="app-footer">
                <div class="container text-center py-3">
                    <!--/* This template is free as long as you keep the footer attribution link. If you'd like to use the template without the attribution link, you can buy the commercial license via our website: themes.3rdwavemedia.com Thank you for your support. :) */-->
                    <small class="copyright">Designed with <span class="sr-only">love</span><i class="fas fa-heart" style="color: #fb866a;"></i> by <a class="app-link" href="http://themes.3rdwavemedia.com" target="_blank">Xiaoying Riley</a> for developers</small>

                </div>
            </footer><!--//app-footer-->

        </div><!--//app-wrapper-->

        <!-- JavaScript Libraries -->
        <script src="<?= site_url('assets/') ?>js/jquery-3.4.1.min.js"></script>
        <script src="<?= site_url('assets/') ?>js/bootstrap.bundle.min.js"></script>

        <!-- Charts JS -->
        <?= $this->renderSection('javascript') ?>

        <!-- Page Specific JS -->
        <script src="<?= site_url('assets/') ?>js/app.js"></script>

        <!-- Template Javascript -->
    </body>

</html>
<!DOCTYPE html>
<html lang="en" data-footer="true" data-override='{"attributes": {"placement": "vertical","layout": "boxed", "behaviour": "unpinned" }, "storagePrefix": "elearning-portal"}'>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <?= $this->renderSection('title') ?>
    <meta name="description" content="Acorn elearning platform dashboard." />
    <!-- Favicon Tags Start -->
    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="<?= base_url() ?>/template/img/favicon/logo_pln.jpg" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?= base_url() ?>/template/img/favicon/logo_pln.jpg" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?= base_url() ?>/template/img/favicon/logo_pln.jpg" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?= base_url() ?>/template/img/favicon/logo_pln.jpg" />
    <link rel="apple-touch-icon-precomposed" sizes="60x60" href="<?= base_url() ?>/template/img/favicon/logo_pln.jpg" />
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="<?= base_url() ?>/template/img/favicon/logo_pln.jpg" />
    <link rel="apple-touch-icon-precomposed" sizes="76x76" href="<?= base_url() ?>/template/img/favicon/logo_pln.jpg" />
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?= base_url() ?>/template/img/favicon/logo_pln.jpg" />
    <link rel="icon" type="image/png" href="<?= base_url() ?>/template/img/favicon/logo_pln.jpg" sizes="196x196" />
    <link rel="icon" type="image/png" href="<?= base_url() ?>/template/img/favicon/logo_pln.jpg" sizes="96x96" />
    <link rel="icon" type="image/png" href="<?= base_url() ?>/template/img/favicon/logo_pln.jpg" sizes="32x32" />
    <link rel="icon" type="image/png" href="<?= base_url() ?>/template/img/favicon/logo_pln.jpg" sizes="16x16" />
    <link rel="icon" type="image/png" href="<?= base_url() ?>/template/img/favicon/logo_pln.jpg" sizes="128x128" />
    <meta name="application-name" content="&nbsp;" />
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta name="msapplication-TileImage" content="<?= base_url() ?>/template/img/favicon/logo_pln.jpg" />
    <meta name="msapplication-square70x70logo" content="<?= base_url() ?>/template/img/favicon/logo_pln.jpg" />
    <meta name="msapplication-square150x150logo" content="<?= base_url() ?>/template/img/favicon/logo_pln.jpg" />
    <meta name="msapplication-wide310x150logo" content="<?= base_url() ?>/template/img/favicon/logo_pln.jpg" />
    <meta name="msapplication-square310x310logo" content="<?= base_url() ?>/template/img/favicon/logo_pln.jpg" />
    <!-- Favicon Tags End -->
    <!-- Font Tags Start -->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="<?= base_url() ?>/template/font/CS-Interface/style.css" />
    <!-- Font Tags End -->

    <!-- Vendor Styles Start -->

    <?= $this->renderSection('cssheader') ?>

    <!-- <link rel="stylesheet" href="<?= base_url() ?>/template/css/vendor/bootstrap.min.css" /> -->
    <!-- <link rel="stylesheet" href="<?= base_url() ?>/template/css/vendor/OverlayScrollbars.min.css" /> -->
    <!-- <link rel="stylesheet" href="<?= base_url() ?>/template/css/vendor/glide.core.min.css" /> -->
    <!-- <link rel="stylesheet" href="<?= base_url() ?>/template/css/vendor/datatables.min.css" /> -->
    <!-- <link rel="stylesheet" href="<?= base_url() ?>/template/css/vendor/dropzone.min.css" /> -->
    <!-- <link rel="stylesheet" href="<?= base_url() ?>/template/css/vendor/select2.min.css" /> -->
    <!-- <link rel="stylesheet" href="<?= base_url() ?>/template/css/vendor/select2-bootstrap4.min.css" /> -->
    <!-- <link rel="stylesheet" href="<?= base_url() ?>/template/css/vendor/bootstrap-datepicker3.standalone.min.css" /> -->
    <!-- <link rel="stylesheet" href="<?= base_url() ?>/template/css/vendor/fullcalendar.min.css"> -->
    <!-- <link rel="stylesheet" href="<?= base_url() ?>/template/css/vendor/diagram.css" /> -->
    <!-- Vendor Styles End -->

    <!-- Template Base Styles Start -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/css/styles.css" />
    <!-- Template Base Styles End -->

    <link rel="stylesheet" href="<?= base_url() ?>/template/css/main.css" />
    <script src="<?= base_url() ?>/template/icon/acorn-icons.js"></script>
    <script src="<?= base_url() ?>/template/icon/acorn-icons-interface.js"></script>
    <script src="<?= base_url() ?>/template/js/base/loader.js"></script>
</head>

<body>
    <div id="root">
        <div id="nav" class="nav-container d-flex" data-horizontal-mobile="1500" style="border-radius: 0px 19px 19px 0px;">
            <div class="nav-content d-flex">
                <!-- Logo Start -->
                <div class="logo position-relative">
                    <a href="">
                        <!-- Logo can be added directly -->
                        <!-- <img src="<?= base_url() ?>/template/img/logo/logox.png" alt="logo" /> -->

                        <!-- Or added via css to provide different ones for different color themes -->
                        <!-- <div class="logo"></div> -->
                    </a>
                </div>
                <!-- Logo End -->

                <!-- Language Switch Start -->
                <!-- <div class="language-switch-container">
            <button class="btn btn-empty language-button dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">EN</button>
            <div class="dropdown-menu">
              <a href="#" class="dropdown-item">DE</a>
              <a href="#" class="dropdown-item active">EN</a>
              <a href="#" class="dropdown-item">ES</a>
            </div>
          </div> -->
                <!-- Language Switch End -->
                <br>
                <!-- User Menu Start -->
                <div class="user-container d-flex">
                    <a href="#" class="d-flex user position-relative" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php
                        if (userLogin()->foto_profile != null) {
                            echo '<img class="profile" alt="profile" src="' . base_url() . '/template/img/profile/' . userLogin()->foto_profile . '" />';
                        } else {
                            echo '<img class="profile" alt="profile" src="' . base_url() . '/template/img/profile/profile-11.jpg" />';
                        }
                        ?>
                        <div class="name"><?= userLogin()->nama_user ?></div>
                    </a>
                    <br>
                    <div class="dropdown-menu dropdown-menu-end user-menu wide">
                        <div class="row mb-1 ms-0 me-0">
                            <div class="col-6 ps-1 pe-1">
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="<?= site_url("dashboard") ?>">
                                            <i data-cs-icon="gear" class="me-2" data-cs-size="17"></i>
                                            <span class="align-middle">Settings</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-6 pe-1 ps-1">
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="<?= site_url('auth/logout') ?>">
                                            <i data-cs-icon="logout" class="me-2" data-cs-size="17"></i>
                                            <span class="align-middle">Logout</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- User Menu End -->

                <!-- Icons Menu Start -->
                <ul class="list-unstyled list-inline text-center menu-icons">
                    <li class="list-inline-item">
                        <a href="<?= site_url('home') ?>" id="" class="pin-button">
                            <i data-cs-icon="layout-1" class="" data-cs-size="18"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#" id="pinButton" class="pin-button">
                            <i data-cs-icon="lock-on" class="unpin" data-cs-size="18"></i>
                            <i data-cs-icon="lock-off" class="pin" data-cs-size="18"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#" id="colorButton">
                            <i data-cs-icon="light-on" class="light" data-cs-size="18"></i>
                            <i data-cs-icon="light-off" class="dark" data-cs-size="18"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#" data-bs-toggle="dropdown" data-bs-target="#notifications" aria-haspopup="true" aria-expanded="false" class="notification-button">
                            <div class="position-relative d-inline-flex">
                                <i data-cs-icon="bell" data-cs-size="18"></i>
                                <span class="position-absolute notification-dot rounded-xl"></span>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end wide notification-dropdown scroll-out" id="notifications">
                            <div class="scroll">
                                <ul class="list-unstyled border-last-none">
                                    <li class="mb-3 pb-3 border-bottom border-separator-light d-flex">
                                        <img src="<?= base_url() ?>/template/img/logo/logo.png" class="me-3 sw-4 sh-4 rounded-xl align-self-center" alt="..." />
                                        <div class="align-self-center">
                                            <a href="#">[SIMKPNAS] Jadwal inisiasi kinerja pegawai</a>
                                        </div>
                                    </li>
                                    <li class="mb-3 pb-3 border-bottom border-separator-light d-flex">
                                        <img src="<?= base_url() ?>/template/img/logo/logo.png" class="me-3 sw-4 sh-4 rounded-xl align-self-center" alt="..." />
                                        <div class="align-self-center">
                                            <a href="#">[Bang TLN] Jadwal internship tanggal 01-05 Februari 2022</a>
                                        </div>
                                    </li>
                                    <li class="mb-3 pb-3 border-bottom border-separator-light d-flex">
                                        <img src="<?= base_url() ?>/template/img/logo/logo.png" class="me-3 sw-4 sh-4 rounded-xl align-self-center" alt="..." />
                                        <div class="align-self-center">
                                            <a href="#">[Bang TLN] Periode Identifikasi Kebutuhan Sertifikasi</a>
                                        </div>
                                    </li>
                                    <li class="pb-3 pb-3 border-bottom border-separator-light d-flex">
                                        <img src="<?= base_url() ?>/template/img/logo/logo.png" class="me-3 sw-4 sh-4 rounded-xl align-self-center" alt="..." />
                                        <div class="align-self-center">
                                            <a href="#">[Bang TLN] Periode Pemilihan ITN</a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
                <!-- Icons Menu End -->

                <!-- Menu Start -->
                <div class="menu-container flex-grow-1">
                    <ul id="menu" class="menu">
                        <?= $this->include('layout/menu') ?>
                    </ul>
                </div>
                <!-- Menu End -->

                <!-- Mobile Buttons Start -->
                <div class="mobile-buttons-container">
                    <!-- Scrollspy Mobile Button Start -->
                    <a href="#" id="scrollSpyButton" class="spy-button" data-bs-toggle="dropdown">
                        <i data-cs-icon="menu-dropdown"></i>
                    </a>
                    <!-- Scrollspy Mobile Button End -->

                    <!-- Scrollspy Mobile Dropdown Start -->
                    <div class="dropdown-menu dropdown-menu-end" id="scrollSpyDropdown"></div>
                    <!-- Scrollspy Mobile Dropdown End -->

                    <!-- Menu Button Start -->
                    <a href="#" id="mobileMenuButton" class="menu-button">
                        <i data-cs-icon="menu"></i>
                    </a>
                    <!-- Menu Button End -->
                </div>
                <!-- Mobile Buttons End -->
            </div>
            <div class="nav-shadow"></div>
        </div>

        <main>
            <div class="container">
                <!-- Title and Top Buttons Start -->
                <?= $this->renderSection('content') ?>
                <!-- Content End -->
            </div>
        </main>
        <!-- Layout Footer Start -->
        <footer>
            <div class="footer-content">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <p class="mb-0 text-muted text-medium">&copy Bang TLN Korp <?php echo date('Y'); ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Layout Footer End -->
    </div>
    <!-- Theme Settings Modal Start -->
    <div class="modal fade modal-right scroll-out-negative" id="settings" data-bs-backdrop="true" tabindex="-1" role="dialog" aria-labelledby="settings" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable full" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Theme Settings</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="scroll-track-visible">
                        <div class="mb-5" id="color">
                            <label class="mb-3 d-inline-block form-label">Color</label>
                            <div class="row d-flex g-3 justify-content-between flex-wrap mb-3">
                                <a href="#" class="flex-grow-1 w-50 option col" data-value="light-blue" data-parent="color">
                                    <div class="card rounded-md p-3 mb-1 no-shadow color">
                                        <div class="blue-light"></div>
                                    </div>
                                    <div class="text-muted text-part">
                                        <span class="text-extra-small align-middle">LIGHT BLUE</span>
                                    </div>
                                </a>
                                <a href="#" class="flex-grow-1 w-50 option col" data-value="dark-blue" data-parent="color">
                                    <div class="card rounded-md p-3 mb-1 no-shadow color">
                                        <div class="blue-dark"></div>
                                    </div>
                                    <div class="text-muted text-part">
                                        <span class="text-extra-small align-middle">DARK BLUE</span>
                                    </div>
                                </a>
                            </div>

                            <div class="row d-flex g-3 justify-content-between flex-wrap mb-3">
                                <a href="#" class="flex-grow-1 w-50 option col" data-value="light-red" data-parent="color">
                                    <div class="card rounded-md p-3 mb-1 no-shadow color">
                                        <div class="red-light"></div>
                                    </div>
                                    <div class="text-muted text-part">
                                        <span class="text-extra-small align-middle">LIGHT RED</span>
                                    </div>
                                </a>
                                <a href="#" class="flex-grow-1 w-50 option col" data-value="dark-red" data-parent="color">
                                    <div class="card rounded-md p-3 mb-1 no-shadow color">
                                        <div class="red-dark"></div>
                                    </div>
                                    <div class="text-muted text-part">
                                        <span class="text-extra-small align-middle">DARK RED</span>
                                    </div>
                                </a>
                            </div>

                            <div class="row d-flex g-3 justify-content-between flex-wrap mb-3">
                                <a href="#" class="flex-grow-1 w-50 option col" data-value="light-green" data-parent="color">
                                    <div class="card rounded-md p-3 mb-1 no-shadow color">
                                        <div class="green-light"></div>
                                    </div>
                                    <div class="text-muted text-part">
                                        <span class="text-extra-small align-middle">LIGHT GREEN</span>
                                    </div>
                                </a>
                                <a href="#" class="flex-grow-1 w-50 option col" data-value="dark-green" data-parent="color">
                                    <div class="card rounded-md p-3 mb-1 no-shadow color">
                                        <div class="green-dark"></div>
                                    </div>
                                    <div class="text-muted text-part">
                                        <span class="text-extra-small align-middle">DARK GREEN</span>
                                    </div>
                                </a>
                            </div>

                            <div class="row d-flex g-3 justify-content-between flex-wrap mb-3">
                                <a href="#" class="flex-grow-1 w-50 option col" data-value="light-purple" data-parent="color">
                                    <div class="card rounded-md p-3 mb-1 no-shadow color">
                                        <div class="purple-light"></div>
                                    </div>
                                    <div class="text-muted text-part">
                                        <span class="text-extra-small align-middle">LIGHT PURPLE</span>
                                    </div>
                                </a>
                                <a href="#" class="flex-grow-1 w-50 option col" data-value="dark-purple" data-parent="color">
                                    <div class="card rounded-md p-3 mb-1 no-shadow color">
                                        <div class="purple-dark"></div>
                                    </div>
                                    <div class="text-muted text-part">
                                        <span class="text-extra-small align-middle">DARK PURPLE</span>
                                    </div>
                                </a>
                            </div>

                            <div class="row d-flex g-3 justify-content-between flex-wrap mb-3">
                                <a href="#" class="flex-grow-1 w-50 option col" data-value="light-pink" data-parent="color">
                                    <div class="card rounded-md p-3 mb-1 no-shadow color">
                                        <div class="pink-light"></div>
                                    </div>
                                    <div class="text-muted text-part">
                                        <span class="text-extra-small align-middle">LIGHT PINK</span>
                                    </div>
                                </a>
                                <a href="#" class="flex-grow-1 w-50 option col" data-value="dark-pink" data-parent="color">
                                    <div class="card rounded-md p-3 mb-1 no-shadow color">
                                        <div class="pink-dark"></div>
                                    </div>
                                    <div class="text-muted text-part">
                                        <span class="text-extra-small align-middle">DARK PINK</span>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="mb-5" id="navcolor">
                            <label class="mb-3 d-inline-block form-label">Override Nav Palette</label>
                            <div class="row d-flex g-3 justify-content-between flex-wrap">
                                <a href="#" class="flex-grow-1 w-33 option col" data-value="default" data-parent="navcolor">
                                    <div class="card rounded-md p-3 mb-1 no-shadow">
                                        <div class="figure figure-primary top"></div>
                                        <div class="figure figure-secondary bottom"></div>
                                    </div>
                                    <div class="text-muted text-part">
                                        <span class="text-extra-small align-middle">DEFAULT</span>
                                    </div>
                                </a>
                                <a href="#" class="flex-grow-1 w-33 option col" data-value="light" data-parent="navcolor">
                                    <div class="card rounded-md p-3 mb-1 no-shadow">
                                        <div class="figure figure-secondary figure-light top"></div>
                                        <div class="figure figure-secondary bottom"></div>
                                    </div>
                                    <div class="text-muted text-part">
                                        <span class="text-extra-small align-middle">LIGHT</span>
                                    </div>
                                </a>
                                <a href="#" class="flex-grow-1 w-33 option col" data-value="dark" data-parent="navcolor">
                                    <div class="card rounded-md p-3 mb-1 no-shadow">
                                        <div class="figure figure-muted figure-dark top"></div>
                                        <div class="figure figure-secondary bottom"></div>
                                    </div>
                                    <div class="text-muted text-part">
                                        <span class="text-extra-small align-middle">DARK</span>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="mb-5" id="behaviour">
                            <label class="mb-3 d-inline-block form-label">Menu Behaviour</label>
                            <div class="row d-flex g-3 justify-content-between flex-wrap">
                                <a href="#" class="flex-grow-1 w-50 option col" data-value="pinned" data-parent="behaviour">
                                    <div class="card rounded-md p-3 mb-1 no-shadow">
                                        <div class="figure figure-primary left large"></div>
                                        <div class="figure figure-secondary right small"></div>
                                    </div>
                                    <div class="text-muted text-part">
                                        <span class="text-extra-small align-middle">PINNED</span>
                                    </div>
                                </a>
                                <a href="#" class="flex-grow-1 w-50 option col" data-value="unpinned" data-parent="behaviour">
                                    <div class="card rounded-md p-3 mb-1 no-shadow">
                                        <div class="figure figure-primary left"></div>
                                        <div class="figure figure-secondary right"></div>
                                    </div>
                                    <div class="text-muted text-part">
                                        <span class="text-extra-small align-middle">UNPINNED</span>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="mb-5" id="layout">
                            <label class="mb-3 d-inline-block form-label">Layout</label>
                            <div class="row d-flex g-3 justify-content-between flex-wrap">
                                <a href="#" class="flex-grow-1 w-50 option col" data-value="fluid" data-parent="layout">
                                    <div class="card rounded-md p-3 mb-1 no-shadow">
                                        <div class="figure figure-primary top"></div>
                                        <div class="figure figure-secondary bottom"></div>
                                    </div>
                                    <div class="text-muted text-part">
                                        <span class="text-extra-small align-middle">FLUID</span>
                                    </div>
                                </a>
                                <a href="#" class="flex-grow-1 w-50 option col" data-value="boxed" data-parent="layout">
                                    <div class="card rounded-md p-3 mb-1 no-shadow">
                                        <div class="figure figure-primary top"></div>
                                        <div class="figure figure-secondary bottom small"></div>
                                    </div>
                                    <div class="text-muted text-part">
                                        <span class="text-extra-small align-middle">BOXED</span>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="mb-5" id="radius">
                            <label class="mb-3 d-inline-block form-label">Radius</label>
                            <div class="row d-flex g-3 justify-content-between flex-wrap">
                                <a href="#" class="flex-grow-1 w-33 option col" data-value="rounded" data-parent="radius">
                                    <div class="card rounded-md radius-rounded p-3 mb-1 no-shadow">
                                        <div class="figure figure-primary top"></div>
                                        <div class="figure figure-secondary bottom"></div>
                                    </div>
                                    <div class="text-muted text-part">
                                        <span class="text-extra-small align-middle">ROUNDED</span>
                                    </div>
                                </a>
                                <a href="#" class="flex-grow-1 w-33 option col" data-value="standard" data-parent="radius">
                                    <div class="card rounded-md radius-regular p-3 mb-1 no-shadow">
                                        <div class="figure figure-primary top"></div>
                                        <div class="figure figure-secondary bottom"></div>
                                    </div>
                                    <div class="text-muted text-part">
                                        <span class="text-extra-small align-middle">STANDARD</span>
                                    </div>
                                </a>
                                <a href="#" class="flex-grow-1 w-33 option col" data-value="flat" data-parent="radius">
                                    <div class="card rounded-md radius-flat p-3 mb-1 no-shadow">
                                        <div class="figure figure-primary top"></div>
                                        <div class="figure figure-secondary bottom"></div>
                                    </div>
                                    <div class="text-muted text-part">
                                        <span class="text-extra-small align-middle">FLAT</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Theme Settings Modal End -->

    <!-- Niches Modal Start -->
    <div class="modal fade modal-right scroll-out-negative" id="niches" data-bs-backdrop="true" tabindex="-1" role="dialog" aria-labelledby="niches" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable full" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Niches</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="scroll-track-visible">
                        <div class="mb-5">
                            <label class="mb-2 d-inline-block form-label">Classic Dashboard</label>
                            <div class="hover-reveal-buttons position-relative hover-reveal cursor-default">
                                <div class="position-relative mb-3 mb-lg-5 rounded-sm">
                                    <img src="" class="img-fluid rounded-sm lower-opacity border border-separator-light" alt="card image" />
                                    <div class="position-absolute reveal-content rounded-sm absolute-center-vertical text-center w-100">
                                        <a target="_blank" href="https://acorn-html-classic-dashboard.coloredstrategies.com/" class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1">
                                            Html
                                        </a>
                                        <a target="_blank" href="https://acorn-laravel-classic-dashboard.coloredstrategies.com/" class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1">
                                            Laravel
                                        </a>
                                        <a target="_blank" href="https://acorn-dotnet-classic-dashboard.coloredstrategies.com/" class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1">
                                            .Net5
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-5">
                            <label class="mb-2 d-inline-block form-label">Ecommerce Platform</label>
                            <div class="hover-reveal-buttons position-relative hover-reveal cursor-default">
                                <div class="position-relative mb-3 mb-lg-5 rounded-sm">
                                    <img src="" class="img-fluid rounded-sm lower-opacity border border-separator-light" alt="card image" />
                                    <div class="position-absolute reveal-content rounded-sm absolute-center-vertical text-center w-100">
                                        <a target="_blank" href="" class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1">
                                            Html
                                        </a>
                                        <a target="_blank" href="" class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1">
                                            Laravel
                                        </a>
                                        <a target="_blank" href="" class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1">
                                            .Net5
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-5">
                            <label class="mb-2 d-inline-block form-label">Elearning Portal</label>
                            <div class="hover-reveal-buttons position-relative hover-reveal cursor-default">
                                <div class="position-relative mb-3 mb-lg-5 rounded-sm">
                                    <img src="" class="img-fluid rounded-sm lower-opacity border border-separator-light" alt="card image" />
                                    <div class="position-absolute reveal-content rounded-sm absolute-center-vertical text-center w-100">
                                        <a target="_blank" href="" class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1">
                                            Html
                                        </a>
                                        <a target="_blank" href="" class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1">
                                            Laravel
                                        </a>
                                        <a target="_blank" href="" class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1">
                                            .Net5
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-5">
                            <label class="mb-2 d-inline-block form-label">Service Provider</label>
                            <div class="hover-reveal-buttons position-relative hover-reveal cursor-default">
                                <div class="position-relative mb-3 mb-lg-5 rounded-sm">
                                    <img src="" class="img-fluid rounded-sm lower-opacity border border-separator-light" alt="card image" />
                                    <div class="position-absolute reveal-content rounded-sm absolute-center-vertical text-center w-100">
                                        <a target="_blank" href="" class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1">
                                            Html
                                        </a>
                                        <a target="_blank" href="" class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1">
                                            Laravel
                                        </a>
                                        <a target="_blank" href="" class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1">
                                            .Net5
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-5">
                            <label class="mb-2 d-inline-block form-label">Starter Project</label>
                            <div class="hover-reveal-buttons position-relative hover-reveal cursor-default">
                                <div class="position-relative mb-3 mb-lg-5 rounded-sm">
                                    <img src="" class="img-fluid rounded-sm lower-opacity border border-separator-light" alt="card image" />
                                    <div class="position-absolute reveal-content rounded-sm absolute-center-vertical text-center w-100">
                                        <a target="_blank" href="" class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1">
                                            Html
                                        </a>
                                        <a target="_blank" href="" class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1">
                                            Laravel
                                        </a>
                                        <a target="_blank" href="" class="btn btn-primary btn-sm sw-10 sw-lg-12 d-block mx-auto my-1">
                                            .Net5
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Niches Modal End -->

    <!-- Theme Settings & Niches Buttons Start -->
    <div class="settings-buttons-container">
        <button type="button" class="btn settings-button btn-primary p-0" data-bs-toggle="modal" data-bs-target="#settings" id="settingsButton" style="background-color: #15677b;">
            <span class="d-inline-block no-delay" data-bs-delay="0" data-bs-offset="0,3" data-bs-toggle="tooltip" data-bs-placement="left" title="Settings">
                <i data-cs-icon="paint-roller" class="position-relative"></i>
            </span>
        </button>
    </div>
    <!-- Theme Settings & Niches Buttons End -->

    <!-- Search Modal Start -->
    <div class="modal fade modal-under-nav modal-search modal-close-out" id="searchPagesModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header border-0 p-0">
                    <button type="button" class="btn-close btn btn-icon btn-icon-only btn-foreground" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body ps-5 pe-5 pb-0 border-0">
                    <input id="searchPagesInput" class="form-control form-control-xl borderless ps-0 pe-0 mb-1 auto-complete" type="text" autocomplete="off" />
                </div>
                <div class="modal-footer border-top justify-content-start ps-5 pe-5 pb-3 pt-3 border-0">
                    <span class="text-alternate d-inline-block m-0 me-3">
                        <i data-cs-icon="arrow-bottom" data-cs-size="15" class="text-alternate align-middle me-1"></i>
                        <span class="align-middle text-medium">Navigate</span>
                    </span>
                    <span class="text-alternate d-inline-block m-0 me-3">
                        <i data-cs-icon="arrow-bottom-left" data-cs-size="15" class="text-alternate align-middle me-1"></i>
                        <span class="align-middle text-medium">Select</span>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <!-- Search Modal End -->

    <!-- render js footer start -->
    <?= $this->renderSection('jsfooter') ?>
    <!-- render js footer end -->

    <!-- Vendor Scripts Start -->
    <!-- <script src="<?= base_url() ?>/template/js/vendor/jquery-3.5.1.min.js"></script> -->
    <!-- <script src="<?= base_url() ?>/template/js/vendor/bootstrap.bundle.min.js"></script> -->
    <!-- <script src="<?= base_url() ?>/template/js/vendor/OverlayScrollbars.min.js"></script> -->
    <!-- <script src="<?= base_url() ?>/template/js/vendor/autoComplete.min.js"></script> -->
    <!-- <script src="<?= base_url() ?>/template/js/vendor/clamp.min.js"></script> -->
    <!-- <script src="<?= base_url() ?>/template/js/vendor/glide.min.js"></script> -->
    <!-- <script src="<?= base_url() ?>/template/js/vendor/Chart.bundle.min.js"></script> -->
    <!-- <script src="<?= base_url() ?>/template/js/vendor/jquery.barrating.min.js"></script> -->
    <!-- <script src="<?= base_url() ?>/template/js/vendor/bootstrap-submenu.js"></script> -->
    <!-- <script src="<?= base_url() ?>/template/js/vendor/datatables.min.js"></script> -->
    <!-- <script src="<?= base_url() ?>/template/js/vendor/mousetrap.min.js"></script> -->
    <!-- <script src="<?= base_url() ?>/template/js/vendor/select2.full.min.js"></script> -->
    <!-- <script src="<?= base_url() ?>/template/js/vendor/datepicker/bootstrap-datepicker.min.js"></script> -->
    <!-- <script src="<?= base_url() ?>/template/js/vendor/dropzone.min.js"></script> -->
    <!-- <script src="<?= base_url() ?>/template/js/vendor/movecontent.js"></script> -->
    <!-- <script src="<?= base_url() ?>/template/js/vendor/singleimageupload.js"></script> -->
    <!-- <script src="<?= base_url() ?>/template/js/cs/scrollspy.js"></script> -->
    <!-- <script src="<?= base_url() ?>/template/js/vendor/moment-with-locales.min.js"></script> -->
    <!-- <script src="<?= base_url() ?>/template/js/vendor/chartjs-plugin-rounded-bar.min.js"></script> -->
    <!-- <script src="<?= base_url() ?>/template/js/vendor/chartjs-plugin-crosshair.js"></script> -->
    <!-- <script src="<?= base_url() ?>/template/js/vendor/chartjs-plugin-datalabels.js"></script> -->
    <!-- <script src="<?= base_url() ?>/template/js/vendor/chartjs-plugin-streaming.min.js"></script> -->
    <!-- <script src="<?= base_url() ?>/template/js/vendor/diagram.js"></script> -->
    <!-- <script src="<?= base_url() ?>/template/js/vendor/fullcalendar/main.min.js"></script> -->
    <!-- <script src="<?= base_url() ?>/template/js/vendor/timepicker.js"></script> -->
    <!-- <script src="<?= base_url() ?>/template/js/vendor/jquery.validate/jquery.validate.min.js"></script> -->
    <!-- <script src="<?= base_url() ?>/template/js/vendor/jquery.validate/additional-methods.min.js"></script> -->
    <!-- Vendor Scripts End -->

    <!-- Template Base Scripts Start -->
    <!-- <script src="<?= base_url() ?>/template/font/CS-Line/csicons.min.js"></script> -->
    <!-- <script src="<?= base_url() ?>/template/js/cs/dropzone.templates.js"></script> -->
    <!-- <script src="<?= base_url() ?>/template/js/forms/controls.dropzone.js"></script> -->
    <!-- <script src="<?= base_url() ?>/template/js/forms/controls.select2.js"></script> -->
    <!-- <script src="<?= base_url() ?>/template/js/forms/inputmask.js"></script> -->
    <!-- <script src="<?= base_url() ?>/template/js/forms/layouts.js"></script> -->
    <!-- <script src="<?= base_url() ?>/template/js/base/helpers.js"></script> -->
    <!-- <script src="<?= base_url() ?>/template/js/base/globals.js"></script> -->
    <!-- <script src="<?= base_url() ?>/template/js/base/nav.js"></script> -->
    <!-- <script src="<?= base_url() ?>/template/js/base/search.js"></script> -->
    <!-- <script src="<?= base_url() ?>/template/js/base/settings.js"></script> -->
    <!-- <script src="<?= base_url() ?>/template/js/base/init.js"></script> -->
    <!-- Template Base Scripts End -->

    <!-- Page Specific Scripts Start -->
    <!-- <script src="<?= base_url() ?>/template/js/cs/glide.custom.js"></script> -->
    <!-- <script src="<?= base_url() ?>/template/js/cs/charts.extend.js"></script> -->
    <!-- <script src="<?= base_url() ?>/template/js/pages/dashboard.elearning.js"></script> -->
    <!-- <script src="<?= base_url() ?>/template/js/cs/datatable.extend.js"></script> -->
    <!-- <script src="<?= base_url() ?>/template/js/plugins/datatable.editablerows.js"></script> -->
    <!-- <script src="<?= base_url() ?>/template/js/pages/dashboard.visual.js"></script> -->
    <!-- <script src="<?= base_url() ?>/template/js/pages/profile.settings.js"></script> -->
    <!-- <script src="<?= base_url() ?>/template/js/plugins/charts.js"></script> -->
    <!-- <script src="<?= base_url() ?>/template/js/cs/checkall.js"></script> -->
    <!-- <script src="<?= base_url() ?>/template/js/pages/blocks.tabulardata.js"></script> -->
    <!-- <script src="<?= base_url() ?>/template/js/apps/calendar.js"></script> -->
    <!-- <script src="<?= base_url() ?>/template/js/plugins/carousels.js"></script> -->
    <!-- <script src="<?= base_url() ?>/template/js/forms/validation.js"></script> -->
    <!-- <script src="<?= base_url() ?>/template/js/common.js"></script> -->
    <!-- <script src="<?= base_url() ?>/template/js/scripts.js"></script> -->
    <!-- Page Specific Scripts End -->

    <script>
        $(document).ready(function() {

            function countbadge() {
                $.ajax({
                    url: "<?= site_url('career/count_kotak_masuk') ?>",
                    dataType: "json",
                    success: function count_kotak_masuk(res) {
                        if (res > 0) {
                            $('.kotak-masuk').text(res);
                        } else {
                            null
                        }
                    }
                })

                $.ajax({
                    url: "<?= site_url('career/count_kotak_masuk_nonaps') ?>",
                    dataType: "json",
                    success: function count_kotak_masuk(res) {
                        if (res > 0) {
                            $('.kotak-masuk-nonaps').text(res);
                        } else {
                            null
                        }
                    }
                })

                $.ajax({
                    url: "<?= site_url('career/count_kotak_masuk_aps') ?>",
                    dataType: "json",
                    success: function count_kotak_masuk(res) {
                        if (res > 0) {
                            $('.kotak-masuk-aps').text(res);
                        } else {
                            null
                        }
                    }
                })
            }
            window.onload = countbadge;
        })
    </script>
</body>

</html>
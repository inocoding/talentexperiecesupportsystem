<?php

use CodeIgniter\Filters\CSRF;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Aktifasi Akun Sinergi | HTD 4</title>
    <meta name="description" content="Login Page" />
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
    <link rel="stylesheet" href="<?= base_url() ?>/template/css/vendor/bootstrap.min.css" />
    <link rel="stylesheet" href="<?= base_url() ?>/template/css/vendor/OverlayScrollbars.min.css" />

    <!-- Vendor Styles End -->
    <!-- Template Base Styles Start -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/css/styles.css" />
    <!-- Template Base Styles End -->

    <link rel="stylesheet" href="<?= base_url() ?>/template/css/main.css" />
    <script src="<?= base_url() ?>/template/js/base/loader.js"></script>
</head>

<body class="h-100">
    <div id="root" class="h-100">
        <!-- Background Start -->
        <div class="fixed-background"></div>
        <!-- Background End -->

        <div class="container-fluid p-0 h-100 position-relative">
            <div class="row g-0 h-100">
                <!-- Left Side Start -->
                <div class="offset-0 col-12 d-none d-lg-flex offset-md-1 col-lg h-lg-100">
                    <div class="min-h-100 d-flex align-items-center">
                        <div class="w-100">
                            <div>
                                <div class="mb-5">
                                    <h1 class="display-3 text-white"><strong>All in Human Talent Experience</strong></h1>
                                    <h1 class="display-3 text-white"><strong>by PLN HTD Area 4</strong></h1>
                                </div>
                                <p class="h6 text-white lh-1-5 mb-5">
                                    Create & Manage your development experience
                                </p>
                                <div class="mb-5">
                                    <a class="btn btn-lg btn-outline-white" href="#">Learn More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Left Side End -->

                <!-- Right Side Start -->
                <div class="col-12 col-lg-auto h-100 pb-4 px-4 pt-0 p-lg-0">
                    <div class="sw-lg-70 min-h-100 bg-foreground d-flex justify-content-center align-items-center shadow-deep py-5 full-page-content-right-border">
                        <div class="sw-lg-50 px-5">
                            <!-- <div class="sh-11">
                                <a href="index.html">
                                    <div class="logo-default"></div>
                                </a>
                            </div> -->
                            <div class="mb-5">
                                <p class="h6">Please fill this rows to activate your sinergi borneo account.</p>
                            </div>
                            <div>
                                <?php if (session()->getFlashdata('error')) : ?>
                                    <div class="alert alert-danger alert-dismissable show fade" role="alert">
                                        <div class="alert-body">
                                            <?= session()->getFlashdata('error') ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php if (session()->getFlashdata('success')) : ?>
                                    <div class="alert alert-success alert-dismissable show fade" role="alert">
                                        <div class="alert-body">
                                            <?= session()->getFlashdata('success') ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <form class="tooltip-end-bottom" method="POST" action="<?= site_url('auth/prosesaktivasi') ?>" novalidate>
                                    <?= csrf_field() ?>
                                    <div class="mb-3 filled form-group tooltip-end-top">
                                        <i data-cs-icon="user"></i>
                                        <input class="form-control" placeholder="NIP" name="nip" id="username" onkeyup="kapital()" autofocus autocomplete="off" required />
                                    </div>
                                    <div class="form-group input-group filled mb-3">
                                        <i data-cs-icon="email"></i>
                                        <input type="text" class="form-control" placeholder="email" name="email_korpo" required aria-describedby="basic-addon2" style="border-radius: 10px 0 0 10px;" />
                                        <span class="input-group-text" id="basic-addon2">@gmail.com</span>
                                    </div>
                                    <!-- <div class="mb-3 filled form-group tooltip-end-top">
                                        <i data-cs-icon="lock-off"></i>
                                        <input class="form-control" placeholder="Password untuk akun Anda" name="password" id="username" type="password" />
                                    </div> -->
                                    <div class="row">
                                        <div class="col">
                                            <a href="<?= site_url('auth/login') ?>" class="btn btn-lg btn-secondary">Back</a>
                                            <button type="submit" class="btn btn-lg btn-primary" style="float: right;">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Right Side End -->
            </div>
        </div>
    </div>

    <!-- Vendor Scripts Start -->
    <script src="<?= base_url() ?>/template/js/vendor/jquery-3.5.1.min.js"></script>
    <script src="<?= base_url() ?>/template/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>/template/js/vendor/OverlayScrollbars.min.js"></script>
    <script src="<?= base_url() ?>/template/js/vendor/autoComplete.min.js"></script>
    <script src="<?= base_url() ?>/template/js/vendor/clamp.min.js"></script>
    <script src="<?= base_url() ?>/template/js/vendor/jquery.validate/jquery.validate.min.js"></script>
    <script src="<?= base_url() ?>/template/js/vendor/jquery.validate/additional-methods.min.js"></script>
    <!-- Vendor Scripts End -->

    <!-- Template Base Scripts Start -->
    <script src="<?= base_url() ?>/template/font/CS-Line/csicons.min.js"></script>
    <script src="<?= base_url() ?>/template/js/base/helpers.js"></script>
    <script src="<?= base_url() ?>/template/js/base/globals.js"></script>
    <script src="<?= base_url() ?>/template/js/base/nav.js"></script>
    <script src="<?= base_url() ?>/template/js/base/search.js"></script>
    <script src="<?= base_url() ?>/template/js/base/settings.js"></script>
    <script src="<?= base_url() ?>/template/js/base/init.js"></script>
    <!-- Template Base Scripts End -->
    <!-- Page Specific Scripts Start -->
    <script src="<?= base_url() ?>/template/js/pages/auth.login.js"></script>
    <script src="<?= base_url() ?>/template/js/common.js"></script>
    <script src="<?= base_url() ?>/template/js/scripts.js"></script>
    <!-- Page Specific Scripts End -->
    <script>
        function kapital() {
            var x = document.getElementById("username");
            x.value = x.value.toUpperCase();
        }
    </script>
</body>

</html>
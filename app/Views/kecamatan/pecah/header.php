<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kecamatan Pelaihari</title>

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../Asets/lib/animate/animate.min.css" rel="stylesheet">
    <link href="../Asets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../Asets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../Asets/css/style.css" rel="stylesheet">

    <!-- Load Bootstrap and Leaflet CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    
    <style>
        #map {
            width: 100%; /* Lebar peta 100% dari parent container */
            height: 90vh; /* Tinggi peta 90% dari viewport height */
        }
        .leaflet-popup-content-wrapper {
            white-space: normal !important;
        }
        .popup-content {
            max-width: 300px;
            word-wrap: break-word;
        }
    </style>
</head>
<body>
 
<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-grow text-primary" role="status"></div>
</div>

<header class="navbar navbar-expand-lg navbar-dark bg-success fixed-top p-0">
    <div class="container-fluid">
        <div class="row align-items-center w-100">
            <div class="col-md-6 text-center text-md-start d-flex align-items-center">
                <?php if(session()->get('username')): ?>
                    <!-- Jika sudah login, tampilkan tombol tambah bengkel -->
                    <a href="#" class="navbar-brand bg-warning px-4 py-3 d-flex align-items-center me-2" data-bs-toggle="modal" data-bs-target="#modalTambah">
                        <h2 class="m-0"><i class="bi bi-plus-square-fill text-dark"></i></h2>
                    </a>
                <?php endif; ?>

                <!-- Tombol Daftar Bengkel -->
                <button type="button" class="btn btn-primary ms-md-3" data-bs-toggle="modal" data-bs-target="#modalDaftarBengkel">
                    Daftar Bengkel
                </button>
            </div>
            <div class="col-md-6 text-center text-md-end d-flex justify-content-end">
                <?php if(session()->get('username')): ?>
                    <!-- Jika sudah login, tampilkan tombol Logout -->
                    <a href="/logout" class="btn btn-warning navbar-brand px-4 py-3 d-flex align-items-center">
                        <h2 class="m-0"><i class="bi bi-box-arrow-right text-dark"></i> Logout</h2>
                    </a>
                <?php else: ?>
                    <!-- Jika belum login, tampilkan tombol Login -->
                    <a href="#" class="btn btn-warning navbar-brand px-4 py-3 d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#modalLogin">
                        <h2 class="m-0"><i class="bi bi-person-fill text-dark"></i> Login</h2>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->
<div class="container-fluid">
    <div id="map" class="container-fluid">
    </div>
</div>

<!-- Footer Start -->
<footer class="fixed-bottom">
    <div class="container-fluid copyright text-light py-4" data-wow-delay="0.1s">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a href="#">Your Site Name</a>, All Right Reserved.
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                    Designed By <a href="https://htmlcodex.com">HTML Codex</a>
                    <br>Distributed By: <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
                </div>
            </div>
        </div>
    </div>
</footer>
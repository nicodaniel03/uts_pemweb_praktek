<?php
require 'function.php';
require 'cek.php';

if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 'pembeli'){
        header("Location: pemesanan.php");
    }
}

if (!isset($_SESSION['role'])){
    header("Location: login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Rekap Penjualan - Restaurant</title>
        <link rel="stylesheet" href="css/edit.css" /> 
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="nav-fixed">
        <nav class="navbar">
            <a class="navbar-brand" href="index.html">Restaurant</a>
            <button class="sidebar-toggle" id="sidebarToggle"><i class="fas fa-bars"></i></button>

            <ul class="navbar-menu">
                <li class="navbar-item">
                    <a class="navbar-link" id="userDropdown" href="#"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu" aria-labelledby="userDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>

        <div class="layout">
            <aside class="sidenav">
                <div class="sidenav-header">Core</div>
                <a class="sidenav-link" href="index.html">
                    <div class="icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <div class="sidenav-header">Interface</div>
            </aside>

            <main class="content">
                <div class="container">
                    <h1 class="title">Rekap Penjualan</h1>
                    <div class="card">
                        <div class="card-header"><i>Data Hasil Penjualan</i></div>
                        <div class="card-body">
                            <table class="table" id="rekapPenjualanTable">
                                <thead>
                                    <tr>
                                        <th>Nama Customer</th>
                                        <th>Makanan</th>
                                        <th>Minuman</th>
                                        <th>Hari</th>
                                        <th>Tanggal Pemesanan</th>
                                        <th>Jam Pemesanan</th>
                                        <th>Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Ahmad</td>
                                        <td>Nasi Goreng</td>
                                        <td>Es Teh</td>
                                        <td>Senin</td>
                                        <td>2024-11-01</td>
                                        <td>17:45</td>
                                        <td>Rp 20.000</td>
                                    </tr>
                                    <tr>
                                        <td>Siti</td>
                                        <td>Mie Ayam</td>
                                        <td>Es Teh</td>
                                        <td>Senin</td>
                                        <td>2024-11-01</td>
                                        <td>13:00</td>
                                        <td>Rp 17.000</td>
                                    </tr>
                                    <tr>
                                        <td>Wahyu</td>
                                        <td>Nasi Goreng</td>
                                        <td>Jus Jeruk</td>
                                        <td>Senin</td>
                                        <td>2024-11-01</td>
                                        <td>18:00</td>
                                        <td>Rp 30.000</td>
                                    </tr>
                                    <tr>
                                        <td>Ani</td>
                                        <td>Ayam Sambel Ijo</td>
                                        <td>Es Teh</td>
                                        <td>Senin</td>
                                        <td>2024-11-01</td>
                                        <td>15:55</td>
                                        <td>Rp 25.000</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header"><i>Rekap Data Hasil Penjualan</i></div>
                        <div class="card-body">
                            <table class="summary-table">
                                <thead>
                                    <tr>
                                        <th>Periode</th>
                                        <th>Total Penjualan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Selama Seminggu</td>
                                        <td>Rp 0</td>
                                    </tr>
                                    <tr>
                                        <td>Selama Sebulan</td>
                                        <td>Rp 0</td>
                                    </tr>
                                    <tr>
                                        <td>Selama Setahun</td>
                                        <td>Rp 0</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
        </div>

        <script>
            // JavaScript untuk membuka dan menutup dropdown
            document.getElementById("userDropdown").addEventListener("click", function(event) {
                event.preventDefault();
                const dropdown = document.querySelector(".dropdown-menu");
                dropdown.classList.toggle("show");
            });
        </script>
    </body>
</html>

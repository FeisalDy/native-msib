<?php
session_start();
include_once 'top.php';
include_once 'menu.php';
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <?php
            if (isset($_SESSION['user_id']) && isset($_SESSION['role'])) {
                $userRole = $_SESSION['role'];
                $allowedPages = [];
                if ($userRole === 'admin') {
                    $allowedPages = [
                        'top',
                        'bottom',
                        'dashboard',
                        'dummytable',
                        'index',
                        'insertkartu',
                        'insertpelanggan',
                        'insertpesanan',
                        'kartu',
                        'koneksi',
                        'login',
                        'menu',
                        'model',
                        'pelanggan',
                        'pesanan',
                        'product',
                        'prosesdeletekartu',
                        'prosesdeletepelanggan',
                        'prosesdeletepesanan',
                        'prosesinputkartu',
                        'prosesinputpelanggan',
                        'prosesinputpesanan',
                        'proseslogin',
                        'proseslogout',
                        'prosesregisteraccount',
                        'prosesupdatekartu',
                        'prosesupdatepelanggan',
                        'prosesupdatepesanan',
                        'register'
                    ];
                } elseif ($userRole === 'manager') {
                    $allowedPages = [
                        'dashboard',
                        'pelanggan',
                        'pesanan',
                        'product',
                        'kartu',
                        'dummytable'
                    ];
                } else {
                    $allowedPages = [
                        'dashboard',
                        'login',
                        'register',
                    ];
                }
                $url = isset($_GET['url']) ? $_GET['url'] : '';

                if (in_array($url, $allowedPages)) {
                    include_once $url . '.php';
                } else {
                    echo 'Access denied';
                }
            } else {
                $url = isset($_GET['url']) ? $_GET['url'] : '';
                if ($url == 'dashboard') {
                    include_once 'dashboard.php';
                } else if ($url == 'login') {
                    include_once 'login.php';
                } else if ($url == 'register') {
                    include_once 'register.php';
                } else {
                    include_once 'login.php'; // Redirect to login page if the URL is empty or invalid
                }
            }
            ?>
        </div>
    </main>
</div>


<?php
//memanggil file bagian bawah
include_once 'bottom.php';
?>
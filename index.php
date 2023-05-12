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
                        'dashboard',
                        'url=index.php?url=pelanggan',
                        'pesanan',
                        'kartu'
                    ];
                } elseif ($userRole === 'manager') {
                    $allowedPages = [
                        'dashboard',
                        'pelanggan'
                    ];
                } else {
                    $allowedPages = [
                        'dashboard',
                        'login',
                        'register'
                    ];
                }
                $url = isset($_GET['url']) ? $_GET['url'] : '';

                if (in_array($url, $allowedPages)) {
                    include_once $url . '.php';
                } else {
                    header("refresh:2;url=index.php?url=dashboard");
                    exit();
                }
            } else {
                $url = $_GET['url'];
                if ($url == 'dashboard') {
                    include_once 'dashboard.php';
                } else if (!empty($url)) {
                    include_once '' . $url . '.php';
                } else {
                    'dashboard.php';
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
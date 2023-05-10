<?php
// Memanggil dan memproses file bagian atas
include_once 'top.php';
// Memanggil dan memproses file bagian menu
include_once 'menu.php';
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <?php
            // Algoritma menangkap URL agar masuk ke dalam index
            $url = isset($_GET['url']) ? $_GET['url'] : '';
            if ($url == 'dashboard') {
                include_once 'dashboard.php';
            } else if (!empty($url)) {
                include_once $url . '.php';
            } else {
                include_once 'dashboard.php';
            }
            ?>
        </div>
    </main>
</div>
<?php
// Memanggil file bagian bawah
include_once 'bottom.php';
?>
<?php
require_once 'model.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Mengambil data dari form
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $diskon = $_POST['diskon'];
    $iuran = $_POST['iuran'];


    // Membuat objek Model
    $model = new Model();

    // Memanggil fungsi insertPelanggan() dengan data yang diperoleh dari form
    $model->inputKartu($kode, $nama, $diskon, $iuran);

    // Tampilkan pesan sukses atau redirect ke halaman lain jika diperlukan
    header("refresh:2;url=index.php?url=pesanan");
    exit();
}

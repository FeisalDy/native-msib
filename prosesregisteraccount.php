<?php
require_once 'model.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Mengambil data dari form
    $nama_depan = $_POST['nama_depan'];
    $nama_belakang = $_POST['nama_belakang'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Membuat objek Model
    $model = new Model();

    // Memanggil fungsi insertPelanggan() dengan data yang diperoleh dari form
    $model->createAccount($nama_depan, $nama_belakang, $email, $password);

    // Tampilkan pesan sukses atau redirect ke halaman lain jika diperlukan
    header("refresh:2;url=index.php?url=login");
    exit();
}

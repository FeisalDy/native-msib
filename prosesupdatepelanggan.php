<?php
require_once 'model.php';
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the submitted form data
    $id = $_POST['id'];
    $kode = $_POST['kode'];
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $alamat = $_POST['alamat'];
    $gender = $_POST['gender'];
    $tempat_lahir = $_POST['tmp_lahir'];
    $tanggal_lahir = $_POST['tgl_lahir'];
    $email = $_POST['email'];
    $kartu_id = $_POST['kartu_id'];

    $model = new Model();

    $model->updatePelanggan($id, $kode, $nama_pelanggan, $alamat, $gender, $tempat_lahir, $tanggal_lahir, $email, $kartu_id);
    header("refresh:2;url=index.php?url=pelanggan");
    exit();
} else {
    // Invalid request method
    echo 'Invalid request';
}

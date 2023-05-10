<?php
require_once 'model.php';
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the submitted form data
    $id = $_POST['id'];
    $tanggal = $_POST['tanggal'];
    $total = $_POST['total'];
    $pelanggan_id = $_POST['pelanggan_id'];
    $status = $_POST['status'];

    $model = new Model();

    $model->updatePesanan($id, $tanggal, $total, $pelanggan_id, $status);
    header("refresh:2;url=index.php?url=pesanan");
    exit();
} else {
    // Invalid request method
    echo 'Invalid request';
}

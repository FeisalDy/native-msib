<?php
require_once 'model.php';
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the submitted form data
    $id = $_POST['id'];
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $diskon = $_POST['diskon'];
    $iuran = $_POST['iuran'];

    $model = new Model();

    $model->updateKartu($id, $kode, $nama, $diskon, $iuran);
    header("refresh:2;url=index.php?url=kartu");
    exit();
} else {
    // Invalid request method
    echo 'Invalid request';
}

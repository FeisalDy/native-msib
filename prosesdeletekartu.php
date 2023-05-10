<?php
require_once 'model.php';
// Check if the ID parameter is present in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $model = new Model();

    $model->deleteKartu($id);
    header("refresh:2;url=index.php?url=kartu");
} else {
    // ID parameter not found in the URL
    echo 'Invalid request';
}

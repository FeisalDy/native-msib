<?php
// Include the necessary files and instantiate the User class
require_once 'model.php';
$model = new Model();

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the submitted email and password
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Call the login function
    $model->login($email, $password);
} else {
    // Redirect to the login page if the form is not submitted
    header('Location: index.php?url=login');
    exit();
}

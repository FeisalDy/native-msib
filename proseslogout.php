<?php
session_start();

// Destroy the session
session_destroy();

// Redirect to the login page
header("Location: index.php?url=login");
exit();

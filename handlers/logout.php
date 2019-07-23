<?php

session_start();

if (isset($_SESSION['users_id'])) unset($_SESSION['users_id']);

echo "Logout Successful";

header("location: ../index.php");

?>
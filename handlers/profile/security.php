<?php

$_POST = json_decode(file_get_contents('php://input'), true);

require_once '../../db.php';

session_start();

$con = new pdo_db();

$con->table = "users_tbl";
	
$session_user_id = $_SESSION['id'];	

$user = $con->getData("SELECT password FROM users_tbl WHERE id = $session_user_id");	

header("Content-Type: application/json");
echo json_encode($user[0]);
?>
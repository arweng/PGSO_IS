<?php

$_POST = json_decode(file_get_contents('php://input'), true);

include_once '../../db.php';

header("Content-Type: application/json");

session_start();

$con = new pdo_db("users_tbl");

$session_user_id = $_SESSION['id'];		

$con->updateData(array("id"=>$session_user_id,"username"=>$_POST['username']),'id');

?>
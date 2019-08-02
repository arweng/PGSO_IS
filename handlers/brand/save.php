<?php

header("Content-Type: application/json");

$_POST = json_decode(file_get_contents('php://input'), true);

include_once '../../db.php';

$con = new pdo_db("brand");


if ($_POST['brand']['id']) {
	
	$brand = $con->updateObj($_POST['brand'],'id');
	
} else {
	
	$brand = $con->insertObj($_POST['brand']);
	echo $con->insertId;

}

?>
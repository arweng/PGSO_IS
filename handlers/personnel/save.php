<?php

header("Content-Type: application/json");

$_POST = json_decode(file_get_contents('php://input'), true);

include_once '../../db.php';

$con = new pdo_db("personnel");


if ($_POST['personnel']['id']) {
	
	$personnel = $con->updateObj($_POST['personnel'],'id');
	
} else {
	
	$personnel = $con->insertObj($_POST['personnel']);
	echo $con->insertId;

}

?>
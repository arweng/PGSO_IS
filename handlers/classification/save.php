<?php

header("Content-Type: application/json");

$_POST = json_decode(file_get_contents('php://input'), true);

include_once '../../db.php';

$con = new pdo_db("classifications");


if ($_POST['classification']['id']) {
	
	$classification = $con->updateObj($_POST['classification'],'id');
	
} else {
	
	$classification = $con->insertObj($_POST['classification']);
	echo $con->insertId;

}

?>
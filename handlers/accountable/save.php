<?php

header("Content-Type: application/json");

$_POST = json_decode(file_get_contents('php://input'), true);

include_once '../../db.php';

$con = new pdo_db("accountable");


if ($_POST['accountable']['id']) {
	
	$accountable = $con->updateObj($_POST['accountable'],'id');
	
} else {
	
	$accountable = $con->insertObj($_POST['accountable']);
	echo $con->insertId;

}

?>
<?php

header("Content-Type: application/json");

$_POST = json_decode(file_get_contents('php://input'), true);

include_once '../../db.php';

$con = new pdo_db("groups");


if ($_POST['group']['group_id']) {
	
	$group = $con->updateObj($_POST['group'],'group_id');
	
} else {
	
	$group = $con->insertObj($_POST['group']);
	echo $con->insertId;

}

?>
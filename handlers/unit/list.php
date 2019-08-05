<?php

$_POST = json_decode(file_get_contents('php://input'), true);

require_once '../../db.php';

session_start();

$con = new pdo_db("units");

$units = $con->getData("SELECT * FROM units");

	// child
	foreach($units as $key => $unit) {

		$department = $con->getData("SELECT * FROM department WHERE id = ".$unit['dept_id']);
		$units[$key]['dept_id'] = $department[0];

	};

header("Content-Type: application/json");
echo json_encode($units);

?>
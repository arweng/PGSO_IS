<?php

$_POST = json_decode(file_get_contents('php://input'), true);

require_once '../../db.php';

session_start();

$con = new pdo_db("classifications");

$classifications = $con->getData("SELECT * FROM classifications");

	// child
	foreach($classifications as $key => $classification) {

		$type = $con->getData("SELECT * FROM type WHERE id = ".$classification['type_id']);
		$classifications[$key]['type_id'] = $type[0];

	};

header("Content-Type: application/json");
echo json_encode($classifications);

?>
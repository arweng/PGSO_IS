<?php

define('system_privileges', array(

	array(
		"id"=>"dashboard",
		"description"=>"Dashboard",
		"privileges"=>array( # id=1 must be always page access
			array("id"=>1,"description"=>"Show Dashboard","value"=>false),
			array("id"=>1,"description"=>"Edit Dashboard","value"=>false),
			array("id"=>1,"description"=>"Delete Dashboard","value"=>false),
			array("id"=>1,"description"=>"Update Dashboard","value"=>false),
		),
	),
	array(
		"id"=>"equipment",
		"description"=>"Equipment",
		"privileges"=>array(
			array("id"=>1,"description"=>"Show Equipment","value"=>false),
			
		),
	),
	 array(
		 "id"=>"report",
		 "description"=>"Report",
		 "privileges"=>array(
		 array("id"=>1,"description"=>"Show Report","value"=>false),
		 ),
	),array(
		 "id"=>"maintenance",
		 "description"=>"Report",
		 "privileges"=>array(
		 array("id"=>1,"description"=>"Show Report","value"=>false),
		 ),
	),
	
));
?>
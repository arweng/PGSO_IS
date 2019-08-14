<?php
header("Content-Type: application/json");
$_POST = json_decode(file_get_contents('php://input'), true);

require_once '../db.php';
require_once '../system_privileges.php';
require_once '../classes.php';

session_start();

header("Content-Type: application/json");

$con = new pdo_db();

// $profile = [];
$sql = "SELECT id, groups, CONCAT(users_firstname,' ',users_lastname) fullname, (SELECT groups.group_description FROM groups WHERE groups.group_id = users_tbl.groups) account_type FROM users_tbl WHERE id = $_SESSION[id]";

$account = $con->getData($sql);

$dir = "pictures/";
$avatar = $dir."avatar.png";

$picture = $dir.$account[0]['id'].".jpg";
if (!file_exists("../".$picture)) $picture = $avatar;
//$profile['fullname'] = $account[0]['fullname'];

$account[0]['picture'] = $picture;

$_SESSION['account'] = $account[0];

$con->table = "groups";

// $group_privileges = $con->get(array("group_id"=>$account[0]['groups']),["privileges"]);


$group_privileges = $con->get(array("group_id"=>$_POST['group_id']),["privileges"]);
$pages_access = [];
if (count($group_privileges)) {
	
	if ($group_privileges[0]['privileges']!=NULL) {
		
		$privileges_obj = new privileges(system_privileges,$group_privileges[0]['privileges']);
		$privileges = $privileges_obj->getPrivileges();

    }
}
$account[0]['pages_access'] = $pages_access;


//$profile['picture'] = $picture;

echo json_encode($account[0]);

?>
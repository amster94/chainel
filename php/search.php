<?php
define('DB_USER', 'root');
define('DB_PASSWORD', '12345');
define('DB_SERVER', 'localhost');
define('DB_NAME', 'chainel');

// define('DB_USER', 'chainelc_user');
// define('DB_PASSWORD', 'chain_123');
// define('DB_SERVER', 'localhost');
// define('DB_NAME', 'chainelc_db');
$arr = array();

// live search for client form
if (!$db = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME)) {
	die($db->connect_errno.' - '.$db->connect_error);
}

if (!empty($_POST['keywords'])) {
	$keywords = $db->real_escape_string($_POST['keywords']);
	$sql = "SELECT * FROM bclient WHERE client_code LIKE '%".$keywords."%' OR name LIKE '%".$keywords."%' ";
	$result = $db->query($sql) or die($mysqli->error);
	if ($result->num_rows > 0) {
		while ($obj = $result->fetch_object()) {
			$arr[] = array('id' => $obj->client_code, 'title' => $obj->name);
		}
	}
}

// live search for Location form 
if (!$db = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME)) {
	die($db->connect_errno.' - '.$db->connect_error);
}
if (!empty($_POST['locationkey'])) {
	$keywords = $db->real_escape_string($_POST['locationkey']);
	$sql = "SELECT * FROM location WHERE location_code LIKE '%".$keywords."%' OR location_name LIKE '%".$keywords."%' ";
	$result = $db->query($sql) or die($mysqli->error);
	if ($result->num_rows > 0) {
		while ($obj = $result->fetch_object()) {
			$arr[] = array('id' => $obj->location_code, 'title' => $obj->location_name);
		}
	}
}

// live search for user form
if (!$db = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME)) {
	die($db->connect_errno.' - '.$db->connect_error);
}
if (!empty($_POST['userkey'])) {
	$keywords = $db->real_escape_string($_POST['userkey']);
	$sql = "SELECT * FROM new_user WHERE user_name LIKE '%".$keywords."%' OR user_code LIKE '%".$keywords."%' ";
	$result = $db->query($sql) or die($mysqli->error);
	if ($result->num_rows > 0) {
		while ($obj = $result->fetch_object()) {
			$arr[] = array('id' => $obj->user_code, 'title' => $obj->user_name);
		}
	}
}

// live search for product form
if (!$db = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME)) {
	die($db->connect_errno.' - '.$db->connect_error);
}

if (!empty($_POST['productkey'])) {
	$keywords = $db->real_escape_string($_POST['productkey']);
	$sql = "SELECT * FROM products WHERE prod_code LIKE '%".$keywords."%' OR prod_descr LIKE '%".$keywords."%' ";
	$result = $db->query($sql) or die($mysqli->error);
	if ($result->num_rows > 0) {
		while ($obj = $result->fetch_object()) {
			$arr[] = array('id' => $obj->prod_code, 'title' => $obj->prod_descr);
		}
	}
}

// live search for product category form
if (!$db = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME)) {
	die($db->connect_errno.' - '.$db->connect_error);
}

if (!empty($_POST['product_ctg_key'])) {
	$keywords = $db->real_escape_string($_POST['product_ctg_key']);
	$sql = "SELECT * FROM product_category WHERE prod_ctg_code LIKE '%".$keywords."%' OR prod_ctg_title LIKE '%".$keywords."%' ";
	$result = $db->query($sql) or die($mysqli->error);
	if ($result->num_rows > 0) {
		while ($obj = $result->fetch_object()) {
			$arr[] = array('id' => $obj->prod_ctg_code, 'title' => $obj->prod_ctg_title);
		}
	}
}

if (!empty($_POST['order_key'])) {
	$keywords='';
	$keywords = $db->real_escape_string($_POST['order_key']);
	if ($keywords=='') {
		$sql = "SELECT * FROM products";
		$result = $db->query($sql) or die($mysqli->error);
		if ($result->num_rows > 0) {
			while ($obj = $result->fetch_object()) {
				$arr[] = array('id' => $obj->prod_code, 'title' => $obj->prod_descr);
			}
		}	
	}else{
		$sql = "SELECT * FROM products WHERE prod_code LIKE '%".$keywords."%' OR prod_descr LIKE '%".$keywords."%' ";
		$result = $db->query($sql) or die($mysqli->error);
		if ($result->num_rows > 0) {
			while ($obj = $result->fetch_object()) {
				$arr[] = array('id' => $obj->prod_code, 'title' => $obj->prod_descr);
			}
		}
	}
	
}
if (!empty($_POST['newskey'])) {
	$keywords = $db->real_escape_string($_POST['newskey']);
	$sql = "SELECT * FROM news WHERE news LIKE '%".$keywords."%' OR news_id LIKE '%".$keywords."%' ";
	$result = $db->query($sql) or die($mysqli->error);
	if ($result->num_rows > 0) {
		while ($obj = $result->fetch_object()) {
			$arr[] = array('id' => $obj->news_id, 'title' => $obj->news);
		}
	}
}
echo json_encode($arr);
?>

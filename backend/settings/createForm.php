<?php 
session_start();
include_once '../../config/config.php';
include '../../config/insert.php';

$page = $_SERVER['HTTP_REFERER'];
if ($_SERVER["REQUEST_METHOD"] == 'POST') {
	if (!empty($_POST['kkey']) && !empty($_POST['value'])) {

        $db = new DB();
		$key = $db->escape($_POST["kkey"]);
		$value = $db->escape($_POST["value"]);

		if ($_POST['status'] == 1) {
			$status = '1';
		}else{
			$status = '0';
		}

        $column = ['kkey', 'value', 'status'];
        $value = [$key, $value, $status];

        Insert::insert('settings',$column, $value);
		
	}else {
		$_SESSION['error_message'] = "blank cannot be passed";

    }
}
header("Location: $page");
<?php 
session_start();
include_once '../../config/config.php';

$page = $_SERVER['HTTP_REFERER'];

if ($_SERVER["REQUEST_METHOD"] == 'POST') {

	if (!empty($_POST['id']) &&  !empty($_POST['kkey']) && !empty($_POST['value'])) {

        $db = new DB();
		$id = $db->escape($_POST["id"]);
		$kkey = $db->escape($_POST["kkey"]);
		$value = $db->escape($_POST["value"]);

		if ($_POST['status'] == 1) {
			$status = 1;
		}else{
			$status = 0;
		}
		
		$sql = "UPDATE settings SET 
		kkey='$kkey',
		value='$value',
		status='$status'
		WHERE id=$id";

		if ($db->update($sql) > 0) {

			$_SESSION['success_message'] = "Successful";
        } else {
			$_SESSION['error_message'] = "An error occurred while loading the database";
        }

    }else {
		$_SESSION['error_message'] = "blank cannot be passed";
    }
}
header("Location: $page");
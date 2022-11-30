<?php 
session_start();
include_once '../../config/config.php';

$page = $_SERVER['HTTP_REFERER'];
if ($_SERVER["REQUEST_METHOD"] == 'POST') {

	if (!empty($_POST['id']) && !empty($_POST['title'])) {

        $db = new DB();
		$id = $db->escape($_POST["id"]);
		$title = $db->escape($_POST["title"]);

		if ($_POST['is_menu'] == 1) {
			$is_menu = '1';
		}else{
			$is_menu = '0';
		}

		if ($_POST['status'] == 1) {
			$status = '1';
		}else{
			$status = '0';
		}

		$sql = "UPDATE categories SET title='$title',is_menu='$is_menu',status='$status' WhERE id=$id";

		if ($db->update($sql) > 0) {

			$_SESSION['success_message'] = "Successful";
        } else {
			$_SESSION['error_message'] = "An error occurred while loading the database";
        }

    }else {
		$_SESSION['error_message'] = "blank cannot be passed";

    }
    header("Location: $page");
}
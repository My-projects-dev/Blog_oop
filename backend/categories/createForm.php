<?php 
session_start();
include_once '../../config/config.php';
include '../../config/insert.php';

$page = $_SERVER['HTTP_REFERER'];
if ($_SERVER["REQUEST_METHOD"] == 'POST') {

	if (!empty($_POST['title'])) {

        $db = new DB();
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

        $column = ['title', 'is_menu', 'status'];
        $value = [$title, $is_menu,$status];

        Insert::insert('categories',$column, $value);

    }else {
		$_SESSION['error_message'] = "blank cannot be passed";
    }
}
header("Location: $page");
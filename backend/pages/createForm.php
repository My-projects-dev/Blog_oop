<?php 
session_start();
include_once '../../config/config.php';
include '../../config/insert.php';

$page = $_SERVER['HTTP_REFERER'];
if ($_SERVER["REQUEST_METHOD"] == 'POST') {

	if (!empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['content'])) {

        $db = new DB();
		$title = $db->escape($_POST["title"]);
		$description = $db->escape($_POST["description"]);
		$content = $db->escape($_POST["content"]);

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

        $column = ['title', 'description', 'content','is_menu', 'status'];
        $value = [$title, $description, $content, $is_menu,$status];

        Insert::insert('pages',$column, $value);

    }else {
		$_SESSION['error_message'] = "blank cannot be passed";
    }
    header("Location: $page");
}
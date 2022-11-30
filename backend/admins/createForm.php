<?php
session_start();
include_once '../../config/config.php';
include '../../config/insert.php';

$page = $_SERVER['HTTP_REFERER'];
if ($_SERVER["REQUEST_METHOD"] == 'POST') {

    if (!empty($_POST['name']) && !empty($_POST['surname']) && !empty($_POST['email']) && !empty($_POST['username']) && !empty($_POST['password1']) && !empty($_POST['password2'])) {

        $db = new DB();

        $name = $db->escape($_POST["name"]);
        $surname = $db->escape($_POST["surname"]);
        $email = $db->escape($_POST["email"]);
        $username = $db->escape($_POST["username"]);
        $password1 = md5($_POST['password1']);
        $password2 = md5($_POST['password2']);

        if ($_POST['status'] == 1) {
            $status = '1';
        } else {
            $status = '0';
        }

        if ($password1 != $password2) {
            $errorMessage = "passwords are not equal";
            errorHeader($errorMessage, $page);
        }

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

            $column = ['name', 'surname', 'email', 'username', 'status', 'password'];
            $value = [$name, $surname, $email, $username, $status, $password1];

            Insert::insert('admin',$column, $value);

        } else {
            $_SESSION['error_message'] = "$email is not a valid email address";
        }
    } else {
        $_SESSION['error_message'] = "blank cannot be passed";
    }
}
header("Location: $page");
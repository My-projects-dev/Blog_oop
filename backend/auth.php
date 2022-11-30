<?php
session_start();

include_once '../config/config.php';

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        $db = new DB();
        $username = $db->escape($_POST["username"]);
        $password = md5($_POST["password"]);

        $select = "SELECT * FROM admin WHERE username='$username' and password='$password'";

        $admin = $db->select($select);
        if (!empty($admin) && $admin['status'] == 1) {
            $_SESSION['user'] = $admin;
            $_SESSION['logged_in'] = 1;
            header("Location:index.php");
        } else {
            $_SESSION['error_message'] = "Username or Password are incorrect";
            header("Location:login.php");
        }
    } else {
        $_SESSION['error_message'] = "Fields must  not be empty";
        header("Location:login.php");
    }
} else {
    echo "Not Allowed";
    die();
}
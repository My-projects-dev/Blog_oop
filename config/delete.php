<?php
include_once 'config.php';

class Delete
{
    static function delete($table)
    {
        $page = $_SERVER['HTTP_REFERER'];

        $id=$_GET['id'];

        $db = new DB();

        if ($db->delete($table, $id) > 0) {
            $_SESSION['success_message'] = "Successful";
        } else {
            $_SESSION['error_message'] = "Could not be deleted because it was used in a post";
        }
        header("Location: $page");
    }
}
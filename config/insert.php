<?php
include_once 'config.php';

class Insert{
    static function insert($table, $column=array(), $value =array()){

        $columns = implode(',', $column);
        $values = implode("','", $value);

        $sql = "INSERT INTO $table ($columns) VALUES ('$values')";

        $db=new DB();
        if ($db->create($sql)) {
            $_SESSION['success_message'] = "Successful";
        } else {
            $_SESSION['error_message'] = "An error occurred while loading the database";
        }


    }
}
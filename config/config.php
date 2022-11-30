<?php

class DB
{
    private $host = "Localhost";
    private $login = "root";
    private $password = "";
    private $dbname = "divblog";
    private $db;

    function __construct()
    {
        $this->db = new mysqli($this->host, $this->login, $this->password, $this->dbname);
        if ($this->db->connect_error) {
            die("Connection failed: " . $this->db->connect_error);
        }
    }

    function __destruct()
    {
        $this->db->close();
    }

    function escape($data): string
    {
        return $this->db->real_escape_string(strip_tags($data));
    }

    function count($sql)
    {
        $query = $this->db->query($sql);
        return $query->num_rows;
    }

    function selectAll($sql): array
    {
        $result = [];
        $query = $this->db->query($sql);

        if ($query->num_rows > 0) {
            $result = $query->fetch_all(MYSQLI_ASSOC);
            return $result;
        }
        return $result;
    }

    function select($sql)
    {
        $result = [];
        $query = $this->db->query($sql);

        if ($query->num_rows > 0) {
            $result = $query->fetch_assoc();
        }
        return $result;
    }

    function delete($table, $id)
    {
        try {
            $sql = "DELETE FROM $table WHERE id=$id";
            $this->db->query($sql);
        } finally {
            return $this->db->affected_rows;
        }
        /*$sql = "DELETE FROM $table WHERE id=$id";
        $this->db->query($sql);
        if (!$this->db-> query("INSERT INTO Persons (FirstName) VALUES ('Glenn')")) {
            echo("Errorcode: " . $this->db-> errno);
        }*/
    }

    function create($sql)
    {
        $this->db->query($sql);
        return $this->db->insert_id;
    }

    function update($sql): bool
    {
        $this->db->query($sql);
        return $this->db->affected_rows;
    }
}
<?php

class Dbh
{
    private string $username;
    private string $password;
    private string $host;
    private string $db;
    public $conn;

    public function __construct()
    {
        $this->username = "root";
        $this->password = "";
        $this->host = "localhost";
        $this->db = "petsola";

        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->db", $this->username, $this->password);
        } catch (PDOException $e) {
            // Print out the error
            print "Error!: " . $e->getMessage() . "<br />";
            die();
        }
    }

    public function fetchAll(string $table)
    {
        $sql = "SELECT * FROM $table";
        $stmt = $this->conn->prepare($sql);

        if (!$stmt->execute()) {
            $this->conn = null;
            exit();
        }

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}

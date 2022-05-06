<?php

class Db {

    private $host = "localhost";
    private $user = "root";
    private $pwd = "";
    private $dbName = "php-oop-mvc";

    protected function connect() {
        try {

            $dbh = 'mysql:host=' . $this->host . '; dbname=' . $this->dbName;
            $pdo = new PDO($dbh, $this->user, $this->pwd);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $pdo;

        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}

?>
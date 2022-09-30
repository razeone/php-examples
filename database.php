<?php

class Database {
    private $connection = null;

    public function __construct($dbhost = "localhost", $dbname = "myDatabase", $username = "root", $password = "") {
        try {
            $this->connection = new PDO("mysql:host={$dbhost};dbname={$dbname};", $username, $password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch(Exception $e) {
            throw new Exception($e->getMessage());
        }

    }

    public function Select($statement = "", $parameters = []) {
	try {
		$stmt = $this->executeStatement($statement, $parameters);
		return $stmt->fetchAll();
	} catch(Exception $e) {
		throw new Exception($e->getMessage());
	}
    }

    public function Insert($statement = "", $parameters = []) {
	try {
		$res = $this->executeStatement($statement, $parameters);
		return $this->getLastInsertId();
	} catch(Exception $e) {
		throw new Exception($e->getMessage());
	}
    }

    public function Update($statement = "", $parameters = []) {
	    try {
		    $this->executeStatement($statement, $parameters);
	    } catch(Exception $e) {
		    throw new Exception($e->getMessage());
	    }
    }

    public function Delete() {
	    try {
		    $this->executeStatement($statement, $parameters);
	    } catch(Exception $e) {
		    throw new Exception($e->getMessage());
	    }
    }

    public function getLastInsertId() {
	try {
		return $this->connection->lastInsertId();
	} catch(Exception $e) {
		throw new Exception($e->getMessage());
	}
    }

    public function executeStatement($statement = "", $parameters = []) {
        try {
            $stmt = $this->connection->prepare($statement);
            $stmt->execute($parameters);
            return $stmt;
        } catch(Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}

?>

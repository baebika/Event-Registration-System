<?php
class Database
{
    private $host = 'localhost';
    private $port = '3307';
    private $db_name = 'event-registration';
    private $username = 'root';
    private $password = '';
    private $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ];
    public $conn;

    public function __construct()
    {
        try {
            $this->conn = new PDO(
                "mysql:host=$this->host;port=$this->port;dbname=$this->db_name",
                $this->username,
                $this->password,
                $this->options
            );
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    public function getConnection()
    {
        return $this->conn;
    }

    public function countRows($query, $params = [])
    {
        $stmt = $this->conn->prepare($query);
        $stmt->execute($params);
        return $stmt->rowCount(); //returns the number of rows affected
    }

    public function SELECT($query, $params = [])
    {
        $stmt = $this->conn->prepare($query);
        $stmt->execute($params);
        return $stmt->fetchAll(); //fetchAll() returns an array containing all of the result set rows
    }

    public function create($query, $params = [])
    {
        $stmt = $this->conn->prepare($query);
        $stmt->execute($params);
        return $this->conn->lastInsertId(); //returns the ID of the last inserted row
    }

    public function update($query, $params = [])
    {
        $stmt = $this->conn->prepare($query);
        $stmt->execute($params);
        return $stmt->rowCount(); //returns true if the query was successful
    }

    public function delete($query, $params = [])
    {
        $stmt = $this->conn->prepare($query);
        $stmt->execute($params);
        return $stmt->rowCount(); // returns the number of affected rows (not used as of now but can be used for error handling)
    }
}

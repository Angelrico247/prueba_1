<?php

require_once "../../config/database.php";

class User
{
    private $conn;

    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    public function createUser(string $username, string $password): bool
    {
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO usuarios (username, password) VALUES (:username, :password)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue("username", $username);
        $stmt->bindValue("password", $passwordHash);

        return $stmt->execute();
    }


    public function login(string $username, string $password): bool
    {
        $query = "SELECT * FROM usuarios WHERE username=:username";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue("username", $username);
        $stmt->execute();

        $cliente = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($cliente) {
            if (password_verify($password, $cliente['password'])) {
                session_start();
                $_SESSION['username'] = $username;
                return true;
                exit();
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
}

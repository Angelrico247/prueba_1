<?php

require_once "../../config/database.php";
require_once "../../config/auth.php";

class Cliente
{
    private PDO $conn;

    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    public function createClient(string $nombre, string $apellido, string $domicilio, string $email): bool
    {
        $query = "INSERT INTO clientes (nombre, apellido, domicilio, email) VALUES (:nombre, :apellido, :domicilio, :email)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue("nombre", $nombre);
        $stmt->bindValue("apellido", $apellido);
        $stmt->bindValue("domicilio", $domicilio);
        $stmt->bindValue("email", $nombre);
        return $stmt->execute();
    }


    public function getAll(): array
    {
        $query = "SELECT * FROM clientes";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        $clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $clientes;
    }

    public function deleteClient(int $id): bool
    {
        $query = "DELETE FROM clientes WHERE id =:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue("id", $id);

        return $stmt->execute();
    }

    public function updateClient(int $id, string $nombre, string $apellido, string $domicilio, string $email): bool
    {
        $query = "UPDATE clientes SET nombre=:nombre, apellido=:apellido, domicilio=:domicilio, email=:email WHERE id =:id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue("id", $id);
        $stmt->bindValue("nombre", $nombre);
        $stmt->bindValue("apellido", $apellido);
        $stmt->bindValue("domicilio", $domicilio);
        $stmt->bindValue("email", $email);
        return $stmt->execute();
    }

}

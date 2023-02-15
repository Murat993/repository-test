<?php

class UserRepository
{

    private $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function create(string $username, string $number)
    {
        $stmt = $this->db->prepare("INSERT INTO user (number, username) VALUES (:number, :username);");
        $stmt->execute([
            'username' => $username,
            'number'  => $number,
        ]);

        return $stmt->rowCount();
    }

    public function findAll()
    {
        $stmt = "SELECT id, `number`, username FROM user;";
        $stmt = $this->db->query($stmt);

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}
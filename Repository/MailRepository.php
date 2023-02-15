<?php

class MailRepository
{

    private $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function create(string $subject, string $message, string $status, int $userId)
    {
        $stmt = $this->db->prepare("INSERT INTO email (`subject`, `message`, `status`, `user_id`) VALUES (:subject, :message, :status, :userId);");
        $stmt->execute([
            'subject' => $subject,
            'message'  => $message,
            'status'  => $status,
            'userId'  => $userId,
        ]);

        return $stmt->rowCount();

    }

    public function changeStatus(int $id, string $status)
    {
        $stmt = "UPDATE email SET status = :status WHERE id = :id;";
        $stmt = $this->db->prepare($stmt);
        $stmt->execute(['id' => $id, 'status' => $status]);
        return $stmt->rowCount();
    }

    public function findDraftedNotifications(string $status)
    {
        $stmt = $this->db->prepare("SELECT id, subject, message, status, user_id  FROM email WHERE `status` = ?;");
        $stmt->execute([$status]);

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}
<?php

class UserController extends BaseController
{

    private $mailRepository;
    private $mailService;
    private $userRepository;

    public function __construct($db)
    {
        $this->userRepository = new UserRepository($db);
        $this->mailRepository = new MailRepository($db);
        $this->mailService = new MailService();
    }

    public function loadAction()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $tmpName = $_FILES['file']['tmp_name'];
            $csvData = array_map('str_getcsv', file($tmpName));

            foreach ($csvData as $item) {
                 $this->userRepository->create(trim($item[0]), trim($item[1]));
            }

            return $this->send(['message' => 'success']);
        }

        throw new Exception('page not found');
    }

    public function sendAction()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $users = $this->userRepository->findAll();

            foreach ($users as $user) {
                $this->mailRepository->create(
                    'Subject',
                    'message text',
                    MailService::STATUS_DRAFT,
                    $user['id']
                );
            }

            $emails = $this->mailRepository->findDraftedNotifications(MailService::STATUS_DRAFT);

            try {
                foreach ($emails as $email) {
                    $this->mailService->send($email);
                    $this->mailRepository->changeStatus($email['id'],MailService::STATUS_FINISHED);
                }
            } catch (Exception $e) {
                $this->mailRepository->changeStatus($email['id'],MailService::STATUS_ERROR);
            }

            return $this->send(['message' => 'success']);
        }

        throw new Exception('page not found');
    }
}
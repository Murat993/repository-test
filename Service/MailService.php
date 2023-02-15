<?php

class MailService
{
    const STATUS_DRAFT = 'draft';
    const STATUS_FINISHED = 'finished';
    const STATUS_ERROR = 'error';

    public function send($email): bool
    {
        return true;
    }
}
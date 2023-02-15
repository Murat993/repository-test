<?php

class BaseController
{
    /**
     * Send API output.
     *
     * @param mixed $data
     * @param string $httpHeader
     */
    protected function send($data): array
    {
        header('Content-Type: application/json');
        echo json_encode($data);
        exit(200);
    }
}
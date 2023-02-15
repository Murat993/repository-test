<?php

const PROJECT_ROOT_PATH = __DIR__;
const DB_HOST = 'mysql';
const DB_USERNAME = 'user';
const DB_PASSWORD = 'password';
const DB_DATABASE_NAME = 'db';
const DB_PORT = 3306;

require_once PROJECT_ROOT_PATH . "/System/DatabaseConnector.php";
require_once PROJECT_ROOT_PATH . "/Controller/BaseController.php";
require_once PROJECT_ROOT_PATH . "/Repository/UserRepository.php";
require_once PROJECT_ROOT_PATH . "/Repository/MailRepository.php";
require_once PROJECT_ROOT_PATH . "/Service/MailService.php";

$dbConnection = (new DatabaseConnector(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE_NAME, DB_PORT))->getConnection();

?>
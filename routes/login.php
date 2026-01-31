<?php
session_start();

require_once dirname(__DIR__) . "../app/controller/AuthController.php";

$controller = new AuthController();
$controller->login();

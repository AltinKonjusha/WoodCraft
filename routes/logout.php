<?php
session_start();
require_once dirname(__DIR__) . "../app/helpers/Auth.php";
Auth::logout();
header("Location: ../public/index.php");
exit;

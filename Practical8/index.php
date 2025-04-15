<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
require_once __DIR__ . "/config.php";
require_once __DIR__ . "/controllers/TaskController.php";
global $con;
$taskController = new TaskController($con);
$taskController->displayTasks();
?>

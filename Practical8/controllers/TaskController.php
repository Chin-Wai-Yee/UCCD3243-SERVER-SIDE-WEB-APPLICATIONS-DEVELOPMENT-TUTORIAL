<?php
require_once __DIR__ . "/../config.php";
require_once __DIR__ . "/../models/Task.php";
global $con;
class TaskController
{
    private $task;
    public function __construct($con)
    {
        $this->task = new Task($con);
    }
    public function displayTasks()
    {
        global $con;
        $tasks = $this->task->getTasks();
        include __DIR__ . "/../views/task_list.php";
    }
    public function addTask()
    {
        global $con;
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $title = $_POST["title"];
            $description = $_POST["description"];
            $status = $_POST["status"];

            if ($this->task->addTask($title, $description, $status)) {
                header("Location: ../views/task_form.php?success=1");
                exit();
            }
        }
    }
}
if (isset($_POST["submit"])) {
    global $con;
    $taskController = new TaskController($con);
    $taskController->addTask();
}
?>

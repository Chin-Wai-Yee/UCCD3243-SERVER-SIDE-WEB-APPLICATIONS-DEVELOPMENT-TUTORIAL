<?php
require_once __DIR__ . "/../config.php";
class Task
{
    private $con;
    public function __construct($con)
    {
        $this->con = $con;
    }
    public function getTasks()
    {
        if (!$this->con) {
            die("Database connection is missing.");
        }
        $query = "SELECT * FROM tasks ORDER BY created_at DESC";
        $result = mysqli_query($this->con, $query);

        if (!$result) {
            die("Database query failed: " . mysqli_error($this->con));
        }
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    public function addTask($title, $description, $status)
    {
        if (!$this->con) {
            die("Database connection is missing.");
        }
        $title = mysqli_real_escape_string($this->con, $title);
        $description = mysqli_real_escape_string($this->con, $description);
        $status = mysqli_real_escape_string($this->con, $status);

        $query = "INSERT INTO tasks (title, description, status) VALUES ('$title',
   '$description', '$status')";

        if (!mysqli_query($this->con, $query)) {
            die("Insert query failed: " . mysqli_error($this->con));
        }
        return true;
    }
}
?>

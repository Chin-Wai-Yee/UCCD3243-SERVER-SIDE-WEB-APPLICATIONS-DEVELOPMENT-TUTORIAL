<?php
include("auth.php");
require('database.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>File Manager</title>
</head>
<body>
<p><a href="dashboard.php">User Dashboard</a> |
<a href="logout.php">Logout</a></p>
<h1>File Manager</h1>
 <!-- Form for File Upload section -->
<form enctype="multipart/form-data" method="post" action="">
    <input type="text" name="user_input" placeholder="Add comment or note" required />
    <input type="file" name="file" accept=".doc,.docx,.pdf" required /><br><br>
    <input type="submit" name="upload" value="Upload File" />
</form>
<?php
if (isset($_GET["status"])) { ?>
    <p><?php echo $_GET["status"] ?></p>
<?php }
?>
<?php
$filesQuery = "SELECT * FROM files";
$filesResult = mysqli_query($con, $filesQuery);
if ($filesResult) {
    while ($fileRow = mysqli_fetch_assoc($filesResult)) {
        echo "<li>";
        echo "<form method='post' enctype='multipart/form-data'>";
        echo "<input type='hidden' name='file_id' value='" . $fileRow['id'] . "' />";
        echo "<input type='text' name='user_input' value='" . $fileRow['user_input'] . "' />";
        echo "<label for='reupload_file'>Re-upload File:</label>";
        echo "<input type='file' name='new_file' id='reupload_file' />";
        echo "<input type='submit' name='update' value='Update' />";
        echo "</form>";
        echo " <a href='upload/" . $fileRow['filename'] . "' target='_blank'>View</a>";
        echo " | <a href='file_manager.php?delete=" . $fileRow['id'] . "' onclick=\"return confirm('Are you sure you want to delete this file?')\">Delete</a>";
        echo "</li>";
    }
}
?>
</body>
</html>

<?php
if (isset($_POST['upload'])) {
    $uploadedFileName = $_FILES['file']['name'];
    $targetDirectory = "upload/";
    $targetFilePath = $targetDirectory . $uploadedFileName;
    $allowedFileTypes = array('pdf', 'doc', 'docx', 'txt');

    if (!is_dir($targetDirectory)) {
        mkdir($targetDirectory);
    }

    if (file_exists($targetFilePath)) {
        $status = "File with same name already existed";
    }
    else if (!in_array(end(explode('/', strtolower($_FILES['file']['type']))), $allowedFileTypes)) {
        error_log("filetype: ". end(explode(strtolower($_FILES['file']['type']), '/')));
        $status = "Sorry, only PDF, DOC, DOCX, and TXT files are allowed.";
    }
    else if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFilePath)) {
        $userInput = $_POST['user_input'];
        $insertQuery = "INSERT INTO files (filename, user_input) VALUES
            ('$uploadedFileName', '$userInput')";
        mysqli_query($con, $insertQuery) or die(mysqli_error($con));
        $status = "File uploaded successfully.";
    }
    else {
        $status = "File upload failed.";
    }
    header("Location: file_manager.php?status=$status");
}

if (isset($_GET['delete'])) {
    $fileId = $_GET['delete'];
    $selectQuery = "SELECT filename FROM files WHERE id = $fileId";
    $result = mysqli_query($con, $selectQuery);
    $row = mysqli_fetch_assoc($result);
    $filename = $row['filename'];
    $filePath = "upload/" . $filename;
    if (file_exists($filePath) && !is_dir($filePath)) {
        unlink($filePath);
    }
    $deleteQuery = "DELETE FROM files WHERE id = $fileId";
    mysqli_query($con, $deleteQuery);
    $status = "File deleted successfully.";
    header("Location: file_manager.php?status=$status");
}

if (isset($_POST['update'])) {
    $fileId = $_POST['file_id'];
    $userInput = $_POST['user_input'];
    if ($_FILES['new_file']['size'] > 0) {
        $newUploadedFileName = $_FILES['new_file']['name'];
        $targetDirectory = "upload/";
        $targetFilePath = $targetDirectory . $newUploadedFileName;

        if (!in_array(strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION)), $allowedFileTypes)) {
            error_log("filetype: ". end(explode(strtolower($_FILES['file']['type']), '/')));
            $status = "Sorry, only PDF, DOC, DOCX, and TXT files are allowed.";
        }
        else if (move_uploaded_file($_FILES['new_file']['tmp_name'], $targetFilePath)) {
            $selectQuery = "SELECT filename FROM files WHERE id = $fileId";
            $result = mysqli_query($con, $selectQuery);
            $row = mysqli_fetch_assoc($result);
            $oldFilename = $row['filename'];
            $oldFilePath = "upload/" . $oldFilename;
            if (file_exists($oldFilePath) && !is_dir($oldFilePath)) {
                unlink($oldFilePath);
            }
            $updateFileQuery = "UPDATE files SET filename = '$newUploadedFileName',
            user_input = '$userInput' WHERE id = $fileId";
            mysqli_query($con, $updateFileQuery) or die(mysqli_error($con));
            $status = "File re-uploaded successfully.";
        }
        else {
            $status = "File re-upload failed.";
        }
    }
    else {
        $updateQuery = "UPDATE files SET user_input = '$userInput' WHERE id = $fileId";
        mysqli_query($con, $updateQuery) or die(mysqli_error($con));
        $status = "File details updated successfully.";
    }
    header("Location: file_manager.php?status=$status");
}
?>

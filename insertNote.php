<?php 
  include "conn.php";
  include "auth.php";
?>
<?php
    $success = false;
    if(isset($_POST['submit']))
    {
        $title = $_POST['title'];
        $note = $_POST['note'];
        $sql = "INSERT INTO `notes` (`title`, `note`, `date`) VALUES ('$title', '$note', current_timestamp());";
        $result = mysqli_query($conn, $sql);
        if($result)
        {
            $success = true;
            header("Location: todo.php");
        }
        else
        {
            echo "data not inserted";
        }
    }
?>
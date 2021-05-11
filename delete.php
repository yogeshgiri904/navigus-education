<?php 
  include "conn.php";
  include "auth.php";
?>
<?php
    $id = $_GET['id'];
    $delSql = "DELETE FROM `notes` WHERE `notes`.`sn` = $id";
    $result = mysqli_query($conn, $delSql);
    if($result)
    {
        // $findTable = "SELECT * FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'epiz_27865341_user' AND TABLE_NAME = '$ifExists'";
        $findTable = "SELECT * FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'user' AND TABLE_NAME = '$id'";
        $findResult = mysqli_query($conn, $findTable);
        if(mysqli_num_rows($findResult)>0)
        {
            $delSql = "DROP TABLE `$id`";
            $result = mysqli_query($conn, $delSql);
            if($result)
            {
                header("Location: todo.php");
            }
            else
            {
                echo "Error in deleting this note.";
            }
        }
        else{
            header("Location: todo.php");
        }
    }
    else
    {
        echo "Error in deleting this note.";
    }

?>
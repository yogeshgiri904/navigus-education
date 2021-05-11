<style>
  *{
    padding: 0;
    margin: 0;
  }
  body{
    width: 100vw;
    height: 100vh;
    display: inline-flex;
    justify-content: center;
    align-items: center;
    text-align: center;
  }
  p{
    font-size: 18px;
    text-align: center;
  }
  a{
    padding: 5px 8px;
    border: 2px solid seagreen;
    display: inline-block;
    color: seagreen;
    text-align: center;
    border-radius: 3px;
    margin-top: 15px;
    text-transform: uppercase;
    text-decoration: none;

  }
</style>
<?php 
  include "conn.php";
  include "auth.php";

  $id = $_GET['id'];
  // $findTable = "SELECT * FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'epiz_27865341_user' AND TABLE_NAME = '$ifExists'";
  $findTable = "SELECT * FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'user' AND TABLE_NAME = '$id'";
  $findResult = mysqli_query($conn, $findTable);
  if(mysqli_num_rows($findResult)>0)
  {
    $_SESSION['quizID'] = $id;
    echo "<p>Already a quiz available for this course. Click here to view or edit. </br> <a href='addQuiz.php'>View Quiz</a></p>";
  } 
  else{
    $sql = "CREATE TABLE `user`.`$id` ( `sn` INT(128) NOT NULL AUTO_INCREMENT , `question` VARCHAR(128) NOT NULL , `correct` VARCHAR(128) NOT NULL , `op1` VARCHAR(128) NOT NULL , `op2` INT(128) NOT NULL , `op3` VARCHAR(128) NOT NULL , `op4` VARCHAR(128) NOT NULL , `marks` VARCHAR(128) NOT NULL , `date` DATETIME NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`sn`)) ENGINE = InnoDB;";
    $result = mysqli_query($conn, $sql);
    if($result){
        $_SESSION['quizID'] = $id;
        header("Location: addQuiz.php");
    }
    else{
        echo "<p>Database Error! Quiz not created.</p>";
    }
  }
?>


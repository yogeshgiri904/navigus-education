<?php 
  include "conn.php";
  include "auth.php";
?>
<?php
    $success = false;
    $quizID = $_SESSION['quizID'];
    if(isset($_POST['submit']))
    {
        $question = $_POST['question'];
        $correct = $_POST['correct'];
        $op1 = $_POST['op1'];
        $op2 = $_POST['op2'];
        $op3 = $_POST['op3'];
        $op4 = $_POST['op4'];
        $marks = $_POST['marks'];
        $sql = "INSERT INTO `$quizID` (`question`, `correct`, `op1`, `op2`, `op3`, `op4`, `marks`, `date`) VALUES ('$question', '$correct', '$op1', '$op2', '$op3', '$op4', '$marks', current_timestamp());";
        $result = mysqli_query($conn, $sql);
        if($result)
        {
            $success = true;
            header("Location: addQuiz.php");
        }
        else
        {
            echo "Quiz not inserted";
        }

    }
?>
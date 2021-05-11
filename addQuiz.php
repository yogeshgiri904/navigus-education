<?php 
  include "conn.php";
  include "auth.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.css"
    rel="stylesheet"
    />
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
    rel="stylesheet"
    />
    <!-- Google Fonts -->
    <link
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
    rel="stylesheet"
    />
    <title>Quiz</title>
    <style>
        label.radio {
            cursor: pointer
        }

        label.radio input {
            position: absolute;
            top: 0;
            left: 0;
            visibility: hidden;
            pointer-events: none
        }

        label.radio span {
            padding: 4px 0px;
            border: 2px solid red;
            display: inline-block;
            color: red;
            width: 100px;
            text-align: center;
            border-radius: 3px;
            margin-top: 7px;
            text-transform: uppercase
        }

        label.radio input:checked+span {
            border-color: red;
            background-color: red;
            color: #fff
        }

        .ans {
            margin-left: 36px !important
        }

        .btn:focus {
            outline: 0 !important;
            box-shadow: none !important
        }

        .btn:active {
            outline: 0 !important;
            box-shadow: none !important
        }

        .question-title span{
            position: absolute;
            right: 5%;
            float: right;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top p-4">
    <div class="container-fluid">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <a href="home.php"><i class="fas fa-arrow-circle-left"></i></a> &nbsp;&nbsp;&nbsp;
          <li class="breadcrumb-item"><a href="home.php">Home</a></li>
          <li class="breadcrumb-item"><a href="todo.php">Available Courses</a></li>
          <li class="breadcrumb-item active" aria-current="page"><b>Add Quiz</b></li>
        </ol>
      </nav>
    </div>
  </nav>

    <div class="container pt-5 mt-5">
    <h4>Add Quiz Questions Here</h4><br>
    <form autocomplete="off" method="POST" action="insertQuiz.php">
        <div class="form-group">
            <label for="inputAddress">Question</label>
            <input type="text" class="form-control" id="inputAddress" name="question" placeholder="What is the capital of India?">
        </div>
        <div class="form-group">
            <label for="inputAddress2">Correct Answer</label>
            <input type="text" class="form-control" required id="inputAddress2" name="correct" placeholder="New Delhi">
        </div>
        <div class="form-group">
            <label for="inputAddress2">Marks</label>
            <input type="text" class="form-control" required id="inputAddress2" name="marks" placeholder="10">
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
            <label for="inputEmail4">Option 1</label>
            <input type="text" class="form-control" required id="inputEmail4" name="op1" placeholder="Kolkata">
            </div>
            <div class="form-group col-md-6">
            <label for="inputPassword4">Option 2</label>
            <input type="text" class="form-control" required id="inputPassword4" name="op2" placeholder="New Delhi">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
            <label for="inputEmail4">Option 3</label>
            <input type="text" class="form-control" required id="inputEmail4" name="op3" placeholder="Agra">
            </div>
            <div class="form-group col-md-6">
            <label for="inputPassword4">Option 4</label>
            <input type="text" class="form-control" required id="inputPassword4" name="op4" placeholder="Mumbai">
            </div>
        </div>
        <input type="submit" name="submit" class="btn btn-primary">
    </form>
    </div>

    <div class="container mt-5 mb-5">
        <div class="d-flex justify-content-center row">
            <div class="col-md-12 col-lg-12">
                <div class="border">
                    <?php
                        $quizID = $_SESSION['quizID'];
                        $i = 0;
                        $sql = "SELECT * FROM `$quizID`";
                        $result = mysqli_query($conn, $sql);
                        $total = mysqli_num_rows($result);
                        if($result)
                        {
                            echo "  <div class='question bg-white p-3 border-bottom'>
                                        <div class='d-flex flex-row justify-content-between align-items-center mcq'>
                                            <h4>MCQ Quiz</h4><span>(No. of Questions : $total)</span>
                                        </div>
                                    </div>";
                                    
                            while($data = mysqli_fetch_assoc($result))
                            {
                                $i++;
                                $sn = $data['sn'];
                                $question = $data['question'];
                                $correct = $data['correct'];
                                $marks = $data['marks'];
                                $op1 = $data['op1'];
                                $op2 = $data['op2'];
                                $op3 = $data['op3'];
                                $op4 = $data['op4'];
                                echo "
                                        <div class='question bg-white p-3 border-bottom'>
                                            <div class='d-flex flex-row align-items-center question-title'>
                                                <h3 class='text-danger'>Q$i.</h3>&nbsp;
                                                <h5 class='mt-1 ml-2'>$question</h5><span>(Marks : $marks)</span>
                                            </div>
                                            <div class='ans ml-2'>
                                                <label class='radio'> <input type='radio' name='$i' value='$op1'> <span>$op1</span>
                                                </label>
                                            </div>
                                            <div class='ans ml-2'>
                                                <label class='radio'> <input type='radio' name='$i' value='$op2'> <span>$op2</span>
                                                </label>
                                            </div>
                                            <div class='ans ml-2'>
                                                <label class='radio'> <input type='radio' name='$i' value='$op3'> <span>$op3</span>
                                                </label>
                                            </div>
                                            <div class='ans ml-2'>
                                                <label class='radio'> <input type='radio' name='$i' value='$op4'> <span>$op4</span>
                                                </label>
                                            </div>
                                        </div>";

                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
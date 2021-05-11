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
    <!-- Font Awesome -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
    rel="stylesheet"
    />
    <!-- Google Fonts -->
    <link
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
    rel="stylesheet"
    />
    <!-- MDB -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.css"
    rel="stylesheet"
    />
    <title>Sasti Notebook</title>
    <style>
    .course-list{
        width: 100%;
        display: inline-flex;
        justify-content: start;
        align-items: center;
        flex-wrap: wrap;
        margin: 30px 0px;
    }
    .card{
        width: 18rem;
        margin-right: 20px;
        margin-bottom: 20px;
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
          <li class="breadcrumb-item active" aria-current="page"><b>Available Course</b></li>
        </ol>
      </nav>
    </div>
  </nav>

    <div class="container mt-5">
        <h4>Available Courses</h4>
        <div class="container course-list">
            <?php
                $i = 0;
                $sql = "SELECT * FROM `notes`";
                $result = mysqli_query($conn, $sql);
                $resCount = mysqli_num_rows($result);
                if($resCount>0)
                {
                    while($data = mysqli_fetch_assoc($result))
                    {
                        $i++;
                        $sn = $data['sn'];
                        $showtitle = $data['title'];
                        $shownote = $data['note'];  
                        echo "    <div class='card'>
                                    <img
                                        src='https://mdbootstrap.com/img/new/standard/city/062.jpg'
                                        class='card-img-top'
                                        alt='$i'
                                    />
                                    <div class='card-body'>
                                        <h5 class='card-title'>$showtitle</h5>
                                        <p class='card-text'>$shownote</p>
                                    </div>
                                    <div class='card-body'>
                                        <a class='btn btn-success' href='edit.php?id=$sn'>Edit</a>
                                        <a class='btn btn-outline-danger' href='delete.php?id=$sn'>Delete</a> 
                                        <a class='btn btn-outline-danger' href='createQuiz.php?id=$sn'>Quiz</a>      
                                    </div>
                                </div>";
                    }
                }
                else{
                    echo "<h5>No Available Course.</h5>";
                }
            ?>
        </div>
    </div>

    <div class="container mt-5 mb-5">
        <h4>Add Course Here</h4>
        <form method="POST" autocomplete="off" action="insertNote.php">
        <div class="mb-3">
            <label for="title" class="form-label">Course Name</label>
            <input type="text" required class="form-control" id="title" name="title">
        </div>
        <div class="mb-3">
            <label for="note" class="form-label">Course Details</label>
            <textarea class="form-control" required id="note" rows="3" name="note"></textarea>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Upload</button>
        </form>
    </div>

</body>
</html>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
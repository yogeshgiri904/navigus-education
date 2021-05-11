<?php 
  include "conn.php";
  include "auth.php";
?>
<?php
  $selectSql="SELECT * FROM `dp` WHERE `username` = '$username';";
  $result = mysqli_query($conn, $selectSql);
  $data =mysqli_fetch_array($result);
  if($data) {
    $folder = $data['folder'];
  }
  else
  {
    $folder = "asset/user.png";
  }

  $sql="SELECT * FROM `profile` WHERE `username` = '$username';";
  $userResult = mysqli_query($conn, $sql);
  $userData = mysqli_fetch_array($userResult);
  if($userData)
  {
    $name = $userData['fn']." ".$userData['ln'];
  }
  else
  {
    $name = NULL;
  }
  $_SESSION['folder']=$folder;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <title>Home | Navigus</title>
  <link rel="icon" href="img/n.jpg" type="image/x-icon">
  <style>
    * {
        font-family: 'Poppins', sans-serif;
      }
    h1,h2,h3,h4,h5,h6{
        font-weight: bold;
      }
    html {
      scroll-behavior: smooth;
    }
    .carousel-item {
      height: 100vh;
      min-height: 350px;
      background: no-repeat center center scroll;
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;
      }
  </style>
</head>
<body>

<!-- fixed navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
<div class="container-fluid">
    <a class="navbar-brand" href="#">
    <img src="img/n.jpg" class="rounded-circle" width="40" height="40" class="d-inline-block align-top" alt="Logo">
      <b>Navigus Education</b> 
    </a>

    <ul class="navbar-nav ml-auto">
      <!-- Avatar -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
          <img src="<?php echo $folder; ?>" class="rounded-circle" height="32" alt="user" loading="lazy"/>
          <div class="text-dark d-none d-lg-block d-print-block">&nbsp;
          <?php 
            if($name == NULL)
            {
              echo $username;
            }
            else{
              echo $name;
            }
          ?>&nbsp;</div>
        </a>
        <ul class="dropdown-menu mt-2 dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="profile.php"><i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;My Profile</a>
          <a class="dropdown-item" href="todo.php"><i class="fa fa-coffee" aria-hidden="true"></i>&nbsp;&nbsp;Courses</a>
          <?php
            $sql = "SELECT * FROM `profile` WHERE `username` LIKE '$username' ";
            $result = mysqli_query($conn, $sql);
            $data = mysqli_fetch_array($result);
            $check = mysqli_num_rows($result);
            if($check >= 1)
            {
              $sn = $data['sn'];
              echo "<a class='dropdown-item' href='editprofile.php?id=$sn'><i class='fas fa-pencil-alt' aria-hidden='true'></i>&nbsp;&nbsp;Edit Profile</a>";
            }
            else{
              echo "<a class='dropdown-item' href='editprofile.php'><i class='fas fa-pencil-alt' aria-hidden='true'></i>&nbsp;&nbsp;Edit Profile</a>";
            }
          ?>
          <a class="dropdown-item" href="changepass.php"><i class="fa fa-unlock-alt" aria-hidden="true"></i>&nbsp;&nbsp;Change Password</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="sessionOut.php">Sign Out&nbsp;&nbsp;<i class="fa fa-sign-out-alt" aria-hidden="true"></i></a>
        </ul>
      </li>
    </ul>
  </div>
</nav>

  <header>
    <!--Carousel Wrapper-->
  <div id="carousel-example-2" class="carousel slide carousel-fade" data-ride="carousel">
    <!--Indicators-->
    <ol class="carousel-indicators">
      <li data-target="#carousel-example-2" data-slide-to="0" class="active"></li>
      <li data-target="#carousel-example-2" data-slide-to="1"></li>
      <li data-target="#carousel-example-2" data-slide-to="2"></li>
    </ol>
    <!--/.Indicators-->
    <!--Slides-->
    <div class="carousel-inner" role="listbox">
      <div class="carousel-item active">
        <div class="view">
          <img class="d-block bg-image" src="https://source.unsplash.com/szFUQoyvrxM/1920x1080" alt="First slide">
          <div class="mask rgba-black-light"></div>
        </div>
        <div class="carousel-caption">
            <div class="container">
            <h2 class="h2-responsive">Navigus Education</h2>
            <p>This beautiful website is created by Yogesh Giri.</p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <!--Mask color-->
        <div class="view">
          <img class="d-block bg-image" src="https://source.unsplash.com/bF2vsubyHcQ/1920x1080" alt="Second slide">
          <div class="mask rgba-black-strong"></div>
        </div>
        <div class="carousel-caption">
          <h2 class="h2-responsive">User Profile Creation</h2>
          <p>Create your beautiful profile.</p>
        </div>
      </div>
      <div class="carousel-item">
        <!--Mask color-->
        <div class="view">
          <img class="d-block bg-image" src="https://source.unsplash.com/LAaSoL0LrYs/1920x1080" alt="Third slide">
          <div class="mask rgba-black-slight"></div>
        </div>
        <div class="carousel-caption">
          <h2 class="h2-responsive">Create Courses as a Mentor</h2>
          <p>One can easily add any number of courses with a quiz attached.</p>
        </div>
      </div>
    </div>
    <!--/.Slides-->
    <!--Controls-->
    <a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
    <!--/.Controls-->
  </div>
  <!--/.Carousel Wrapper-->
  </header>
   
            
  <!-- Page Content -->
  <div class="container pt-5">
  <div class="card w-100">
    <div class=" p-4 shadow">
    <h5 class="card-title">Introducing,</h5>
      <h2 class="card-title text-primary">Navigus Education</h2>
      <p class="card-text">
        You will get very good and valuable courses here with a final exam quizz. If you are a mentor you can add new courses to our library.
      </p> 
      <a href='todo.php?' class='btn btn-primary'>Create New Course</a>
    </div>
  </div>
</div>

  <div class="container">
  <div class="row">
  <div class="col-sm-6 pt-4">
    <div class="card">
      <div class=" p-4 shadow">
        <h5 class="card-title">Visit profile</h5>
        <p class="card-text">
          Visit your beautiful profile. Upload profile picture, edit your details, change password and many more.
        </p>
        <a href="profile.php" class="btn btn-danger">My Profile</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6 pt-4">
    <div class="card">
      <div class=" p-4 shadow">
        <h5 class="card-title">Available Courses</h5>
        <p class="card-text">
          We have very good, educational and valuable courses here with a final exam quizz with a extreme marking system.
        </p>
        <a href="todo.php" class="btn btn-success">View Courses</a>
      </div>
    </div>
  </div>
  
</div>
</div>
</div>

<div class="container p-3 pt-4 pb-5">
  <div class="card p-4 shadow">
  <h3 class="text-center">About Me</h3>

    <div class="row mt-5 mb-4">
      <div class="col-md-6 col-lg-5 ml-auto mr-auto d-flex align-items-center mt-4 mt-md-0">
        <div>
        <div class="pl-3 pr-2">
          <h5 class="card-title">Yogesh Giri</h5>
          <p class="text-muted">Developer - Navigus Education</p>
          <p class="card-text">Hey, This beautiful chatting website is created by me. I am an enthusiastic full stack web developer from India. Always passionate about my work because, I love what I do.</p>
          <a href="https://github.com/yogeshgiri904" class="btn btn-success mt-2 mr-2">Visit Me</a>
          <a href="https://yogeshgiri904.github.io/advance_sro/" class="btn mt-2 mr-2 btn-danger">Organization</a>
        </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-5 ml-auto mr-auto d-flex align-items-center mt-4 mt-md-0">
      <img alt="developer" style="clip-path: circle(45%);" class="col-md-7 col-lg-6 ml-auto mr-auto d-flex align-items-center" src="img/MyPic4.jpg"  />

      </div>
    </div>
  </div>
</div>


<!-- Footer -->
<footer class="bg-dark text-center text-white">
  <!-- Grid container -->
  <div class="container p-4">

    <!-- Section: Text -->
    <section class="mb-4">
      <h4>
      Navigus Education
      </h4>
      <p>You will get very good and valuable courses here with a final exam quizz.</p>
    </section>


    <!-- Section: Social media -->
    <section class="">
      <!-- Facebook -->
      <a class="btn btn-outline-light btn-floating m-1 p-2" href="profile.php" role="button"
        ><i class="fa fa-user"></i
      ></a>

      <!-- Twitter -->
      <a class="btn btn-outline-light btn-floating m-1 p-2" href="todo.php" role="button"
        ><i class="fa fa-coffee"></i
      ></a>

      <!-- Linkedin -->
      <a class="btn btn-outline-light btn-floating m-1 p-2" href="changepass.php" role="button"
        ><i class="fa fa-unlock-alt"></i
      ></a>

      <!-- Github -->
      <a class="btn btn-outline-light btn-floating m-1 p-2" href="sessionOut.php" role="button"
        ><i class="fa fa-sign-out-alt"></i
      ></a>
    </section>
    <!-- Section: Social media -->
</div>

  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    Developed by
    <a class="text-white" href="https://github.com/yogeshgiri904">Yogesh Giri</a>
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->

</body>
</html>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.3.0/mdb.min.js"></script>
<?php session_start()?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
   <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <!-- Font Awesome CDN LINK -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Main Stylesheet  -->
    <link rel="stylesheet" href="style.css">


    <title>Lms Website</title>
  </head>
  <body>

  <!-- Navbar starts here -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="http://localhost/LMS"><strong> MyLMS </strong> </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 m-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="http://localhost/LMS">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/LMS/#courses-section">Courses</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="http://localhost/LMS/#testimonial-section">FeedBack</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="//localhost/LMS/#contactForm-section">Contact</a>
        </li>


      </ul>

      <?php
      if(isset($_SESSION["loggedInName"])):?>
          <a class="btn btn-outline-dark me-2 ms-2" href="//localhost/LMS/student/myprofile.php">My Profile</a>
          <a class="btn btn-outline-dark me-2 ms-2" href="//localhost/LMS/student/logout.php">Logout</a>
      <?php else: ?>
          <a class="btn btn-outline-dark me-2 ms-2" href="//localhost/LMS/#loginForm">Login</a>
          <a class="btn btn-outline-dark me-2 ms-2" href="//localhost/LMS/signup.php">SignUp</a>
      <?php endif; ?>

    </div>
  </div>
</nav>
<!-- Navbar ends here -->

<?php
  session_start();
  if (!isset($_SESSION["loggedInName"])):
    header("Location: //localhost/LMS/#loginForm");
endif;
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="../vendors/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Main Stylesheet for admin dashboard -->
    <link href="css/main.css" rel="stylesheet">

     <!-- Font AwesomeLINK -->
     <link rel="stylesheet" href="../vendors/fontawesome/css/all.min.css">
    
   

  </head>
  <body>
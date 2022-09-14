<?php
    session_start();
    if (!isset($_SESSION["loggedInName"])):
        header("Location: //localhost/LMS/#loginForm");
    endif;
?>

    <header class="bg-dark navbar-dark">
            <h4 class="m-2"> <a href="http://localhost/LMS" class="text-light"> Home Page </a> </h4>
            <h5 class="text-light me-2" style="float:right; margin-top: -33px"> <a href="myprofile.php" class="text-light"> <?php echo $_SESSION["loggedInName"]; ?> </a></h5>
    </header>
    

    <div class="container-fluid" id="dash_container">
        <div class="row h-75">

        <!-- Column One -->
        <div class="col-2" id="dashboard-list">
        <ul class="dash_ul text-primary">
            
            <li class="dash_item mb-4"><a href="myprofile.php"> <img src="<?php echo $_SESSION["stu_img"]; ?>"> </li> 

            <li class="dash_item"><a href="myprofile.php"> <i class="fa-solid me-2 fa-gauge-high"></i> Profile </a></li>
            <li class="dash_item"><a href="mycourses.php"><i class="fa-solid me-2 fa-list"></i> My Courses </a></li>
            <li class="dash_item"><a href="feedback.php"><i class="fa-regular me-2 fa-message"></i> Feedback </a></li>
            <li class="dash_item"><a href="change-pass.php"><i class="fa-solid me-2 fa-key"></i> Change Password </a></li>
            <li class="dash_item"><a href="logout.php"><i class="fa-solid me-2 fa-arrow-right-from-bracket"></i> Log Out </a></li>

        </ul>
        </div>

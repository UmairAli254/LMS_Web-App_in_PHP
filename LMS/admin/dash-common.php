<?php 
    if(!isset($_SESSION["admin_logged_in"]))
        header("Location: http://localhost/LMS/admin/adminLogin.php");   
?>

    <header class="d-print-none">
            <h4 class="mt-2"> <span style="background: white; color: rgba(55, 124, 189, 0.959); border-radius: 3px; margin: 5px; padding-left: 4px"> <a href="http://localhost/LMS/admin/dashboard.php"> Dashboard </a>  </span> <small> for Admin </small> </h4>
    </header>

    <div class="container-fluid" id="dash_container">
        <div class="row h-100">

        <!-- Column One -->
        <div class="col-2 d-print-none" id="dashboard-list">
        <ul class="dash_ul text-primary position-fixed">
            <li class="dash_item"><a href="dashboard.php"> <i class="fa-solid me-2 fa-gauge-high"></i> Dashboard </a></li>
            <li class="dash_item"><a href="courses.php"><i class="fa-solid me-2 fa-list"></i> Courses </a></li>
            <li class="dash_item"><a href="lessons.php"><i class="fa-solid me-2 fa-list"></i> Lessons </a></li>
            <li class="dash_item"><a href="students.php"><i class="fa-solid me-2 fa-people-group"></i> Students </a></li>
            <li class="dash_item"><a href="sell-reports.php"><i class="fa-solid me-2 fa-chart-pie"></i> Sell Reports </a></li>
            <li class="dash_item"><a href="feedback.php"><i class="fa-regular me-2 fa-message"></i> Feedback </a></li>
            <li class="dash_item"><a href="adminChangePass.php"><i class="fa-solid me-2 fa-key"></i> Change Password </a></li>
            <li class="dash_item"><a href="adminLogout.php"><i class="fa-solid me-2 fa-arrow-right-from-bracket"></i> Log Out </a></li>

        </ul>
        </div>

<?php
    session_start();

    $json = file_get_contents("php://input");
    $data = json_decode($json);


    $con = mysqli_connect("localhost", "root", "", "Lms_DB");
    
    $query = "select * from admin_sign where email = '{$data->email}' and pass = '{$data->pass}'";
    $qr = mysqli_query($con, $query);

    if(mysqli_num_rows($qr)):
        $_SESSION["admin_email"] = $data->email;
        $_SESSION["admin_logged_in"] = true;
        echo true;
    else:
        echo false;
    endif;

    mysqli_close($con);
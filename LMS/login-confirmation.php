<?php
    session_start();

    $json = file_get_contents("php://input");
    $data = json_decode($json);

    $con = mysqli_connect("localhost", "root", "", "Lms_DB");
    $query = "select * from sign_form where email = '{$data->email}' and pass = '{$data->pass}' and c_pass = '{$data->pass}'";

    $qr = mysqli_query($con, $query);

    
    if(mysqli_num_rows($qr)):
        $rows = mysqli_fetch_assoc($qr);
        $_SESSION["loggedInName"] = $rows["username"];
        $_SESSION["stu_id"] = $rows["id"];
        $_SESSION["stu_img"] = $rows["img"];
        $_SESSION["stu_email"] = $rows["email"];
        echo true;
    else:
        echo false;
    endif;

    mysqli_close($con);
<?php

    $json = file_get_contents("php://input");
    $data = json_decode($json);
    

    $con = mysqli_connect("localhost", "root", "", "Lms_DB");
    $query = "insert into sign_form (username, email, pass, c_pass) values (
        '{$data->username}',
        '{$data->email}',
        '{$data->pass}',
        '{$data->conf_pass}'
    )";

    $qr = mysqli_query($con, $query);
    if($qr)
        echo true;
    else
        echo false;

    mysqli_close($con);
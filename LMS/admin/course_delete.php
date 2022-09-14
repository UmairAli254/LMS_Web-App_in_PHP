<?php

    $json = file_get_contents("php://input");
    $data = json_decode($json);


    $con = mysqli_connect("localhost", "root", "", "Lms_DB");
    $query = "delete from courses where id = {$data->id}";
    
    $qr = mysqli_query($con, $query);

    // echo $qr?true:false;

    $query = "delete from lessons where c_id = {$data->id}";
    $qr = mysqli_query($con, $query);

    $query = "delete from sales where course_id = {$data->id}";
    
    $qr = mysqli_query($con, $query);
    

    mysqli_close($con);
    
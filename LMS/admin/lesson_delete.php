<?php

    $json = file_get_contents("php://input");
    $data = json_decode($json);

    $con = mysqli_connect("localhost", "root", "", "Lms_DB");
    $query = "delete from lessons where id = {$data->id}";
    $qr = mysqli_query($con, $query);

    echo $qr?true:false;




    mysqli_close($con);
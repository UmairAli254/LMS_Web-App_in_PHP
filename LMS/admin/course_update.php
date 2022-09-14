<?php

    $json = file_get_contents("php://input");
    $data = json_decode($json);
  

    $con = mysqli_connect("localhost", "root", "", "Lms_DB");
    $query = "update courses set 
        name = '{$data->naming}',
        author = '{$data->author}',
        duration = '{$data->duration}',
        o_price = {$data->o_price},
        s_price = {$data->s_price},
        description = '{$data->des}'
        where id = {$data->id}
        ";

    $qr = mysqli_query($con, $query);
    if($qr)
        echo true;
    else
        echo false;

    mysqli_close($con);
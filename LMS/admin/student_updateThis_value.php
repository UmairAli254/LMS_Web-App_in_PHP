<?php

    $json = file_get_contents("php://input");
    $data = json_decode($json);


    $con = mysqli_connect("localhost", "root", "", "Lms_DB");
    $query = "select * from sign_form where id = {$data->id}";
    $qr = mysqli_query($con, $query);

    while($row = mysqli_fetch_assoc($qr)){
        $arr[] = $row;
    }
    echo json_encode($arr);
   

   mysqli_close($con);
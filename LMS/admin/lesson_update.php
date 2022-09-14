<?php 

    $json = file_get_contents("php://input");
    $data = json_decode($json);

    $con = mysqli_connect("localhost", "root", "", "Lms_DB");
    $query = "select * from lessons where id = {$data->id}";
    $qr = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($qr);

    echo json_encode($row);

    mysqli_close($con);
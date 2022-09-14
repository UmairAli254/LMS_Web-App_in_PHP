<?php

    $id = $_GET["id"];

    $con = mysqli_connect("localhost", "root", "", "Lms_DB");
    $query = "select * from lessons where id = {$id}";
    $qr = mysqli_query($con, $query);

    // while($row = mysqli_fetch_assoc($qr)):
        $arr[] = mysqli_fetch_assoc($qr);
    // endwhile;

    echo json_encode($arr);

    mysqli_close($con);
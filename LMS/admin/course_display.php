<?php
     
    $con = mysqli_connect("localhost", "root", "", "Lms_DB");

    $query = "select * from courses";
    $qr = mysqli_query($con, $query);

    while($row = mysqli_fetch_assoc($qr)){
        $arr[] = $row;
    }
    echo json_encode($arr);


    mysqli_close($con);
<?php

    $json = file_get_contents("php://input");
    $data = json_decode($json);
    // $img = $_FILES["{$data->img}"];

    // $img_name = $img["name"];
    // $img_type = $img["type"];
    // $img_size = $img["size"];
    // $img_temp_name = $img["temp_name"];

    // $img_folder = "../uploaded_images" . $img_name;
    // move_uploaded_file($img_temp_name, $img_folder);



    // $name = $_POST["name"];
    // $author = $_POST["author"];
    // $duration = $_POST["duration"];
    // $o_price = $_POST["o_price"];
    // $s_price = $_POST["s_price"];
    // $description = $_POST["description"];
    // // $course_image = $_POST["course_image"];
    

    $con = mysqli_connect("localhost", "root", "", "Lms_DB");
    $query = "insert into courses (name, author, duration, o_price, s_price, description, course_image) values (
        '{$data->naming}',
        '{$data->author}',
        '{$data->duration}',
         {$data->o_price},
         {$data->s_price},
        '{$data->des}',
        '{$img_folder}'
    )";

    $qr = mysqli_query($con, $query);
    if($qr)
        echo true;
    else
        echo false;

    mysqli_close($con);
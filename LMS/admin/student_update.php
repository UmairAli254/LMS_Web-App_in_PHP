<?php

$json = file_get_contents("php://input");
$data = json_decode($json);

$con = mysqli_connect("localhost", "root", "", "Lms_DB");
$query = "update sign_form set
          username = '{$data->username}',
          email = '{$data->email}',
          pass = '{$data->pass}',
          c_pass = '{$data->conf_pass}'
          where id = {$data->id}
          ";

$qr = mysqli_query($con, $query);
if ($qr) {
    echo true;
} else {
    echo "false";
}

mysqli_close($con);

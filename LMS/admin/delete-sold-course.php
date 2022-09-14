<?php

$id = $_GET["id"];

$con = mysqli_connect("localhost", "root", "", "Lms_DB");
$query = "delete from sales where id = {$id}";
$qr = mysqli_query($con, $query);

$query = "delete from sales where course_id = {$data->id}";
$qr = mysqli_query($con, $query);

echo $qr ? true : "falsing";

mysqli_close($con);

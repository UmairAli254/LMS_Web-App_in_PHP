<?php

include "header.php";


?>

<!-- Display data in the fields -->
<?php
$con = mysqli_connect("localhost", "root", "", "Lms_DB");
$query = "select * from sign_form where id = {$_SESSION["stu_id"]}";

$qr = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($qr);
$_SESSION["stu_img"] = $row["img"];
$_SESSION["loggedInName"] = $row["username"];

?>

<!-- Update Student Profile data to the database -->
<?php
 
if (isset($_POST["btn"])):
   

    $img_name = $_FILES["img"]["name"];
    $img_tmp_name = $_FILES["img"]["tmp_name"];
    $img_folder = "profile-pics/" . $img_name;
    move_uploaded_file($img_tmp_name, $img_folder);


    if($_FILES["img"]["error"] === 0){
      $query = "update sign_form set username = '{$_POST["name"]}', occupation = '{$_POST["occupation"]}', img='{$img_folder}' where id = {$_SESSION["stu_id"]}";
    }
    else{
      $query = "update sign_form set username = '{$_POST["name"]}', occupation = '{$_POST["occupation"]}' where id = {$_SESSION["stu_id"]}";
    }
  
    $qr = mysqli_query($con, $query);

    mysqli_close($con);
    header("Location: http://localhost/LMS/student/myprofile.php");
endif;
?>




<?php include "stu-dash-common.php";?>
<!-- Main Column Two  -->
<div class="col">


<div class="container ms-5">
    <div class="row">
        <div class="col-4">
<form method="POST" enctype="multipart/form-data">

  <div> <!-- Student ID -->
    <label>Student ID</label>
    <input type="number" value="<?php echo $row["id"]; ?>" class="form-control" name="id" disabled>
  </div>


  <div> <!-- Student Email -->
    <label>Student Email</label>
    <input type="text" value="<?php echo $row["email"]; ?>" class="form-control" name="email" disabled>
  </div>


  <div> <!-- Student Name -->
    <label>Name</label>
    <input type="text" value="<?php echo $row["username"]; ?>" class="form-control" name="name">
  </div>


  <div> <!-- Student Occupation -->
    <label>Occupation</label>
    <input type="text" value="<?php echo $row["occupation"]; ?>" class="form-control" name="occupation">
  </div>


  <div> <!-- Student Image Upload -->
    <label>Upload image</label>
    <input type="file" class="form-control" name="img">
  </div>


<!-- Update Button -->
  <input type="submit" value="Update" name="btn" class="btn btn-primary mt-3">
</form>


</div> <!-- Col end -->
</div> <!-- Row end -->
</div> <!-- Container end -->










</div> <!-- Main Second Column Ends Here -->
    </div> <!-- Row Ends Here -->
</div> <!-- Container Ends here -->











<?php include "footer.php";?>

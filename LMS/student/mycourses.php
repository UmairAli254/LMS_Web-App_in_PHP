<?php 

    include "header.php";
    include "stu-dash-common.php";
?>
<?php
    $con = mysqli_connect("localhost", "root", "", "Lms_DB");
    $query = "select * from sales where stu_email = '{$_SESSION["stu_email"]}'";
    $qr = mysqli_query($con, $query);
    // $row = mysqli_fetch_assoc($qr);

?>


  <!-- Main Column Two -->
  <div class="col mb-5">

  <div class="container">
  <div class="row">
<?php if(mysqli_num_rows($qr)): 
      While($row = mysqli_fetch_assoc($qr)):    
    
      $query2 = "select * from courses where id = {$row["course_id"]}";
      $qr2 = mysqli_query($con, $query2);
      $row2 = mysqli_fetch_assoc($qr2);
    
    ?>
<div class="col mt-5"> <!-- 1st Col Start of the row -->
<div class="card w-100 border-1 border-secondary bg-warning rounded shadow">
  <!-- <img src="img/html course.png" class="card-img-top" alt="..."> -->
  <div class="card-body">
    <h5 class="card-title text-left">
      <strong><?php echo $row["course_name"]; ?></strong>
    </h5>
    <p class="card-text"><?php echo $row2["description"]; ?></p>
    
  </div>
  <div class="card-body ms-auto">
    <samll>
      <p><span class="fw-bold"> Duration: </span><?php echo $row2["duration"]; ?> </p>
    </small>

  <form action="watch-lectures.php" method="GET">
      <input type="hidden" name="course_name" value="<?php echo $row["course_name"]; ?>" />
      <input type="hidden" name="course_id" value="<?php echo $row["course_id"]; ?>" />
      <input type="submit" class="card-link btn btn-outline-dark mt-3" name="watch" value="Watch Lectures" />
  </form>
  </div>
</div>

<?php 
    endwhile;
    else:
?>

    <h5 class="bg-warning text-center mt-5 rounded p-2 text-dark">You haven't purchased any courses yet, go to courses page and buy some <a href="http://localhost/LMS/#courses-section" class="bg-dark text-warning rounded p-1 text-center"> Courses </a></h5> 

<?php
    endif; 
    mysqli_close($con);
?>


</div> <!-- inner 1st Col end -->
</div> <!-- inner Row end -->
</div> <!-- inner container end -->





</div> <!-- Main Second Column Ends Here -->
</div> <!-- Row Ends Here -->
</div> <!-- Container Ends here -->


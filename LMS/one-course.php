<?php include "header.php"?>

<?php
    $c_id = $_GET["courseId"];
    $_SESSION["selected_course_id_for_buy"] = $c_id;   

    // Show single course
    $con = mysqli_connect("localhost", "root", "", "Lms_DB");
    $query = "select * from courses where id = {$c_id}";
    $qr = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($qr);
    $_SESSION["selected_course_name_for_buy"] = $row["name"];   


    // Show lessons of that course
    $query = "select * from lessons where c_id = {$c_id}";
    $qr = mysqli_query($con, $query);
   
    mysqli_close($con);
?>


<!-- Cards / Course Starts Here -->
<div class="container mt-5 pt-5" id="courses-section">
    <div class="row">

      <div class="col mt-5"> <!-- 1st Col Start of the row -->
      <div class="card w-100">
        <!-- <img src="img/html course.png" class="card-img-top" alt="..."> -->
        <div class="card-body">
          <h5 class="card-title text-left">
            <strong><?php echo $row["name"]; ?></strong>
          </h5>
          <p class="card-text"><?php echo $row["description"]; ?></p>
          
        </div>
        <div class="card-body ms-auto">
          <samll>
            <p><span class="fw-bold"> Duration: </span><?php echo $row["duration"]; ?> </p>
	        <del id="o_price">Rs <?php echo $row["o_price"]; ?></del>
	        <span class="pe-5 fw-bold" id="o_price">Rs <?php echo $row["s_price"]; ?></span>
	      </small>

      <form action="checkout.php" method="GET">
	      <input type="hidden" name="price" value="<?php echo $row["s_price"]; ?>" />
	      <input type="submit" class="card-link btn btn-outline-dark mt-3" value="Buy Now" />
        </form>
	    </div>
	</div>

	</div> <!-- 1st Col end -->
</div> <!-- Row end -->


<div class="row mt-5"> <!-- 2nd Row Start -->
<div class="col">

    <p class="bg-dark text-light p-2 mt-5 text-center fw-bold">Lessons in this course</p>

<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Lesson Name</th>
    </tr>
  </thead>
  <tbody>
<?php 
$i=1;
    while($row = mysqli_fetch_assoc($qr)):
?>
    <tr>
      <th scope="row"><?php echo $i++; ?></th>
      <td><?php echo $row["name"]; ?></td>
    </tr>

<?php endwhile; ?>
  </tbody>
</table>
    
</div>
</div> <!-- 2nd Row Start -->
</div> <!-- Container end -->


<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />


<?php include "header.php" ?>


<!-- Cards / Course Starts Here -->
<div class="container mt-5 pt-5" id="courses-section">
    <div class="row">

<?php
$con = mysqli_connect("localhost", "root", "", "Lms_DB");
$query = "select * from courses";
$qr = mysqli_query($con, $query);
if (mysqli_num_rows($qr) > 0):

    while ($row = mysqli_fetch_assoc($qr)):
?>
	<div class="col mt-5"> <!-- 1st Col Start of the row -->
	  <div class="card" style="width: 18rem;">
	    <!-- <img src="img/html course.png" class="card-img-top" alt="..."> -->
	    <div class="card-body text-center">
	      <h5 class="card-title"><strong><?php echo $row["name"]; ?></strong></h5>
	      <p class="card-text"><?php echo $row["description"]; ?></p>
	    </div>
	    <div class="card-body text-center">
		<samll>
	        <del id="o_price">Rs <?php echo $row["o_price"]; ?></del>
	        <span class="pe-5 fw-bold" id="o_price">Rs <?php echo $row["s_price"]; ?></span>
	    </small>

	      <a type="submit" href="one-course.php?courseId=<?php echo $row["id"]?>" class="card-link btn btn-outline-dark">Enroll</a>

	    </div>
	</div>
	</div> <!-- 1st Col end -->

	<?php
endwhile;
else:
    echo "<h1> No Courses Are There, Go and Add Some If you are an admin! </h1>";
endif;
mysqli_close($con);
?>

</div> <!-- Row end -->
</div> <!-- Container end -->
<!-- End Cards / Course Here -->

<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
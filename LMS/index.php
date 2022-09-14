<?php include "header.php";?>

<!-- Hero Section Starts Here -->
<div id="heroSection">
<div class="container col-xl-10 col-xxl-8 px-4 py-5">
    <div class="row align-items-center g-lg-5 py-5">
      <div class="col-lg-7 text-center text-lg-start">
        <h1 class="display-4 fw-bold lh-1 mb-3">Vertically centered hero sign-up form</h1>
        <p class="col-lg-10 fs-5" id="hero-left-p">Below is an example form built entirely with Bootstrap’s form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>
      </div>
      <div class="col-md-10 mx-auto col-lg-5" id="loginForm">

      <?php if (!isset($_SESSION["loggedInName"])): ?>
        <form class="p-4 p-md-5 border rounded-3 bg-light">
          <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Email address</label>
          </div>
          <div class="form-floating mb-3">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password</label>
          </div>
          <!-- The response will show in the below p tag -->
          <p id="serverResponse">Enter Your Credentials Above</p>

          <div class="checkbox mb-3">
            <!-- <label>
              <input type="checkbox" value="remember-me"> Remember me
            </label> -->
          </div>
          <button class="w-100 btn btn-lg btn-primary" type="submit" id="userLogin">Sign In</button>
          <hr class="my-4">
          <small class="text-muted">Don't have an account yet? <a href="signup.php"> Click Here </a></small>
        </form>

        <?php else: ?>

          <h1 style="font-size: 4em; background: white; text-transform: capitalize; text-align: center; border-radius: 10px; box-shadow: -1px 9px 20px #b6a1a1;"> Hello <?php echo $_SESSION["loggedInName"]; ?> </h1>

          <?php endif?>

      </div>
    </div>
  </div>
  </div>
<!-- End Hero Section Here -->


<!-- Cards / Course Starts Here -->
<div class="container mt-5 pt-5" id="courses-section">
    <div class="row">

<?php
$con = mysqli_connect("localhost", "root", "", "Lms_DB");
$query = "select * from courses limit 6";
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

<div class="row mt-2 mb-5"> <!-- View All Button row starts here -->
  <div class="col text-center mt-5 ">
    <a href="courses.php" class="btn btn-dark w-5 ps-4 pe-4">View All</a>
  </div>
</div> <!-- End View All Button row -->
</div> <!-- Container end -->
<!-- End Cards / Course Here -->

<br/>
<br/>
<br/>
<br/>
<br/>
<br/>


 <!-- Testimonal Section starts here -->
<?php
  $con = mysqli_connect("localhost", "root", "", "Lms_DB");
  $query = "select * from sign_form join feedback on feedback.student_id = sign_form.id group by feedback.student_id";
  $qr = mysqli_query($con, $query);
  mysqli_close($con);

?>
 
 <div class="container" id="testimonial-section">
   <h2 class="bg-dark text-light p-2 mt-5 text-center">What alumnus says</h2>

   <div class="row mt-4">

   <?php while($row = mysqli_fetch_assoc($qr)): ?>
     <div class="col-6">
        <div class="container-testimonial">
          <img src="<?php echo str_replace("profile-pics", "http://localhost/LMS/student/profile-pics",$row["img"]); ?>" alt="Avatar" style="width:90px">
          <p><span><strong><?php echo $row["username"]; ?></strong></span> <?php echo $row["occupation"]; ?></p>
          <p><?php echo $row["feedback"]; ?></p>
      </div>
    </div>
    <?php 
    endwhile;
   ?>

  </div>
</div>
 <!-- End Testimonal Section here -->



<br />
<br />
<br />
<br />
<br />
<br />

  <!-- Contact Form Section Starts Here -->
  <div class="container rounded" id="contactForm-section">
    <div class="row">

      <h1 class="text-light text-center mt-3 mb-4">Contact Us</h1>

      <div class="col text-center">
        <form action="#" method="post">
          <input type="text" placeholder="Full Name" class="w-100 contact-fields">
          <input type="email" placeholder="Email Address" class="w-100 mt-2 contact-fields"><br/>
          <textarea name="message" id="message" cols="30" rows="10" class="mt-2 w-100 contact-fields" placeholder="Write your message here..."></textarea>
          <input type="submit" value="Submit" class="w-100 contact-fields mb-2 btn btn-light">
        </form>
    </div>

</div> <!-- Ended row -->
</div> <!-- Ended Container -->
  <!-- End Contact Form Section Here -->


<br/>
<br/>
<br/>








    <?php include "footer.php";?>
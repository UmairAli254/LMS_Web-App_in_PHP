<?php

// Compulsory Files
include "header.php";
include "dash-common.php";
?>

<?php
    $con = mysqli_connect("localhost", "root", "", "Lms_DB");

    $query = "select * from feedback";
    $qr = mysqli_query($con, $query);

 ?>


<div class="col" >
    <div class="container"> <!-- Container inside the main col 2 -->

    <div class="row">
    <p class="bg-dark text-light p-2 mt-5 text-center fw-bold">All Feedbacks from Students</p>
    </div>

    <div class="row"> <!-- Second Row inside the container -->
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Feedback ID</th>
      <th scope="col">Feedback</th>
      <th scope="col">Student ID</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $i = 1;
    while ($row = mysqli_fetch_assoc($qr)): ?>

            <tr>
            <td scope="col"><?php echo $i++ ?></td>
            <td scope="col"><?php echo $row["id"] ?></td>
            <td scope="col"><?php echo $row["feedback"] ?></td>
            <td scope="col"><?php echo $row["student_id"] ?></d>
            <td scope="col">

            <i class="fa-solid fa-trash-arrow-up fs-5 text-danger ms-3" role="button" id="<?php echo $row["id"] ?>" onclick="deleteThis(this.id)"></i>
            </td>
        </tr>

    <?php endwhile;?>
  </tbody>
</table>

</div>
    </div> <!-- End Second Row inside the main container -->
</div> <!-- End Container inside the main col 2 / End Courses List here -->


<script src="js/feedbackDelete.js"> </script>


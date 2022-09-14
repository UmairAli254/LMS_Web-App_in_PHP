<?php 

    include "header.php";
    include "dash-common.php";
?>

<!-- Main Column Two  -->
<div class="col">

<div class="row mt-5 ms-5"> <!-- Row inside main col 2 -->


    

    <div class="col"> <!-- Card / 1 in one row -->
<!-- Show number course in card one and now it's dynamic -->
<?php 
    $con = mysqli_connect("localhost", "root", "", "Lms_DB");
    $query = "select * from courses";
    $qr = mysqli_query($con, $query);

    $num_rows = mysqli_num_rows($qr);

    mysqli_close($con);
?>
    <div class="card text-white bg-danger mb-3 text-center p-2" style="max-width: 18rem;">
        <div class="card-header">Courses</div>
            <div class="card-body">
                <h5 class="card-title pt-3 pb-3"><?php echo $num_rows ?></h5>
                <p class="card-text"> <a href="courses.php" class="text-light"> View </a></p>
            </div>
        </div>

    </div> <!-- End Col 1 in row -->


    <div class="col"> <!-- Card / Col 2 in row -->

    <?php 
    $con = mysqli_connect("localhost", "root", "", "Lms_DB");
    $query = "select * from sign_form";
    $qr = mysqli_query($con, $query);

    $num_rows = mysqli_num_rows($qr);

    mysqli_close($con);
?>

    <div class="card text-white bg-success mb-3 text-center p-2" style="max-width: 18rem;">
        <div class="card-header">Students</div>
            <div class="card-body">
                <h5 class="card-title pt-3 pb-3"><?php echo $num_rows; ?></h5>
                <p class="card-text"> <a href="students.php" class="text-light"> View </a></p>
            </div>
        </div>

    </div> <!-- End Col 2 in row -->


    <div class="col"> <!-- Card / Col 3 in row -->

    <?php 
    $con = mysqli_connect("localhost", "root", "", "Lms_DB");
    $query = "select * from sales";
    $qr = mysqli_query($con, $query);

    $num_rows = mysqli_num_rows($qr);
    mysqli_close($con);
?>

    <div class="card text-white bg-primary mb-3 text-center p-2" style="max-width: 18rem;">
        <div class="card-header">Sold</div>
            <div class="card-body">
                <h5 class="card-title pt-3 pb-3"><?php echo $num_rows ?></h5>
                <p class="card-text"> <a href="sell-reports.php" class="text-light"> View </a></p>
            </div>
        </div>

    </div> <!-- Col 3 in row -->


 </div> <!-- End Row inside the main col 2 -->



<!-- Courses List / Which Courses Are sold, Over All Report -->


<div class="container">
    <div class="row"> <!-- Second Row inside the main col 2 -->
        <p class="bg-dark text-light p-2 mt-5 text-center fw-bold">Courses Ordered</p>
    </div> <!-- End Second Row inside the main col 2 -->

<div class="row">

<?php 
    $con = mysqli_connect("localhost", "root", "", "Lms_DB");
    $query = "select * from sales limit 3";
    $qr = mysqli_query($con, $query);

    mysqli_close($con);
?>

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">ID</th>
      <th scope="col">Course Name</th>
      <th scope="col">Student Email</th>
      <th scope="col">Order Date</th>
      <th scope="col">Amount</th>
    </tr>
  </thead>
  <tbody>

  <?php if(mysqli_num_rows($qr)): 
        $i = 1;
            while($row = mysqli_fetch_assoc($qr)):
    ?>
    <tr>
        <td scope="row"><?php echo $i++ ?></td>
        <td scope="row"><?php echo $row["id"];?></td>
        <td>(<?php echo $row["course_id"]; ?>) <?php echo $row["course_name"]; ?></td>
        <td><?php echo $row["stu_email"]; ?></td>
        <td><?php echo $row["date"]; ?></td>
        <td><?php echo $row["price"]; ?></td>
    </tr>
    <?php 
        endwhile;
        else: 
        ?>
            <h5 class="bg-warning text-center mt-5 rounded p-2 text-dark">No Courses Registered Yet!</h5> 
        
    <?php
        endif;
    ?>
   
  </tbody>
</table>

    </div>
    </div>







        </div> <!-- Main Second Column Ends Here -->
    </div> <!-- Row Ends Here -->
</div> <!-- Container Ends here -->




<?php include "footer-scripts.php" ?>
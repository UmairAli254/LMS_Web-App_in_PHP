<?php

include "header.php";
include "dash-common.php";
?>

<!-- Main Column Two  -->
<div class="col">


<form method="POST" class="m-5 d-print-none">
    <input type="date" name="start-date"> <strong> &nbsp;&nbsp; to &nbsp;&nbsp;</strong>
    <input type="date" name="end-date">
    <input type="submit" name ="search" value="search" class="ms-2 p-2" style="color: white; background: rgba(55, 124, 189, 0.959);">
</form>

<?php if (isset($_POST["search"])): ?>

<div class="container">
<?php
$con = mysqli_connect("localhost", "root", "", "Lms_DB");
$query = "select * from sales where date between  '{$_POST["start-date"]}' and '{$_POST["end-date"]}' ";

$qr = mysqli_query($con, $query);
mysqli_close($con);

?>

    <div class="row">
        <div class="col">
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Order ID</th>
      <th scope="col">Course Name</th>
      <th scope="col">Student Email</th>
      <th scope="col">Order Date</th>
      <th scope="col">Amout</th>
      <th scope="col" class="d-print-none">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
$i = 1;
while ($row = mysqli_fetch_assoc($qr)): ?>

            <tr>
            <td scope="col"><?php echo $i++ ?></td>
            <td scope="col"><?php echo $row["orderid"] ?></td>
            <td scope="col"><?php echo "({$row["course_id"]}) " . $row["course_name"] ?></td>
            <td scope="col"><?php echo $row["stu_email"] ?></d>
            <td scope="col"><?php echo $row["date"] ?></d>
            <td scope="col"><?php echo $row["price"] ?></d>
            <td class="d-print-none">
            <button class="btn" type="submit" id="<?php echo $row["id"]; ?>" onclick="deletethis(this.id)" value="Delete Me">
               <i class="fa-solid fa-trash-can fs-6 text-danger"></i>
            </button>
        </td>  
        </tr>
               <?php endwhile;?>
  </tbody>
</table>
</div>
</div>
</div>
<button class="d-print-none p-2 rounded" style="color: white; background: rgba(55, 124, 189, 0.959); border:none" onclick="window.print()">Print Reports</button>
<?php
else: ?>

            <div class="container">
            <?php
$con = mysqli_connect("localhost", "root", "", "Lms_DB");
$query = "select * from sales;";

$qr = mysqli_query($con, $query);
mysqli_close($con);

?>

                <div class="row">
                    <div class="col">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Order ID</th>
                  <th scope="col">Course Name</th>
                  <th scope="col">Student Email</th>
                  <th scope="col">Order Date</th>
                  <th scope="col">Amout</th>
                  <th scope="col" class="d-print-none">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
$i = 1;
while ($row = mysqli_fetch_assoc($qr)): ?>

                        <tr>
                        <td scope="col"><?php echo $i++ ?></td>
                        <td scope="col"><?php echo $row["orderid"] ?></td>
                        <td scope="col"><?php echo "({$row["course_id"]}) " . $row["course_name"] ?></td>
                        <td scope="col"><?php echo $row["stu_email"] ?></d>
                        <td scope="col"><?php echo $row["date"] ?></d>
                        <td scope="col"><?php echo $row["price"] ?></d>
                        <td class="d-print-none">
            <button class="btn" type="submit" id="<?php echo $row["id"]; ?>" onclick="deletethis(this.id)" value="Delete Me">
               <i class="fa-solid fa-trash-can fs-6 text-danger"></i>
            </button>
        </td>  


</td>
                    </tr>
                           <?php endwhile;?>
              </tbody>
            </table>
            </div>
            </div>
            </div>

<button class="d-print-none p-2 rounded" style="color: white; background: rgba(55, 124, 189, 0.959); border:none" onclick="window.print()">Print Reports</button>

<?php endif;?>













        </div> <!-- Main Second Column Ends Here -->
    </div> <!-- Row Ends Here -->
</div> <!-- Container Ends here -->

<script src="js/deleteOrder.js"> </script>

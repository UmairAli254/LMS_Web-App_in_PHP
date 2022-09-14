<?php include "header.php";

$price = $_GET["price"];
$c_name = $_SESSION["selected_course_name_for_buy"];
$c_id = $_SESSION["selected_course_id_for_buy"];
$orderID = "ORD" . rand();
$stu_email = $_SESSION["stu_email"];
?>

<div class="container mt-5 p-5">
    <div class="row">
        <div class="col-4 m-auto">

<form method="POST">

  <div class="mb-3"> <!-- Order ID -->
    <label>Order ID</label>
    <input type="text" value="<?php echo $orderID; ?>" class="form-control" name="email" disabled>
  </div>

  <div class="mb-3"> <!-- Course Name -->
    <label>Course Name</label>
    <input type="text" value="<?php echo $c_name; ?>" class="form-control" name="email" disabled>
  </div>

  <div class="mb-2"> <!-- Price  -->
    <label>Price</label>
    <input type="text" value="<?php echo $price ?>" class="form-control" name="email" disabled>
  </div>


<!-- Buttons -->
<?php if (isset($_SESSION["loggedInName"])): ?>
<div class="text-center">
  <input type="submit" value="Pay Now" name="payNow" class="btn btn-primary mt-3">
  <input type="submit" value="Cancel" id="cancel" name="cancel" class="btn btn-primary mt-3">
  </div>
<?php else:
    echo "<strong class='text-danger'> Please login first to purchase any course </strong>";
endif;
?>
</form>

<?php
if (isset($_POST["cancel"])):
    header("Location: http://localhost/LMS/courses.php");
endif;

if (isset($_POST["payNow"])):
    $con = mysqli_connect("localhost", "root", "", "Lms_DB");

    $query = "insert into sales(orderid, course_name, course_id, stu_email, price) values (
		                '{$orderID}',
		                '{$c_name}',
		                 {$c_id},
		                '{$stu_email}',
		                 {$price}
		            )";
    $qr = mysqli_query($con, $query);
    mysqli_close($con);
endif;

?>

</div>
<?php
if (isset($_POST["payNow"])):
    echo $qr ? "<p class='bg-warning mt-5 rounded p-2 text-dark text-center'>You have successfully purchased this course. Go to \"My Courses\" section in your dashboard to see this course <a href='http://localhost/LMS/student/mycourses.php' class='bg-dark text-warning rounded p-1 text-center'> My Courses </a></p> " : "<p class='text-white bg-danger'> Failed, Try agin after some time </p>";
endif?>
</div>
</div>

<?php

include "header.php";
include "dash-common.php";
?>

           <!-- Get courses name from the courses table to show them the drop down in form -->
<?php
if (isset($_POST["search"])):
    $courseID = $_POST["courseID"];
    $_SESSION["courseID"] = $courseID;

    $con = mysqli_connect("localhost", "root", "", "Lms_DB");

    $query = "select name from courses where id = {$courseID}";
    // $query = "select name from courses where id = {$courseID}";
    $qr = mysqli_query($con, $query);

    $row = mysqli_fetch_assoc($qr);
    $courseName = $row["name"];
    $_SESSION["courseName"] = $courseName;

    $query = "select * from lessons where c_id={$courseID}";
    $qr_all_lessons = mysqli_query($con, $query);

    // mysqli_close($con);

endif;

?>





<!-- Main Column Two  -->
<div class="col">

    <form method="POST" class="ms-5 mt-2 d-print-none">
        <label>Enter Course ID:</label> <br/>
        <input type="number" name="courseID" value="198" required>
        <input type="submit" value="Search" class="ms-1 p-2 border-0" name="search" id="search" style="color: white; background: rgba(55, 124, 189, 0.959);">
    </form>

                <!-- Diplay Lessons -->
     
    <!-- Diplay Lessons upon clicking on show all -->
<!-- <div> -->
  <form method="POST">
  <input class="ms-1 p-2 border-0 rounded" name="show_all" style="float: right; margin-top: -35px !important; color: white; background: rgba(55, 124, 189, 0.959);" type="submit" value="Show All">
  </form>

  <?php if ($_POST["show_all"]): ?>
    <div class="container mt-3"> <!-- Container inside the main col 2 -->

    <div class="row"> <!-- Row inside the main container -->

        <h3 class="bg-dark text-white mt-3 p-1 rounded text-center"> All Lessons</h3>
        </div> <!-- End Row inside the container -->


    <div class="row"> <!-- Second Row inside the container -->
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Lesson ID</th>
      <th scope="col">Lesson Name</th>
      <th scope="col">Course Name</th>
      <!-- <th scope="col">Lesson Link</th> -->
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $conn = mysqli_connect("localhost", "root", "", "Lms_DB");
    $show_all_query = "select * from lessons";
    $show_all_lessons = mysqli_query($conn, $show_all_query);
    mysqli_close($conn);

$i = 1;
while ($row_all = mysqli_fetch_assoc($show_all_lessons)): ?>

            <tr>
            <td scope="col"><?php echo $i++ ?></td>
            <td scope="col"><?php echo $row_all["id"] ?></td>
            <td scope="col"><?php echo $row_all["name"] ?></td>
            <td scope="col"><?php echo "({$row_all["c_id"]}) " . $row_all["c_name"] ?></td>
           

            <td scope="col d-print-none">
            <i class="fa-solid fa-pen-to-square fs-5" role="button" id="<?php echo $row_all["id"] ?>"  onclick="updateThis(this.id)" data-bs-toggle="modal" data-bs-target="#updateCourse"></i>


            <i class="fa-solid fa-trash-arrow-up fs-5 text-danger ms-3" role="button" id="<?php echo $row_all["id"] ?>" onclick="deleteThis(this.id)"></i>
            </td>
        </tr>
               <?php endwhile;?>
  </tbody>
</table>

    </div> <!-- End Second Row inside the main container -->
</div> <!-- End Container inside the main col 2 / End Courses List here -->
<?php endif;?>


<!-- </div> End of show all lessons -->





    <!-- Display Lessons upon entering the course ID -->

<?php if ($_POST["search"]): ?>
    <div class="container mt-3"> <!-- Container inside the main col 2 -->

    <div class="row"> <!-- Row inside the main container -->

        <h3 class="bg-dark text-white mt-3 p-1 rounded text-center"> Course ID: <span class="bg-light text-dark m-2 ps-1 pe-1 rounded"><?php echo $courseID; ?></span> Course Name: <span class="bg-light text-dark m-2 ps-1 pe-1 rounded"><?php echo $courseName; ?></span> </h3>
        </div> <!-- End Row inside the container -->


    <div class="row"> <!-- Second Row inside the container -->
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Lesson ID</th>
      <th scope="col">Lesson Name</th>
      <th scope="col">Lesson Link</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
$i = 1;
while ($row = mysqli_fetch_assoc($qr_all_lessons)): ?>

            <tr>
            <td scope="col"><?php echo $i++ ?></td>
            <td scope="col"><?php echo $row["id"] ?></td>
            <td scope="col"><?php echo $row["name"] ?></td>
            <td scope="col"><?php echo $row["link"] ?></d>
            <td scope="col d-print-none">

            <i class="fa-solid fa-pen-to-square fs-5" role="button" id="<?php echo $row["id"] ?>"  onclick="updateThis(this.id)" data-bs-toggle="modal" data-bs-target="#updateCourse"></i>


            <i class="fa-solid fa-trash-arrow-up fs-5 text-danger ms-3 " role="button" id="<?php echo $row["id"] ?>" onclick="deleteThis(this.id)"></i>
            </td>
        </tr>
               <?php endwhile;?>
  </tbody>
</table>

    </div> <!-- End Second Row inside the main container -->
</div> <!-- End Container inside the main col 2 / End Courses List here -->
<?php endif;?>





                      <!-- Add Course -->

            <!-- Add new Course Button and Modal -->
<!-- PHP For Form -->
<?php
// This cod3 will fetch data from database of courses to show in dropdown of form
$con = mysqli_connect("localhost", "root", "", "Lms_DB");
$query = "select * from courses";
$qr = mysqli_query($con, $query);
$num_rows = mysqli_num_rows($qr);
// mysqli_close($con);


// When we will submit the lesson then the below code will run to store lessons the lessons table
if (isset($_POST["add_btn"])):

    $select = $_POST["select"];
    $name = $_POST["name"];
    $desc = $_POST["description"];

    $lesson_name = $_FILES["lesson_video"]["name"];
    $lesson_tmp_name = $_FILES["lesson_video"]["tmp_name"];
    $lesson_folder = "lessons_vid/" . $lesson_name;
    move_uploaded_file($lesson_tmp_name, $lesson_folder);

// This request will get the ID of the selected course form the courses table to insert into the lessons table.
    $query = "select id from courses where name = '{$select}'";
    $qr3 = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($qr3);

    // echo " {$name}, {$lesson_folder}, {$desc}, {$row["id"]}, {$select} ";

// This request will insert the complete lesson data into the lessons table

    $query = "insert into lessons(name, link, description, c_id, c_name) values ('{$name}', '{$lesson_folder}', '{$desc}', {$row["id"]}, '{$select}')";
    mysqli_query($con, $query);

endif;

?>


           <!-- Add new lessons Modal Start here-->

<!-- Button Starts here -->
<div class="container">
    <div class="row fixed-bottom">
      <div class="col-10"></div>

     <div class="col float-end ms-5 ps-5">
        <button type="button" class="btn btn-secondary ms-5 mb-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            <i class="fa-solid fa-plus fs-4 m-1"></i>
        </button>
    </div>

  </div>
</div> <!-- Button end here -->

<!-- Start Add Course Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header" style="height: 50px !important">
        <h5 class="modal-title" id="staticBackdropLabel">Add New Lesson</h5> <div id="form_alert"> <p class='text-primary ms-4 mt-3'> Enter your lesson below </p> </div>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      <form  method="POST" enctype="multipart/form-data">

        <label>Select Course</label> <br/>
        <div style="float: right !important;">
        <select style="padding: 8px; cursor:pointer; width: 300px;  border: none; border-radius: 4px; outline: none"  name="select" id="updateSelection" name="updateSelection">
            <option value="volvo" selected disabled> Select one of <?php echo $num_rows ?> courses</option>
            <?php
                  while ($row = mysqli_fetch_assoc($qr)): ?>
                    <option>
                    <?php echo "{$row["name"]} " ?>
                    </option>
                <?php endwhile;?>


        </select>
        </div>

        <br />

        <label>Lesson Name</label> <br/>
        <input type="text" name="name" id="name" class="w-100" >

        <label>Lesson Description</label> <br/>
        <textarea name="description"  id="description" class="w-100" rows="3" ></textarea>


        <label>Upload Lesson</label> <br/>
        <input type="file" name="lesson_video" id="lesson_video" class="w-100 btn btn-light">

        <div class="modal-footer mt-4" style="height: 50px !important">

        <input type="submit" name="add_btn" class="btn" id="add_btn" style="color: white; background: rgba(55, 124, 189, 0.959);" value="Add"/>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>

        </form>
    </div>



    </div>
  </div>
</div> <!-- End Add Course modal here -->






             <!-- Start UPDATE Course Modal -->

<?php

    $update_name = $_FILES["update_video"]["name"];
    $update_tmp_name = $_FILES["update_video"]["tmp_name"];
    $update_folder = "lessons_vid/" . $update_name;
    move_uploaded_file($update_tmp_name, $update_folder);

    // $coursee


  if(isset($_POST["update_btn"])):
    $con = mysqli_connect("localhost", "root", "", "Lms_DB");

    if($_FILES["update_video"]["error"] === 0){
    $query = "update lessons set name = '{$_POST["updateName"]}', link = '$update_folder', description = '{$_POST["updateDescription"]}' where id = {$_POST["lessonID"]}";
  }
    else{
      $query = "update lessons set name = '{$_POST["updateName"]}', description = '{$_POST["updateDescription"]}' where id = {$_POST["lessonID"]}";
    }
    $qr = mysqli_query($con, $query);
    


    mysqli_close($con);
  endif;
?>



<div class="modal fade" id="updateCourse" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="updateCourseLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header" style="height: 50px !important">
        <h5 class="modal-title" id="updateCourseLabel">Update Lesson</h5> <div id="form_alert2"> <p class='text-primary ms-5 mt-3'> Update lesson below </p> </div>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      <form  method="POST" enctype="multipart/form-data">

        <label id="select_course_label">Selected Course</label> <br/>

        <div class="row">
        <div class="col-6">
          <select style="padding: 8px; cursor:pointer;  border: none; border-radius: 4px; outline: none"  name="select" id="courseSelection" name="courseSelection">

            <option id="option">
                  <!-- one course will show from javascript -->
                </option>

          </select>
        </div>
      
        <div class="col">
          <select style="padding: 8px; cursor:pointer; width:;  border: none; border-radius: 4px; outline: none"  name="lessonID" id="lessonID" name="courseSelection">

            <option id="optionLessonID">
                  <!-- one lessons unique id will show from javascript -->
                </option>

          </select>
        </div>
      
      </div>

        <br />

        <label>Lesson Name</label> <br/>
        <input type="text" name="updateName" id="updateName" class="w-100" >

        <label>Lesson Description</label> <br/>
        <textarea name="updateDescription"  id="updateDescription" class="w-100" rows="3" ></textarea>


        <label>Upload Lesson</label> <br/>
        <input type="file" name="update_video" class="w-100 btn btn-light">

        <img id="showOldImg_in_update_form"  width="200" height="200">
        <div id="showOldVideo_in_update_form">
        </div>

        <div class="modal-footer mt-4" style="height: 50px !important">

        <input type="submit" name="update_btn" class="btn" id="update_btn" style="color: white; background: rgba(55, 124, 189, 0.959);" value="Update"/>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>

        </form>
    </div>


    </div>
  </div>
</div> <!-- End UPDATE Lesson modal here -->









</div> <!-- Main Second Column Ends Here -->


    </div> <!-- Row Ends Here -->
</div> <!-- Container Ends here -->

<?php include "footer-scripts.php";?>


<script src="js/lessons.js"></script>


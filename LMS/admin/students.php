<?php

// Compulsory Files
include "header.php";
include "dash-common.php";

?>


<!-- Main Column Two  -->
 <div class="col">

<!-- Courses List / Which Courses Are sold, Over All -->
<div class="container"> <!-- Container inside the main col 2 -->
    <div class="row"> <!-- Row inside the main container -->
        <p class="bg-dark text-light p-2 mt-5 text-center fw-bold">Registered Students</p>
    </div> <!-- End Row inside the container -->


    <div class="row"> <!-- Second Row inside the container -->
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Student ID</th>
      <th scope="col">UserName</th>
      <th scope="col">Email</th>
      <th scope="col">Date</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
            <!-- Students will show here with javascript -->
  </tbody>
</table>

    </div> <!-- End Second Row inside the main container -->
</div> <!-- End Container inside the main col 2 / End Courses List here -->



<!-- Add new Student Button and Modal -->
   <div class="container">
    <div class="row fixed-bottom">
      <div class="col-10"></div>

     <div class="col float-end ms-5 ps-5">
        <button type="button" class="btn btn-secondary ms-5 mb-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            <i class="fa-solid fa-plus fs-4 m-1"></i>
        </button>
    </div>

  </div>
</div>


<!-- Start Add Student Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header" style="height: 50px !important">
        <h5 class="modal-title" id="staticBackdropLabel">Add New Student</h5> <div id="form_alert"> <p class='text-primary ms-4 mt-3'> Enter Student Details Below </p> </div>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      <form  method="POST">
        <label>UserName</label> <br/>
        <input type="text" name="username" id="username" class="w-100" >

        <label>Email</label> <br/>
        <input type="text"  name="email"  id="email" class="w-100">

        <label>Password</label> <br/>
        <input type="text"  name="password" id="password" class="w-100">

        <label>Confirm Password</label> <br/>
        <input type="text"  name="conf_pass" id="conf_pass" class="w-100">

        </form>
    </div>


      <div class="modal-footer">

      <button type="button" name="add_btn" class="btn" id="add_btn" style="color: white; background: rgba(55, 124, 189, 0.959);" value="Add Course"> Add </button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div> <!-- End Add STUDENT modal here -->




<!-- Start UPDATE Student Modal -->
<div class="modal fade" id="updateCourse" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="updateCourseLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header" style="height: 50px !important">
        <h5 class="modal-title" id="updateCourseLabel">Update Student Details</h5> <div id="form_alert2"> <p class='text-primary ms-3 mt-3'> Update Below </p> </div>
        <button type="button" class="btn-close" data-bs-dismiss="modal" onclick="update_value_close_btn()" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      <form  method="POST">
        <label>UserName</label> <br/>
        <input type="text" name="username" id="username2" class="w-100" >

        <label>Email</label> <br/>
        <input type="text"  name="email"  id="email2" class="w-100">

        <label>New Password / Old Password</label><br/>
        <input type="text"  name="pass" id="password2" class="w-100">

        <label>Confirm Password</label> <br/>
        <input type="text"  name="conf_pass" id="conf_pass2" class="w-100">

        </form>
    </div>


      <div class="modal-footer">

      <button type="button" name="add_btn" class="btn" id="update_btn" style="color: white; background: rgba(55, 124, 189, 0.959);" value="Add Course"> Update </button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="update_value_close_btn()"> Close</button>
      </div>

    </div>
  </div>
</div> <!-- End UPDATE Student Details modal here -->



</div> <!-- Main Second Column Ends Here -->

    </div> <!-- Row Ends Here -->
</div> <!-- Container Ends here -->







    <script src="js/students.js"> </script>
   <?php include "footer-scripts.php";?>
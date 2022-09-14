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
        <p class="bg-dark text-light p-2 mt-5 text-center fw-bold">List Of Courses</p>
    </div> <!-- End Row inside the container -->


    <div class="row"> <!-- Second Row inside the container -->
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Course ID</th>
      <th scope="col">Course Name</th>
      <th scope="col">Author</th>
      <th scope="col">Date</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
            <!-- Courses will show here with javascript -->
  </tbody>
</table>

    </div> <!-- End Second Row inside the main container -->
</div> <!-- End Container inside the main col 2 / End Courses List here -->



<!-- Add new Course Button and Modal -->
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
        <h5 class="modal-title" id="staticBackdropLabel">Add New Course</h5> <div id="form_alert"> <p class='text-primary ms-4 mt-3'> Enter your course details below </p> </div>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      <form  method="POST">
        <label>Course Name</label> <br/>
        <input type="text" name="name" id="name" class="w-100" >

        <label>Author</label> <br/>
        <input type="text"  name="author"  id="author" class="w-100">

        <label>Course Duration</label> <br/>
        <input type="text"  name="duration" id="duration" class="w-100">

        <label>Course Orignal Price</label> <br/>
        <input type="number"  name="o_price" id="o_price" class="w-100">

        <label>Course Selling Price</label> <br/>
        <input type="number"  name="s_price" id="s_price" class="w-100">

        <label>Course Description</label> <br/>
        <textarea name="description"  id="description" class="w-100" rows="3" ></textarea>

        <label>Course Image</label> <br/>
        <input type="file" id="course_image"  name="course_image" class="w-100 btn btn-light">

        </form>
    </div>


      <div class="modal-footer">

      <button type="button" name="add_btn" class="btn" id="add_btn" style="color: white; background: rgba(55, 124, 189, 0.959);" value="Add Course"> Add </button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div> <!-- End Add Course modal here -->

<?php 
  



?>






              <!-- Start UPDATE Course Modal -->
<div class="modal fade" id="updateCourse" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="updateCourseLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header" style="height: 50px !important">
        <h5 class="modal-title" id="updateCourseLabel">Update Course</h5> <div id="form_alert2"> <p class='text-primary ms-5 mt-3'> Update values below </p> </div>
        <button type="button" class="btn-close" data-bs-dismiss="modal" onclick="update_value_close_btn()" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      <form  method="POST">
        <label>Course Name</label> <br/>
        <input type="text" name="name" id="name2" class="w-100" >

        <label>Author</label> <br/>
        <input type="text"  name="author"  id="author2" class="w-100">

        <label>Course Duration</label> <br/>
        <input type="text"  name="duration" id="duration2" class="w-100">

        <label>Course Orignal Price</label> <br/>
        <input type="number"  name="o_price" id="o_price2" class="w-100">

        <label>Course Selling Price</label> <br/>
        <input type="number"  name="s_price" id="s_price2" class="w-100">

        <label>Course Description</label> <br/>
        <textarea name="description"  id="description2" class="w-100" rows="3" ></textarea>

        <label>Course Image</label> <br/>
        <input type="file" id="course_image2"  name="course_image" class="w-100 btn btn-light">

        </form>
    </div>


      <div class="modal-footer">

      <button type="button" name="add_btn" class="btn" id="update_btn" style="color: white; background: rgba(55, 124, 189, 0.959);" value="Add Course"> Update </button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="update_value_close_btn()"> Close</button>
      </div>

    </div>
  </div>
</div> <!-- End UPDATE Course modal here -->



</div> <!-- Main Second Column Ends Here -->

    </div> <!-- Row Ends Here -->
</div> <!-- Container Ends here -->







    <script src="js/courses.js"> </script>
   <?php include "footer-scripts.php";?>
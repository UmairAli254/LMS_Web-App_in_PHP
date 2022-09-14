<?php 

    include "header.php";
    include "stu-dash-common.php";
    
        if(isset($_POST["submit"])):
    
            $con = mysqli_connect("localhost", "root", "", "Lms_DB");
    
            $query = "insert into feedback(feedback, student_id) values('{$_POST["feedback"]}', {$_SESSION["stu_id"]})";
            $qr = mysqli_query($con, $query);
             
            mysqli_close($con);
    
        endif;
    
    
    ?>
    
    <!-- Main Column Two  -->
    <div class="col">
    
        <div class="mt-2" id="alert"> </div>
    
    <form method="POST" class="w-50 p-5 ">
            <!-- Email Field -->
            
                <label>Student Name</label> <br/>
                <input type="email" class="p-2 mb-3 w-75" name="email" id="email" value="<?php echo $_SESSION["loggedInName"]; ?>" disabled>
                
                
                
            <!-- Feed Back Field -->
                
            <textarea name="feedback" name="feedback" id="feedback" placeholder="Write your review here..." cols="35" rows="3" required></textarea>
    
            <!-- Login Button -->
            <div class="form-group">
                <input type="submit" id="submit" name="submit" value="Submit" class="p-2 btn btn-dark">
            </div>
    
        </form>
    
    
    
    
    
    </div> <!-- Main Second Column Ends Here -->
    
    </div> <!-- Row Ends Here -->
    </div> <!-- Container Ends here -->
    
    
 
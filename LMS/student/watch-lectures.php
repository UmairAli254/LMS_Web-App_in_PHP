<?php 

    include "header.php";
    include "stu-dash-common.php";
?>
<?php
    $c_name = $_GET["course_name"];
    $c_id = $_GET["course_id"];

    $con = mysqli_connect("localhost", "root", "", "Lms_DB");
    $query = "select * from lessons where c_id = {$c_id}";
    $qr = mysqli_query($con, $query);

    mysqli_close($con);
?>

 <!-- Main Column Two -->
 <div class="col">

 <h3 class="bg-dark text-white mt-1 p-1 rounded text-center"> Course Name: <span class="bg-light text-dark m-2 ps-1 pe-1 rounded"><?php echo $c_name; ?></span> </h3>

 <div class="row me-1 " style="height: 100%">

     <div class="col-10 text-center mt-5 pt-5">

     <div id="video"></div>
    

     </div>
    
    

     <div class="col bg-dark text-light rounded">
        <ul class="dash_ul text-primary text-light">
            <?php if(mysqli_num_rows($qr)):
                $i=1;
                    while($row = mysqli_fetch_assoc($qr)):
                ?>

                <li class="lecture-li" role="button" id="<?php echo $row["id"];?>" onclick="fun(this.id)" > <?php echo $i++ . ". " . $row["name"]; ?> </li>

                <br/>

                

            <?php endwhile;
                  else:
                    echo" There are no lectures in this course!";
                  endif;
            ?>
        </ul>
     </div>
 </div>
 












    
        
        
    </div> <!-- Main Second Column Ends Here -->
</div> <!-- Row Ends Here -->
</div> <!-- Container Ends here -->


<script src="js/show_lectures.js"></script>
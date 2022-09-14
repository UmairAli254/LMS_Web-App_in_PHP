<?php 

    include "header.php";
    include "stu-dash-common.php";
    
        if(isset($_POST["change"])):
    
            $con = mysqli_connect("localhost", "root", "", "Lms_DB");
    
            $query = "update sign_form set pass = '{$_POST["password"]}', c_pass='{$_POST["password"]}' where email = '{$_SESSION["stu_email"]}'";
            $qr = mysqli_query($con, $query);
             
            mysqli_close($con);
    
        endif;
    
    
    ?>
    
    <!-- Main Column Two  -->
    <div class="col">
    
        <div class="mt-2" id="alert"> </div>
    
    <form method="POST" class="w-50 p-5 text-center">
            <!-- Email Field -->
            <div class="form-group w-50 m-auto mb-1" id="emailField">
                <div class="input-group">
    
                    <input type="email" class="p-2 mb-1" name="email" id="email" value="<?php echo $_SESSION["stu_email"]; ?>" disabled>
    
                </div>
            </div>
    
            <!-- Password Field -->
            <div class="form-group w-50 m-auto mb-1">
                <div class="input-group mb-1">
    
                    <input type="text" class="p-2" name="password" id="newPass" placeholder="New Password" required="required">
    
                </div>
            </div>
    
            <!-- Login Button -->
            <div class="form-group">
                <input type="submit" id="changeBtn" name="change" value="Change" class="p-2 btn btn-dark">
            </div>
    
        </form>
    
    
    
    
    
    </div> <!-- Main Second Column Ends Here -->
    
    </div> <!-- Row Ends Here -->
    </div> <!-- Container Ends here -->
    
    
    <script>
        let email = document.getElementById("emailField");
        let alert = document.getElementById("alert");
        let btn = document.getElementById("changeBtn");
        let newPass = document.getElementById("newPass");
        let form = document.getElementsByTagName("form")[0];
        
        email.addEventListener("click", function(){
            alert.innerHTML = "<p class='alert alert-danger text-center'> You can not change the email </p>";
            setTimeout(function(){
            alert.innerHTML = "";
        }, 5000);
    
    });
        btn.addEventListener("click", (e)=>{
            
            if(newPass.value !== ""){
                confirm("Your password has been changed successfully");
            }
    
        });
    
    </script>
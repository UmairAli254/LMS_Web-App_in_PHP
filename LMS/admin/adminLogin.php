<?php 
    session_start();
    if(isset($_SESSION["admin_logged_in"]))
        header("Location: http://localhost/LMS/admin/dashboard.php");


include "../header.php" ?>
<!-- Css File for both Sign-forms' specific -->
<link rel="stylesheet" href="../css/sign-form.css">
 <!-- Bootstrap CSS -->
 <link href="../vendors/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CDN LINK -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Main Stylesheet  -->
    <link rel="stylesheet" href="../style.css">

<div class="signup-form">
	<!-- We do not need to put both attributes(method & actoin) because we are handling this via JavaScript -->
    <form> 
		<h2>LogIn</h2>
		<p>Only for admins. Please login first to see your dashboard!</p>
		<hr>
        
        <!-- Email Field -->
        <div class="form-group"> 
			<div class="input-group">
				
				<input type="email" class="form-control" name="email" id="email" placeholder="Email Address" required="required">

			</div>
        </div>

        <!-- Password Field -->
		<div class="form-group">
			<div class="input-group">
				
				<input type="password" class="form-control" name="password" id="pass" placeholder="Password" required="required">

			</div>
			<!-- Email or password dosen't matched -->
			<p id="notMatched"></p>
        </div>
        

        <!-- Login Button -->
		<div class="form-group">
            <button type="submit" id="adminLoginBtn" class="btn btn-primary btn-lg">Log In</button>
        </div>

    </form>
</div>







<br/>
<br/>
<br/>
<br/>
<br/>

<script src="js/adminLogin.js"> </script>
<?php include "header.php"?>
<!-- Css File for both Sign-forms' specific -->
<link rel="stylesheet" href="css/sign-form.css">

<?php
	 if(isset($_SESSION["loggedInName"])):
		header("Location: //localhost/LMS");
		// header("Location: //localhost/LMS");
	 endif;
?>


<!-- Alert Bar -->
<div class="alert" id="alertBar" role="alert">
  A simple danger alert—check it out!
</div>

<!-- Sign Up Form Starts Here -->
<div class="signup-form">
    <form method="post">
		<h2>Sign Up</h2>
		<p>Please fill in this form to create an account!</p>
		<hr>

        <div class="form-group"> <!-- Username -->
			<div class="input-group">

				<input type="text" class="form-control" id="username" name="username" placeholder="Username" required="required">

			</div>
        </div>

        <div class="form-group"> <!-- Email -->
			<div class="input-group">

				<input type="email" class="form-control" id="email" name="email" placeholder="Email Address" required="required">

			</div>
        </div>

		<div class="form-group"> <!-- Password -->
			<div class="input-group">

				<input type="password" class="form-control" id="pass" name="pass" placeholder="Password" required="required">

			</div>
        </div>

		<div class="form-group"> <!-- Confirm Password -->
			<div class="input-group">

				<input type="password" class="form-control" id="conf-pass"name="conf_pass" placeholder="Confirm Password" required="required">

			</div>
			<p class="c_pass_check "></p>
        </div>

        <!-- <div class="form-group"> Check Box -->
			<!-- <label class="checkbox-inline"><input type="checkbox" required> I accept the <a href="#">Terms of Use</a> &amp; <a href="#">Privacy Policy</a></label>
		</div> -->

		<div class="form-group"> <!-- Submit Button -->
            <button type="submit" class="btn btn-primary btn-lg" id="signUp">Sign Up</button>
        </div>

    </form>
			<!-- Already have an account? -->
	<div class="text-center">Already have an account? <a href="//localhost/LMS/#loginForm" class="text-primary">Login here</a></div>
</div>

<br/>
<br/>
<br/>
<br/>





<script src="js/signUp.js"></script>












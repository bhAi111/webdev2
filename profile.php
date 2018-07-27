<?php include_once('core/main.php'); ?>
<?php include_once('header.php'); ?>
<?php include_once('navbar.php'); ?>
<div class="wrapper">
 	<section class="container products">
 		<h1>User Details</h1>
 		<form>
			<div class="form-group">
			    <label for="username">Username</label>
			    <input type="text" class="form-control" name="username" placeholder="Username">
			</div>
			<div class="form-group">
			    <label for="email">Email Address</label>
			    <input type="email" class="form-control" name="email" placeholder="Email Address">
			</div>
			<div class="form-group">
		    	<label for="firstname">First Name</label>
		    	<input type="text" class="form-control" name="firstname" placeholder="First Name">
			</div>
			<div class="form-group">
		    	<label for="lastname">Last Name</label>
		    	<input type="text" class="form-control" name="lastname" placeholder="Last Name">
			</div>
			<div class="form-group">
		    	<label for="mnamename">Mname Name</label>
		    	<input type="text" class="form-control" name="mnamename" placeholder="Mname Name">
			</div>
			<div class="form-group">
		    	<label for="age">Age</label>
		    	<input type="number" class="form-control" name="age" placeholder="Age">
			</div>
			<div class="form-group">
		    	<label for="gender">Gender</label>
		    	<select class="form-control" name="gender">
		    		<option value="m">Male</option>
		    		<option value="f">Female</option>
		    	</select>
			</div>
			<button type="submit" class="btn btn-default">Submit</button>
		</form>
		<h1>Change Password</h1>
		<form>
			<div class="form-group">
			    <label for="password">Password</label>
			    <input type="password" class="form-control" name="password" placeholder="Password">
			</div>
			<div class="form-group">
			    <label for="verify_password">Verify Password</label>
			    <input type="password" class="form-control" name="verify_password" placeholder="Verify Password">
			</div>
			<button type="submit" class="btn btn-default">Submit</button>
		</form>
  	</section>
</div>
<?php include_once('footer.php'); ?>
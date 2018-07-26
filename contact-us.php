<?php include_once(ROOT_PATH.'header.php'); ?>
<?php include_once(ROOT_PATH.'navbar.php'); ?>
<div class="wrapper">

	<div class="container">
		<form action="#" method="post">
	  		<div class="form-group">
			    <label for="firstname">Fullname</label>
			    <input type="text" class="form-control" name="firstname" placeholder="Email">
		  	</div>
		  	<div class="form-group">
			    <label for="email">Email address</label>
			    <input type="email" class="form-control" name="email" placeholder="Email">
		  	</div>
		  	<div class="form-group">
			    <label for="subject">Subject</label>
			    <input type="text" class="form-control" name="subject" placeholder="Email">
		  	</div>
		  	<div class="form-group">
			    <label for="subject">Subject</label>
			    <textarea class="form-control" name="message" placeholder="Write your message here"></textarea>
		  	</div>
		  	<button type="submit" class="btn btn-default">Submit</button>
		</form>
	</div>
</div>
<?php include_once('footer.php'); ?>
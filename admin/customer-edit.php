<?php
include_once('../core/main.php');
if(!empty($_SESSION['user_id'])){
  // if naay session do nothing kay naa ta sa administration page, dapat naa session diri dapita
}else{
  // outsider ni siya redirect nato
  header('location: ' . ROOT_URL .'login.php');
}
if(empty($_POST) && empty($_GET)){
	// walay post or get request then binoang na ni. 

	exit('No data requested');
}
$customer = null;
$notif_type = null;
$notif_message = null;
if(!empty($_POST)){

	$data = array(
	  	'tblname' => 'user',
	  	'set' => [
	  		'username' => $_POST['username'],
	  		'firstname' => $_POST['firstname'],
	  		'midname' => $_POST['midname'],
	  		'lastname' => $_POST['lastname'],
	  		'age' => $_POST['age'],
	  		'email' => $_POST['email'],
	  		'gender' => $_POST['gender'],
	  	],
	  	'where' => [
	  		[
	  			'fieldname' => 'id',
	  			'operator' => '=',
	  			'value' => $_POST['id']
	  		]
	  	]
	);
	if ($edb->updateData($data)) {
  		header('location: customer-edit.php?id=' . $_POST['id'] . '&operation=success');
  	}else{
    	header('location: customer-edit.php?id=' . $_POST['id'] . '&operation=failed');
  	}
}
if(!empty($_GET)){
	$id = $_GET['id'];
	if(!empty($_GET['operation'])){
		$notif_type = ($_GET['operation'] == 'success')? 'success':'danger';
		$notif_message = ($_GET['operation'] == 'success')? 'Customer updated successfully': 'Failed to update customer';
	}
	

	$edb->select([
		'tblname' => 'user',
		'where' => [
			[
				'fieldname' => 'id',
				'operator' => '=',
				'value' => $_GET['id']
			]
		]
	]);
	$customer = $edb->getNext();
}
include_once(ROOT_PATH.'header.php');
include_once(ROOT_PATH.'navbar.php');
?>
<div class="container">
	<br/>

 <form class="form-horizontal"method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
 	<?php if(!empty($_GET['operation'])){ ?>
	  	<div class="alert alert-<?php echo $notif_type; ?>" role="alert">
	    	<?php echo $notif_message ?>
		</div>
	<?php } ?>
 	<input type="hidden" name="id" value="<?php echo $customer->id; ?>">

 	<div class="form-group">
	    <label for="username" class="col-sm-2 control-label">Username</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo $customer->username; ?>">
	    </div>
  	</div>

  	<div class="form-group">
	    <label for="firstname" class="col-sm-2 control-label">First Name</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" name="firstname" placeholder="First Name" value="<?php echo $customer->firstname; ?>">
	    </div>
  	</div>

  	<div class="form-group">
	    <label for="midname" class="col-sm-2 control-label">Mid Name</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" name="midname" placeholder="Mid Name" value="<?php echo $customer->midname; ?>">
	    </div>
  	</div>

  	<div class="form-group">
	    <label for="lastname" class="col-sm-2 control-label">Last Name</label>
	    <div class="col-sm-10">
	      <input type="text" class="form-control" name="lastname" placeholder="Last Name" value="<?php echo $customer->lastname; ?>">
	    </div>
  	</div>

  	<div class="form-group">
	    <label for="age" class="col-sm-2 control-label">Age</label>
	    <div class="col-sm-10">
	      <input type="number" class="form-control" name="age" placeholder="Age" value="<?php echo $customer->age; ?>">
	    </div>
  	</div>

  	<div class="form-group">
	    <label for="email" class="col-sm-2 control-label">Email</label>
	    <div class="col-sm-10">
	      <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $customer->email; ?>">
	    </div>
  	</div>

  	<div class="form-group">
	    <label for="gender" class="col-sm-2 control-label">Gender</label>
	    <div class="col-sm-10">
	      <select name="gender" class="form-control">
			  <option value="m" <?php echo ($customer->gender == 'm') ? 'selected':''; ?>>Male</option>
			  <option value="f" <?php echo ($customer->gender == 'f') ? 'selected':''; ?>>Female</option>
		</select>
	    </div>
  	</div>
  	<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Submit</button>
    </div>
  </div>

 </form>

</div>
<?php
include_once(ROOT_PATH.'footer.php');
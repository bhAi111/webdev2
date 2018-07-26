<?php include_once('header.php'); ?>
<?php include_once('navbar.php'); ?>
<?php

if(empty($_SESSION['user_id'])){
	// if walay session
	// wala na, finish na
}else{
	// if naa
	header('Location: admin/index.php');
}
?>

<?php
$error = false;
if(!empty($_POST)){
	$query = [
		'tblname' => 'user',
		'where' => [
			[
				'fieldname' => 'username',
				'operator' => '=',
				'value' => $_POST['username']
			],
			[
				'fieldname' => 'password',
				'operator' => '=',
				'value' => $_POST['password']
			]
		]
	];
	if($edb->select($query)){

		$user = $edb->getNext();
		if(!empty($user)){
			$_SESSION['user_id'] = $user->id;
			$_SESSION['username'] = $user->username;
			$_SESSION['user_type'] = $user->user_type;

			switch($user->user_type){
				case 1:
					header('Location: admin/index.php');
					break;
				default:
					header('location: index.php');
			}

 			
		}else{
			$error = true;
		}
	}else{
		$error = true;
	}
}

?>
<div class="wrapper access">
    <div class="container">
    	
        <form class="col-md-6 col-md-offset-3" action="#" method="post">
        	<?php if($error){ ?>
	    		<div class="alert alert-danger" role="alert">Username or password is incorrect</div>
	    	<?php } ?>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="username" class="form-control"  name="username" placeholder="Username">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control"  name="password" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>
</div>
<?php include_once('footer.php'); ?>
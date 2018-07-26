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
$product = null;
$notif_type = null;
$notif_message = null;
if(!empty($_POST)){

	$data = array(
	  	'tblname' => 'product',
	  	'set' => [
	  		'product_name' => $_POST['product_name'],
	  		'product_description' => $_POST['product_description'],
	  		'price' => $_POST['price'],
	  		'quantity' => $_POST['quantity']
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
  		header('location: product-edit.php?id=' . $_POST['id'] . '&operation=success');
  	}else{
    	header('location: product-edit.php?id=' . $_POST['id'] . '&operation=failed');
  	}
}
if(!empty($_GET)){
	$id = $_GET['id'];
	if(!empty($_GET['operation'])){
		$notif_type = ($_GET['operation'] == 'success')? 'success':'danger';
		$notif_message = ($_GET['operation'] == 'success')? 'Product updated successfully': 'Failed to update product';
	}
	

	$edb->select([
		'tblname' => 'product',
		'where' => [
			[
				'fieldname' => 'id',
				'operator' => '=',
				'value' => $_GET['id']
			]
		]
	]);
	$product = $edb->getNext();
}
include_once(ROOT_PATH.'header.php');
include_once(ROOT_PATH.'navbar.php');
?>
<div class="container">
	<br/>
  	<form class="form-horizontal" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
	    <?php if(!empty($_GET['operation'])){ ?>
	      	<div class="alert alert-<?php echo $notif_type; ?>" role="alert">
	        	<?php echo $notif_message ?>
	    	</div>
	    <?php } ?>
    	<input type="hidden" name="id" value="<?php echo $product->id; ?>">
  		<div class="form-group">
    		<label for="product_name" class="col-sm-2 control-label">Product Name</label>
    		<div class="col-sm-10">
      			<input type="text" class="form-control" name="product_name" placeholder="Product Name" value="<?php echo $product->product_name; ?>">
    		</div>
  		</div>
  		<div class="form-group">
    		<label for="product_description" class="col-sm-2 control-label">Product Description</label>
    		<div class="col-sm-10">
      			<textarea class="form-control" name="product_description" placeholder="Description Here">
      				<?php $product->product_description; ?>
      			</textarea>
    		</div>
  		</div>
  		<div class="form-group">
    		<label for="price" class="col-sm-2 control-label">Product Price</label>
    		<div class="col-sm-10">
      			<input type="number" class="form-control" name="price" placeholder="Product Price" value="<?php echo $product->price; ?>">
    		</div>
  		</div>
  		<div class="form-group">
    		<label for="quantity" class="col-sm-2 control-label">Product Quantity</label>
    		<div class="col-sm-10">
      			<input type="number" class="form-control" name="quantity" placeholder="Product Quantity" value="<?php echo $product->quantity; ?>">
    		</div>
  		</div>

  		<div class="form-group">
    		<label for="image" class="col-sm-2 control-label">Product Image</label>
    		<div class="col-sm-10">
      			<input type="file" class="form-control" name="image" placeholder="Product Image">
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
<?php
include_once('header.php');
include_once('navbar.php');
?>
<?php
// example sa pag create ug product
if(!empty($_POST)){
	/*
	 Mao ni siya sa ubos ge setup nato ang arguments para sa insert statements
	*/
	$new_product = [
		'tblname' => 'product',
		'columns' => [
			'productname',
			'productdescription',
			'price',
			'quantity',
		],
		'value' => [
			$_POST['productname'],
			$_POST['productdescription'],
			$_POST['price'],
			$_POST['quantity'],
		]

	];

	/*
	 Diri moi actual insert jud, final na jud ni, mao na ni!
	*/

	if ($edb->insertData($new_product)) {
		$alert_class = 'success';
		$message = "Product created successfully";
	}else{
		$alert_class = 'danger';
		$message = "Failed to create Product";
	}
}
?>
<?php if(!empty($_POST)){ ?>
	<div class="alert alert-<?php echo $alert_class; ?>" role="alert">
		<?php echo $message ?>
	</div>
<?php } ?>
<form action="#" method="POST">
	<input name="productname" placeholder="Product Name">
	<textarea name="productdescription" placeholder="Description"></textarea>
	<input type="number" name="price">
	<input type="number" name="quantity">
	<button type="submit">Create</button>
</form>
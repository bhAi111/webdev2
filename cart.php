<?php 
include_once('core/main.php');
if(!empty($_GET['action'])){
	switch($_GET['action']){
		case 'add':
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
			if(!empty($_SESSION['cart'][$product->id])){
				$_SESSION['cart'][$product->id]['quantity']++;
			}else{
				$_SESSION['cart'][$product->id] = [
					'id' => $product->id,
					'product_name' => $product->product_name,
					'price' => $product->price,
					'quantity' => 1,
				];
			}
			break;
		case 'remove':
			unset($_SESSION['cart'][$_GET['id']]);
			break;
		default;
	}
}

if(!empty($_POST)){
	$items = $_POST['item'];


	foreach($items as $id => $quantity){
	  	$_SESSION['cart'][$id]['quantity'] = $quantity;
	}
}
include_once('header.php');
include_once('navbar.php');

?>
<section class="container products">
	<?php if(empty($_SESSION['cart'])) { ?>
		<h1 class="text-center">Empty Cart</h1>
		<br/>
	<?php } else { ?>
		<form id="cartForm" method="POST" action="">
			<div class="row">
				<table class="table">
					<thead>
						<tr>
							<th>Product Name</th>
							<th>Price</th>
							<th width="10%">Qty</th>
							<th>Total</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($_SESSION['cart'] as $item) { ?>
							<tr>
								<td><?php echo $item['product_name']; ?></td>
								<td><?php echo $item['price']; ?> PHP</td>
								<td>
									<input type="number" class="form-control" name="item[<?php echo $item['id']; ?>]" value="<?php echo $item['quantity']; ?>"/>
								</td>
								<td><?php echo $item['price'] * $item['quantity']; ?> PHP</td>
								<td class="text-right">
									<a type="button" href="<?php echo ROOT_URL; ?>cart.php?action=remove&id=<?php echo $item['id']; ?>" class="btn btn-danger">X</a>
								</td>

							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
		                <label for="address">Address</label>
		                <input type="text" class="form-control"  name="address" placeholder="Address">
		            </div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
		                <label for="phone">Phone</label>
		                <input type="text" class="form-control"  name="phone" placeholder="Phone">
		            </div>
				</div>
				<div class="col-md-6 col-md-offset-6 text-right">
					<button class="btn btn-warning btn-lg" id="update">Update</button>
					<button class="btn btn-success btn-lg" id="checkout">Checkout</button>
				</div>
			</div>
		</form>
	<?php } ?>
</section>
<?php include_once('footer.php'); ?>
<script>
	var form = $('#cartForm');
	$('#update').on('click',function(e){
		e.preventDefault();
		$(form).prop('action','<?php echo ROOT_URL; ?>cart.php')
		$(form).submit();
	});

	$('#checkout').on('click',function(e){
		e.preventDefault();
		$(form).prop('action','<?php echo ROOT_URL; ?>checkout.php')
		$(form).submit();
	});
</script>
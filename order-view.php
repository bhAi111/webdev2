<?php

include_once('core/main.php');
include_once('header.php');
include_once('navbar.php');


?>
<div class="container">

	<?php if (!empty($_GET['id'])) { ?>
		<?php
		$result = $edb->select([
			'tblname' => 'transaction',
			'where' => [
				[
					'fieldname' => 'id',
					'operator' => '=',
					'value' => $_GET['id']
				]
			]
		]);
		// check if dili ba ok ang result
		if(!$result){
			// if dili ok, then message tag error
			?>
			<h1>Transaction Not Found</h1>
			<?php
		} else {
			$transaction = $edb->getNext();

			$sql = "SELECT 
			transaction_item.quantity as qty, product.product_name, product.price
			FROM transaction_item
			JOIN product on product.id = transaction_item.product_id
			where transaction_item.transaction_id = 1";
			$result = $edb->customQuery($sql);
			?>
			<br/>
			<div class="col-md-6">
				Order Date: <?php echo $transaction->date_created; ?>
			</div>
			<div class="col-md-6">
				Status: <?php echo $transaction->order_status; ?>
			</div>
			<hr>
			<table class="table">
				<thead>
					<th>Product Name</th>
					<th>Price</th>
					<th>Qty</th>
					<th>Total</th>
				</thead>
				<tbody>
					<?php while($row = $edb->getNext()){ ?>
						<tr>
							<td><?php echo $row->product_name; ?></td>
							<td><?php echo $row->price; ?></td>
							<td><?php echo $row->qty; ?></td>
							<td><?php echo $row->price * $row->qty; ?></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
			<?php
		}
		?>
	<?php } else { ?>
		<h1>No transaction request</h1>
	<?php } ?>
		
</div>
<?php include_once('footer.php'); ?>
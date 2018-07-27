<?php include_once('core/main.php'); ?>
<?php include_once('header.php'); ?>
<?php include_once('navbar.php'); ?>
<?php
$products = $edb->select(array(
	'tblname' => 'transaction',
	'where' => [
		[
  			'fieldname' => 'user_id',
  			'operator' => '=',
  			'value' => $_SESSION['user_id']
  		]
	]
));
?>
<div class="container">
	<table class="table">
		<thead>
			<th>Date Time</th>
			<th>Item Count</th>
			<th>Total Price</th>
			<th>Order Status</th>
			<th>
		</thead>
		<tbody>
			<?php while($row = $edb->getNext()){ ?>
				<tr>
					<td><?php echo $row->date_created; ?></td>
					<td><?php echo $row->item_count; ?></td>
					<td><?php echo $row->total_price; ?></td>
					<td><?php echo $row->order_status; ?></td>
					<td>
						<a href="<?php ROOT_URL; ?>order-view.php?id=<?php echo $row->id; ?>" class="btn btn-warning">View</a>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
<?php include_once('footer.php'); ?>
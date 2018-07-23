<?php
include_once('../core/main.php');
include_once('_template/header.php');
include_once('_template/navbar.php');

$products = $edb->select(array(
	'tblname' => 'product'
));




?>

<div class="container">
	<table class="table">
		<thead>
			<tr>
				<th>Name</th>
				<th>Description</th>
				<th>Price</th>
				<th>Quantity</th>
				<th width="15%"></th>
			</tr>
		</thead>

		<tbody>
			<?php while($row = $edb->getNext()){ ?>
				<tr>
					<td><?php echo $row->product_name; ?></td>
					<td><?php echo $row->product_description; ?></td>
					<td><?php echo $row->price; ?></td>
					<td><?php echo $row->quantity; ?></td>
					<td>
						<div class="btn-group" role="group" aria-label="...">
							<a href="<?php ADMIN_URL; ?>product-edit.php?id=<?php echo $row->id; ?>" class="btn btn-warning">Edit</a>
							<a href="<?php ADMIN_URL; ?>product-delete.php?id=<?php echo $row->id; ?>" class="btn btn-danger">Delete</a>
						</div>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
<?php
include_once('_template/footer.php');
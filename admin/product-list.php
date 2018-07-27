<?php
include_once('../core/main.php');
include_once(ROOT_PATH.'header.php');
include_once(ROOT_PATH.'navbar.php');


?>

<div class="container">

	<?php if(!empty($_GET['notif_type']) && !empty($_GET['notif_message'])){ ?>
		<div class="alert alert-<?php echo $_GET['notif_type']; ?>" role="alert">
	        <?php echo $_GET['notif_message'] ?>
	    </div>
	<?php } ?>
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
include_once(ROOT_PATH.'footer.php');
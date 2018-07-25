<?php
include_once('../core/main.php');
include_once('_template/header.php');
include_once('_template/navbar.php');


$customer = $edb->select(array(
    'tblname' =>  'user' ,
    'where' =>array(
    	array(
			'fieldname'=>'user_type',
			'operator'=>'=',
			'value'=>'2'
    	)
    )
));



?>

<div class="container">
<table class="table">
	<thead>
		<tr>
			<th>Username</th>
			<th>First_Name</th>
			<th>Mid_Name</th>
			<th>Last_Name</th>
			<th>Age</th>
			<th>Gender</th>
			<th>Email</th>
			<th width="15%"></th>
		</tr>
	</thead>

	<tbody>
		<?php while($row = $edb->getNext()){ ?>
			<tr>
				<td><?php echo $row->username; ?></td>
				<td><?php echo $row->firstname; ?></td>
				<td><?php echo $row->midname; ?></td>
				<td><?php echo $row->lastname; ?></td>
				<td><?php echo $row->age; ?></td>
				<td><?php echo $row->gender; ?></td>
				<td><?php echo $row->email; ?></td>
				<td>
					<div class="btn-group" role="group" aria-label="...">
						<a href="<?php ADMIN_URL; ?>customer-edit.php?id=<?php echo $row->id; ?>" class="btn btn-warning">Edit</a>
						<a href="<?php ADMIN_URL; ?>customer-delete.php?id=<?php echo $row->id; ?>" class="btn btn-danger">Delete</a>
					</div>
				</td>
			</tr>
		<?php } ?>	
	</tbody>				
</div>

<?php
include_once('_template/footer.php');	
<?php
include_once('../core/main.php');

if(!empty($_GET))
{
	if($edb->deleteData([
		'tblname' => 'product',
		'where' => [
			[
				'fieldname' => 'id',
				'operator' => '=',
				'value' => $_GET['id']
			]
		]
	])){
		header('location: product-list.php?notif_type=success&notif_message=product%20deleted%20successfully.');
	}else{
		header('location: product-list.php?notif_type=danger&notif_message=failed%20to%20delete%20product');
	}
}
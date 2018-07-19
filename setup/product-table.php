<?php
$product_table = array(
	'tblname'=>'product',
	'columns'=>array(
		array(
			'name'=>'id',
			'type'=>'int',
			'primary'=>true,
			'unique'=>true,
			'autoincrement'=>true,
			'notnull'=>true
		),
		array(
			'name'=>'productname',
			'type'=>'varchar',
			'length'=>255,
			'unique'=>true,
			'notnull'=>true,
		),
		array(
			'name'=>'productdescription',
			'type'=>'text'
		),
		array(
			'name'=>'price',
			'type'=>'double',
			'notnull'=>true,
		),
		array(
			'name'=>'quantity',
			'type'=>'int',
			'notnull'=>true,

		),


	)
);
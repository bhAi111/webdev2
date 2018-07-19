<?php
include_once('../core/main.php');
include_once('user-table.php');
include_once('product-table.php');
include_once('transaction-table.php');
include_once('transaction-item-table.php');

if(!$edb->hasTable($user_table['tblname'])){
	$op_res = $edb->createTable($user_table);
	if($op_res){
    	// table create success
    	echo '<p>'.$user_table['tblname'].' created succesfully</p>';

    	$default_user = [
			'tblname' => 'user',
			'columns' => [
				'userlevel',
				'username',
				'password',
				'firstname',
				'midname',
				'lastname',
				'age',
				'email',
				'gender'
			],
			'value' => [
				1,
				'admin',
				'admin',
				'Jessie',
				'x',
				'Concepcion',
				5,
				'jessie@gmail.com',
				'm',
			]
		];

		if($edb->insertData($default_user)){
			echo 'Default user created';
		}
  	}else{
    	// table was not created succesfully due to some errors.
    	echo '<p>'.$user_table['tblname'].' was not created</p>';
  	}

  	

}else{
  echo '<p>'.$user_table['tblname'].' is already created</p>';
}



if(!$edb->hasTable($product_table['tblname'])){

	if(!$edb->hasTable($product_table['tblname'])){
		$op_res = $edb->createTable($product_table);
		if($op_res){
	    	// table create success
	    	echo '<p>'.$product_table['tblname'].' created succesfully</p>';
	  	}else{
	    	// table was not created succesfully due to some errors.
	    	echo '<p>'.$product_table['tblname'].' was not created</p>';
	  	}
	}

}


if(!$edb->hasTable($transaction_table['tblname'])){

	if(!$edb->hasTable($transaction_table['tblname'])){
		$op_res = $edb->createTable($transaction_table);
		if($op_res){
	    	// table create success
	    	echo '<p>'.$transaction_table['tblname'].' created succesfully</p>';
	  	}else{
	    	// table was not created succesfully due to some errors.
	    	echo '<p>'.$transaction_table['tblname'].' was not created</p>';
	  	}
	}

}

if(!$edb->hasTable($transaction_item_table['tblname'])){

	if(!$edb->hasTable($transaction_item_table['tblname'])){
		$op_res = $edb->createTable($transaction_item_table);
		if($op_res){
	    	// table create success
	    	echo '<p>'.$transaction_item_table['tblname'].' created succesfully</p>';
	  	}else{
	    	// table was not created succesfully due to some errors.
	    	echo '<p>'.$transaction_item_table['tblname'].' was not created</p>';
	  	}
	}

}

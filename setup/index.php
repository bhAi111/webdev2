<?php
include_once('../database.php');
include_once('user-table.php');

if(!$edb->hasTable($user_table['tblname'])){
	$op_res = $edb->createTable($user_table);
	if($op_res){
    	// table create success
    	echo '<p>'.$user_table['tblname'].' created succesfully</p>';
  	}else{
    	// table was not created succesfully due to some errors.
    	echo '<p>'.$user_table['tblname'].' was not created</p>';
  	}

  	

}else{
  echo '<p>'.$user_table['tblname'].' is already created</p>';
}


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
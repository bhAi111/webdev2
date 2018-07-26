<?php
include_once('core/main.php');
$result = $edb->select(array(
    'tblname' =>  'user' ,
    'where' =>array(
    	array(
			'fieldname'=>'id',
			'operator'=>'=',
			'value'=> $_SESSION['user_id']
    	)
    )
));

if($result){
	$customer = $edb->getNext();
	$fullname = $customer->firstname . ' ' . 
				$customer->midname . ' ' . 
				$customer->lastname;
	$today = new DateTime();
	$today = $today->format('Y-m-d H:i:s');
	$transaction = [
		'tblname' => 'transaction',
		'columns' => [
			'fullname',
			'email',
			'address',
			'phone',
			'date_created'
		],
		'value' => [
			$fullname,
			$customer->email,
			$_POST['address'],
			$_POST['phone'],
			$today
		]
	];

	if ($edb->insertData($transaction)) {
		$id = $edb->insertId();
		$items = $_SESSION['cart'];
		try{
			foreach($items as $product_id => $item){
				$transaction_item = [
					'tblname' => 'transaction_item',
					'columns' => [
						'transaction_id',
						'product_id',
						'quantity'
					],
					'value' => [
						$id,
						$product_id,
						$item['quantity']
					]
				];
				$edb->insertData($transaction_item);
			}

			unset($_SESSION['cart']);
			$_SESSION['notif_type'] = 'success';
			$_SESSION['checkout_transaction_id'] = $id;
			header('location: thankyou.php');
		}catch(Exception $e){
			$_SESSION['notif_type'] = 'danger';
			header('location: error.php');
		}
		

	}else{
		exit('did not work');
	}
}

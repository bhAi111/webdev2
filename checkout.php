<?php
include_once('core/main.php');

$total_price = 0;
$total_products = 0;
foreach($_SESSION['cart'] as $product_id => $item){
	$total_price += ($item['quantity'] * $item['price']);
	$total_products++;
}

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
			'user_id',
			'fullname',
			'email',
			'address',
			'phone',
			'total_price',
			'item_count',
			'order_status',
			'date_created'
		],
		'value' => [
			$_SESSION['user_id'],
			$fullname,
			$customer->email,
			$_POST['address'],
			$_POST['phone'],
			$total_price,
			$total_products,
			'pending',
			$today
		]
	];
	if ($edb->insertData($transaction)) {
		$id = $edb->insertId();
		try{
			foreach($_SESSION['cart'] as $product_id => $item){
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

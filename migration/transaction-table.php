<?php
$transaction_table = array(
    'tblname'=>'transaction',
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
            'name' => 'user_id',
            'type' => 'int',
            'notnull' => true
        ),
        array(
            'name'=>'fullname',
            'type'=>'varchar',
            'length'=>120,
            'notnull'=>true
        ),
        array(
            'name'=>'email',
            'type'=>'varchar',
            'length'=>120,
            'notnull'=>true
        ),
        array(
            'name'=>'address',
            'type'=>'varchar',
            'length'=>120,
            'notnull'=>true
        ),
        array(
            'name'=>'phone',
            'type'=>'varchar',
            'length'=>120,
            'notnull'=> true
        ),
        array(
            'name' => 'total_price',
            'type' => 'decimal',
            'notnull' => true
        ),
        array(
            'name' => 'item_count',
            'type' => 'int',
            'notnull' => true
        ),
        array(
            'name' => 'order_status',
            'type' => 'varchar',
            'notnull' => true
        ),
        array(
            'name' => 'date_created',
            'type' => 'DATETIME',
        )
    )
);
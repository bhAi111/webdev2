<?php
$transaction_item_table = array(
    'tblname'=>'transaction_item',
    'columns'=>array(
        array(
            'name'=>'id',
            'type'=>'int',
            'primary'=>true,
            'unique'=>true,
            'autoincrement'=>true,
            'notnull'=>true
        ),
        // ...
        # transaction_id int
        array(
            'name'=>'transaction_id',
            'type'=>'int',
            'length'=>1,
            'notnull'=>true,
        ),
        # product_id int
        array(
            'name'=>'product_id',
            'type'=>'int',
            'notnull'=>true,
        ),

        # qty int
        array(
            'name'=>'quantity',
            'type'=>'int',
            'notnull'=>true,
        ),
    )
);
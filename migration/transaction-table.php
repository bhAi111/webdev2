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
        // ...


        # fullname varchar

        # email varchar
 
        # address varchar

        # phone varchar


        # date
        array(
            'name' => 'date_created',
            'type' => 'DATETIME'
        )
    )
);
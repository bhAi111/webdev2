<?php

include_once(ROOT_PATH.'EasyDB/class-EasyDB.php');


$edb=new edb(dbhost,dbname,dbuser,dbpass);

if(!$edb->isConnected()){
	exit('Not connected to database');
}
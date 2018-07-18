<?php

include ('EasyDB/class-EasyDB.php');
define('dbhost','localhost');
define('dbuser','root');
define('dbpass','');
define('dbname','webdev');

$edb=new edb(dbhost,dbname,dbuser,dbpass);

if(!$edb->isConnected()){
	exit('Not connected to database');
}
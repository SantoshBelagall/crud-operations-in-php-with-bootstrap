<?php
// die('hehehehe');
// error_reporting(0);
define("host", 		"localhost");
define("username", 	"root");
define("password", 	"");
define("dbname", 	"dbtutorial");


$db = mysql_connect(host,username,password, dbname);
mysql_select_db(dbname,$db) or die("ERROR: ".mysql_error());
?>
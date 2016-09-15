<?php




$host = "localhost";

$username = "root";

$password = "";

$db = "grocerysystem";

@mysql_connect($host,$username,$password) or die ("error");

@mysql_select_db($db) or die("error");

?>
<?php

define("_VALID_ACCESS_","1");

include_once("./includes/config.php") ;

include_once("./includes/func.php") ;

include_once("./includes/DBclass.php") ;

$id = $_GET['id'];

  $mysqlQuery=new mysqlQueryClass();

  $query="Update `products` SET `visits` =`visits` + 1 where `id` = '$id'";

      $mysqlQuery->mysqlQueryUpdate($query);

	$query="SELECT `vb` FROM `products`	WHERE `valid` = 1 AND `id`= '$id'";

	$mysqlQuery->mysqlQueryWOF($query);

      list($vbname) = mysql_fetch_array($mysqlQuery->result);

echo "<meta http-equiv='refresh' content='1; url=$vbname'>";
echo "<title>Redirecting...</title>";
print "<b>Loading....</b>";

?>
<?php
session_start();

define("_VALID_ACCESS_","1");

include_once("./includes/config.php") ;
include_once("./includes/func.php") ;
include_once("./includes/DBclass.php") ;

header('Content-Type: text/xml');
echo '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>';

$mysqlQuery=new mysqlQueryClass();

$query="SELECT `sitename`,`siteurl`,`keywords` FROM `config`";
$mysqlQuery->mysqlQuery($query);
list($sitename,$siteurl,$mainkeys)=$mysqlQuery->result;

ECHO '<rss version="2.0">'."";
ECHO "<channel>\r\n";
ECHO "<title>$sitename</title>";
ECHO "<description>$mainkeys</description>";
ECHO "<link>$siteurl</link>";

$squery="SELECT `id`, `name`,`shortdes` FROM `products` 
				WHERE `valid` = 1 ORDER BY `id` DESC LIMIT 20";
			
			$mysqlQuery->mysqlQueryWOF($squery);
while (list($id,$name,$shortdes) = mysql_fetch_array($mysqlQuery->result))
{

$cou = "count-$id.html";

    
ECHO "<item>";
ECHO "<title>$name</title>";
ECHO "<description>$shortdes</description>";
ECHO "<link>$siteurl/$cou</link>";
ECHO "</item>";
}
ECHO "</channel>";
ECHO "</rss>";
?> 
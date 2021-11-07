<?
session_start();

define("_VALID_ACCESS_","1");

include_once("./includes/config.php") ;
include_once("./includes/func.php") ;
include_once("./includes/DBclass.php") ;


$mysqlQuery=new mysqlQueryClass();

$query="SELECT `sitename`,`siteurl`,`keywords`, `pagesnum`,`style`,`forum` FROM `config`";
$mysqlQuery->mysqlQuery($query);
list($sitename,$siteurl,$mainkeys,$pagesnum,$style,$forumurl)=$mysqlQuery->result;

define("_SITE_TITLE_",$sitename);
define("_SITE_URL_",$siteurl);

$allkeys=$mainkeys." , ";

$query="SELECT `words` from `products` where `valid` = 1 ";
$mysqlQuery->mysqlQueryWOF($query);
while(list($pkeys)=mysql_fetch_array($mysqlQuery->result))
{
$allkeys .=$pkeys;	
}




include_once("./main.php");
include_once("./catpages.php");
include_once("./cats.php");
include_once("./friends.php");
include_once("./pages.php");


include_once("./style/index.php");
$pages1 = 1;


?>
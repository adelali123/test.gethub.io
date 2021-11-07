<?php

define("_VALID_ACCESS_","1");


include_once("./includes/config.php") ;
include_once("./includes/DBclass.php") ;
		$a =0;
		
    $mysqlQuery=new mysqlQueryClass();
    
    $query="SELECT `id`, `name` FROM `catagories` WHERE `level` = 1";
		$mysqlQuery->mysqlQueryWOF($query);
		
      $cats .= "<span style='color:#AAAAAA;'>|</span>&nbsp;"; 
      
			while (list($id,$name) = mysql_fetch_array($mysqlQuery->result)) 
			{					
      $cats .= "<a href='cat-$id.html' class='font_m'>$name</a>&nbsp;<span style='color:#AAAAAA;'>|</span>&nbsp;";  
			}
			
?>


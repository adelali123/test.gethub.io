<?php

/************************************************************************
************************ OnILINE & VISITS ************************************
************************************************************************************/

/**** VISITS ***/

$query="UPDATE `config` SET `visits` = `visits`+1 WHERE `id` = 1 ";
$mysqlQuery->mysqlQueryUpdate($query);
$query="SELECT `visits` FROM `config` WHERE `id` = 1";
$mysqlQuery->mysqlQuery($query);
list($visits) = $mysqlQuery->result;

/**** VISITS ***/

$query="SELECT * FROM `products` ";
$mysqlQuery->mysqlQueryWOF($query);
$Allc =$mysqlQuery->resultNoRows;


##################### ADS ADS ADS ADS #################


//if($Isindex == 1){$atype = 2;}else{$atype=3;}

$Squery="SELECT `id`, `name`, `link`, `photo` FROM `banners` WHERE `type` = 1 ORDER BY Rand() LIMIT 0,1 ";
 $mysqlQuery->mysqlQueryWOF($Squery);
while (list($sbid2,$sname2,$slink2,$sphoto2) = mysql_fetch_array($mysqlQuery->result))
{
$topban .= "<a href='$slink2' target='_blank'><img src='./images/banners/$sphoto2' border='0'";
$topban .="width = 468";
$topban .="highet = 60";
$topban .=" alt='$sname2' title='$sname2'></a><br /><br />";
}

##################### ADS ADS ADS ADS #################

?>

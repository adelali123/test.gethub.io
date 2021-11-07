<?
if (!defined("_VALID_ACCESS_") || _VALID_ACCESS_ !=1) {
	die("Foot Bokra");
}

echo '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML dir=rtl>';

$mysqlQuery=new mysqlQueryClass();

$action=addslashes($_GET[action]);

switch ($action)
{

/**********************************************************************************************
- Search - Search - Search - Search - Search - Search - Search - Search - Search - Search
**********************************************************************************************/

case "search" :
		$title = " البحث في الموقع ";
$align="center";
        $psearch = $_POST['keyword'];
        {

 if(empty($psearch)){ 
			$main="<td height='195' valign='top'><center> يجب عليك كتابة كلمة للبحث عنها <br /> <br>
             <a href='index.php'><div onMouseOver='turn_off(this);' onmouseout='turn_on(this);' class='back'><b> عـــودة </b></div> </a></center><br /></center></td>"; }
        else
           {
        $query="SELECT `id`, `name`, `visits`, `shortdes`, `photo` FROM `products`
         WHERE  `name` LIKE '%$psearch%' OR `shortdes` LIKE '%$psearch%' ANd  `valid` = 1 ORDER BY `id` DESC";

        $mysqlQuery->mysqlQueryWOF($query);
$nor = 0; 
        if ($mysqlQuery->resultNoRows!=0)
          {
           $counter=1;
          $main .= "<td  valign='top'><div align='center'> نتيجة بحث المقالات عن  $psearch <br /></div><br />
           <table width='90%' align='center' class='content' border='0' cellspacing='3' cellpadding='3'>              
            
              <tr> <td colspan='6'> </td></tr></td>
                ";
            			while (list($prodId,$name,$visits,$shortdes,$photo) = mysql_fetch_array($mysqlQuery->result)) {
            	$name=substr($name,0,40);
				 if ($nor % 4 == 0) {
				   $main .= '</tr><tr>';
				   }

						$main .="<td style='border: 0px none ; margin: 0px; padding: 0px; width: 240px;' align='center' valign='top'>
		   <div style='margin-bottom: 10px;'>				
<table style='background: transparent url(style/$style/images/block_background.jpg) repeat-x scroll left top; -moz-background-clip: border; -moz-background-origin: padding; -moz-background-inline-policy: continuous; width: 230px; height: 100%; font-family: tahoma; font-style: normal; font-variant: normal; font-weight: normal; font-size: 14px; line-height: normal; font-size-adjust: none; font-stretch: normal; -x-system-font: none;' border='0' cellpadding='0' cellspacing='0'>
	<tbody>
		<tr>
			<td style='background: transparent url(style/$style/images/top_background.jpg) no-repeat scroll left center; -moz-background-clip: border; -moz-background-origin: padding; -moz-background-inline-policy: continuous;' align='center' height='35'>
				<a style='text-decoration: none; font-family: tahoma; font-size: 10pt; font-weight: bold; color: #222222;' href='t$prodid-$name.html'><div style='overflow: hidden; width: 230px;'>
					$name
				</div></a>
			</td>
		</tr>
		<tr>
			<td align='center'>
				<a href='count-$prodId.html'>
			<img src='$photo' style='border: 0px none ; margin: 0pt; padding: 0pt; vertical-align: middle;' border='0' width='220' height='170'></a>
				<div dir='rtl' style='margin: 0pt; padding: 0pt; background: #FFFFFF none repeat scroll 0% 0%; overflow: scroll; -moz-background-clip: border; -moz-background-origin: padding; -moz-background-inline-policy: continuous; height: 65px; width: 220px; text-align: center; font-family: tahoma; font-size: 10pt; font-weight: bold; color: #333333;'>$shortdes</div>
			</td>
		</tr>
		<tr valign='top'>
			<td style='background: transparent url(style/$style/images/footer_background.jpg) no-repeat scroll left center; -moz-background-clip: border; -moz-background-origin: padding; -moz-background-inline-policy: continuous;' align='center' height='35'>
			<a class='dlink' href='count-$prodId.html'>
				<div class='download'>
				
				<br>
					  التحميل :  $visits
					</div></a>
				
			</td>
		</tr>
	</tbody>
</table></div></td>";
						$counter++;	  
				   		      $nor++;  
					}
					

          $main .= ("</table> <br />");
          }
          else
            {
            $main .="<td height='195' valign='top'><br><br><center> لا توجد نتائج للبحث<br /> <br>
             <a href='index.php'><div onMouseOver='turn_off(this);' onmouseout='turn_on(this);' class='back'><b> عـــودة </b></div> </a></center><br /><br /><td>";
            }
        }

$main .="</ul></div>";


break;



}
       
		break;
		
/*********************************************************************************************
Cats - Cats - Cats - Cats - Cats - Cats - Cats - Cats - Cats - Cats - Cats - Cats - Cats - 
*********************************************************************************************/


case "viewCat" :
$align="right";
$amysqlQuery=new mysqlQueryClass();


$catId=$_GET['catId'];
If (!is_numeric($catId)) {die("Foot Bokra");}

$pquery=("SELECT COUNT(`id`) AS `c` FROM `products` WHERE `valid` = 1 AND `catid` = '$catId'");
$mysqlQuery->mysqlQueryWOF($pquery);

extract(mysql_fetch_array($mysqlQuery->result));
$limit = $pagesnum;
$start = $_GET['start'];
if(!isset($start)) $start = 0;
$num_pages = ceil($c/$limit);

$squery="SELECT `id`, `name`,`photo`,`shortdes`, `vb`,`visits` FROM `products` 
				WHERE `valid` = 1 AND `catid` ='$catId' ORDER BY `id` DESC LIMIT $start, $limit";
			
			$mysqlQuery->mysqlQueryWOF($squery);
			
			
			$tquery="SELECT `name` FROM `catagories` 
				WHERE `level` = 1 AND `id` ='$catId' LIMIT 1";
			
			$amysqlQuery->mysqlQueryWOF($tquery);
			
				list($catname)= mysql_fetch_array($amysqlQuery->result);
				$title = $catname;
				
			 $counter = 1 + $start  ;			
$nor = 0; 
      if ($mysqlQuery->resultNoRows!=0) {
      while(list($id,$name,$photo,$shortdes,$vbname,$visits) = mysql_fetch_array($mysqlQuery->result)){
		    	
     if ($nor % 4 == 0) {
        $main .= '</tr><tr>';
                  }  
				  
						$main .="<td style='border: 0px none ; margin: 0px; padding: 0px; width: 240px;' align='center' valign='top'>
		   <div style='margin-bottom: 10px;'>				
<table style='background: transparent url(style/$style/images/block_background.jpg) repeat-x scroll left top; -moz-background-clip: border; -moz-background-origin: padding; -moz-background-inline-policy: continuous; width: 230px; height: 100%; font-family: tahoma; font-style: normal; font-variant: normal; font-weight: normal; font-size: 14px; line-height: normal; font-size-adjust: none; font-stretch: normal; -x-system-font: none;' border='0' cellpadding='0' cellspacing='0'>
	<tbody>
		<tr>
			<td style='background: transparent url(style/$style/images/top_background.jpg) no-repeat scroll left center; -moz-background-clip: border; -moz-background-origin: padding; -moz-background-inline-policy: continuous;' align='center' height='35'>
				<a style='text-decoration: none; font-family: tahoma; font-size: 10pt; font-weight: bold; color: #222222;' href='t$id-$name.html'><div style='overflow: hidden; width: 230px;'>
					$name
				</div></a>
			</td>
		</tr>
		<tr>
			<td align='center'>
				<a href='count-$id.html'>
			<img src='$photo' style='border: 0px none ; margin: 0pt; padding: 0pt; vertical-align: middle;' border='0' width='220' height='170'></a>
				<div dir='rtl' style='margin: 0pt; padding: 0pt; background: #FFFFFF none repeat scroll 0% 0%; overflow: scroll; -moz-background-clip: border; -moz-background-origin: padding; -moz-background-inline-policy: continuous; height: 65px; width: 220px; text-align: center; font-family: tahoma; font-size: 10pt; font-weight: bold; color: #333333;'>$shortdes</div>
			</td>
		</tr>
		<tr valign='top'>
			<td style='background: transparent url(style/$style/images/footer_background.jpg) no-repeat scroll left center; -moz-background-clip: border; -moz-background-origin: padding; -moz-background-inline-policy: continuous;' align='center' height='35'>
			
				<div class='cname'>
				<a class='clink' href='cat-$catId.html'>
				$catname
				</a>
				<br>
				<div class='download'><a class='dlink' href='count-$id.html'>
					  التحميل :  $visits
					</a></div>
				
			</td>
		</tr>
	</tbody>
</table></div></td>
	  ";
				   			$counter++;	  
				   		      $nor++;  

			}			
			}
			else{
			$main .="<td valign='top'><center><div align=center>لا يوجد اى مقالات فى هذا القسم !</div></center><td>";
			}
						$current = ($start/$limit)+1;

break;

/**********************************************************************************************
- Default - Default - Default - Default - Default - Default - Default - Default - Default -
**********************************************************************************************/

default:
$align="right";
$title = $sitename;
$amysqlQuery=new mysqlQueryClass();

$pquery=("SELECT COUNT(`id`) AS `c` FROM `products` WHERE `valid` = 1 AND `sticky` = 2");
$mysqlQuery->mysqlQueryWOF($pquery);

extract(mysql_fetch_array($mysqlQuery->result));
$limit1 = $pagesnum;
$start = $_GET['start'];
if(!isset($start)) $start = 0;
$num_pages = ceil($c/$limit1);

$squery="SELECT `id`, `name`,`photo`,`shortdes`, `vb`,`visits`,`catid` FROM `products` 
				WHERE `valid` = 1 AND `sticky` = 2 ORDER BY `id` DESC LIMIT $start, $limit1";
			
			$mysqlQuery->mysqlQueryWOF($squery);

			 $counter = 1 + $start  ;			
       $nor = 0; 
      if ($mysqlQuery->resultNoRows!=0) {
      while(list($id,$name,$photo,$shortdes,$vbname,$visits,$catId) = mysql_fetch_array($mysqlQuery->result)){
		    	
				$tquery="SELECT `name` FROM `catagories` 
				WHERE `level` = 1 AND `id` ='$catId' LIMIT 1";
			
			$amysqlQuery->mysqlQueryWOF($tquery);
			
				list($catname)= mysql_fetch_array($amysqlQuery->result);
				
     if ($nor % 4 == 0) {
        $main .= '</tr><tr>';
                  }  
				  
						$main .="<td style='border: 0px none ; margin: 0px; padding: 0px; width: 240px;' align='center' valign='top'>
		   <div style='margin-bottom: 10px;'>				
<table style='background: transparent url(style/$style/images/block_background.jpg) repeat-x scroll left top; -moz-background-clip: border; -moz-background-origin: padding; -moz-background-inline-policy: continuous; width: 230px; height: 100%; font-family: tahoma; font-style: normal; font-variant: normal; font-weight: normal; font-size: 14px; line-height: normal; font-size-adjust: none; font-stretch: normal; -x-system-font: none;' border='0' cellpadding='0' cellspacing='0'>
	<tbody>
		<tr>
			<td style='background: transparent url(style/$style/images/top_background.jpg) no-repeat scroll left center; -moz-background-clip: border; -moz-background-origin: padding; -moz-background-inline-policy: continuous;' align='center' height='35'>
				<a style='text-decoration: none; font-family: tahoma; font-size: 10pt; font-weight: bold; color: #222222;' href='t$id-$name.html'><div style='overflow: hidden; width: 230px;'>
					$name
				</div></a>
			</td>
		</tr>
		<tr>
			<td align='center'>
				<a href='count-$id.html'>
			<img src='$photo' style='border: 0px none ; margin: 0pt; padding: 0pt; vertical-align: middle;' border='0' width='220' height='170'></a>
				<div dir='rtl' style='margin: 0pt; padding: 0pt; background: #FFFFFF none repeat scroll 0% 0%; overflow: scroll; -moz-background-clip: border; -moz-background-origin: padding; -moz-background-inline-policy: continuous; height: 65px; width: 220px; text-align: center; font-family: tahoma; font-size: 10pt; font-weight: bold; color: #333333;'>$shortdes</div>
			</td>
		</tr>
		<tr valign='top'>
			<td style='background: transparent url(style/$style/images/footer_background.jpg) no-repeat scroll left center; -moz-background-clip: border; -moz-background-origin: padding; -moz-background-inline-policy: continuous;' align='center' height='35'>
			
				<div class='cname'>
				<a class='clink' href='cat-$catId.html'>
				$catname
				</a>
				<br>
				<div class='download'><a class='dlink' href='count-$id.html'>
					  التحميل :  $visits
					</a></div>
				
			</td>
		</tr>
	</tbody>
</table></div></td>";
				   			$counter++;	  
				   		      $nor++;  

			}			
			}
			else{
			$main .="<td valign='top'><center><div align=center>لا يوجد اى مقالات فى هذا القسم !</div></center><td>";
			}
						$current = ($start/$limit1)+1;
			
/*****************************************************************************************************
- Sticky - Sticky - Sticky - Sticky - Sticky - Sticky - Sticky - Sticky - Sticky - Sticky - Sticky -
*****************************************************************************************************/
$amysqlQuery=new mysqlQueryClass();

$pquery=("SELECT COUNT(`id`) AS `c` FROM `products` WHERE `sticky` = 1");
$mysqlQuery->mysqlQueryWOF($pquery);

extract(mysql_fetch_array($mysqlQuery->result));

$squery="SELECT `id`, `name`,`photo`,`shortdes`, `vb`,`visits`,`catid` FROM `products` 
				WHERE `sticky` = 1 ORDER BY `id` DESC";
			
			$mysqlQuery->mysqlQueryWOF($squery);

			 $counter = 1 + $start  ;			
       $nor = 0; 
      if ($mysqlQuery->resultNoRows!=0) {
      while(list($id,$name,$photo,$shortdes,$vbname,$visits,$catId) = mysql_fetch_array($mysqlQuery->result)){
		    	
				$tquery="SELECT `name` FROM `catagories` 
				WHERE `level` = 1 AND `id` ='$catId' LIMIT 1";
			
			$amysqlQuery->mysqlQueryWOF($tquery);
			
				list($catname)= mysql_fetch_array($amysqlQuery->result);
				
     if ($nor % 4 == 0) {
        $sticky .= '</tr><tr>';
                  }  
				  
						$sticky .="<td style='border: 0px none ; margin: 0px; padding: 0px; width: 240px;' align='center' valign='top'>
		   <div style='margin-bottom: 10px;'>				
<table style='background: transparent url(style/$style/images/block_background.jpg) repeat-x scroll left top; -moz-background-clip: border; -moz-background-origin: padding; -moz-background-inline-policy: continuous; width: 230px; height: 100%; font-family: tahoma; font-style: normal; font-variant: normal; font-weight: normal; font-size: 14px; line-height: normal; font-size-adjust: none; font-stretch: normal; -x-system-font: none;' border='0' cellpadding='0' cellspacing='0'>
	<tbody>
		<tr>
			<td style='background: transparent url(style/$style/images/top_background.jpg) no-repeat scroll left center; -moz-background-clip: border; -moz-background-origin: padding; -moz-background-inline-policy: continuous;' align='center' height='35'>
				<a style='text-decoration: none; font-family: tahoma; font-size: 10pt; font-weight: bold; color: #222222;' href='t$id-$name.html'><div style='overflow: hidden; width: 230px;'>
					$name
				</div></a>
			</td>
		</tr>
		<tr>
			<td align='center'>
				<a href='count-$id.html'>
			<img src='$photo' style='border: 0px none ; margin: 0pt; padding: 0pt; vertical-align: middle;' border='0' width='220' height='170'></a>
				<div dir='rtl' style='margin: 0pt; padding: 0pt; background: #FFFFFF none repeat scroll 0% 0%; overflow: scroll; -moz-background-clip: border; -moz-background-origin: padding; -moz-background-inline-policy: continuous; height: 65px; width: 220px; text-align: center; font-family: tahoma; font-size: 10pt; font-weight: bold; color: #333333;'>$shortdes</div>
			</td>
		</tr>
		<tr valign='top'>
			<td style='background: transparent url(style/$style/images/footer_background.jpg) no-repeat scroll left center; -moz-background-clip: border; -moz-background-origin: padding; -moz-background-inline-policy: continuous;' align='center' height='35'>
			
			<div class='cname'>
				<a class='clink' href='cat-$catId.html'>
				$catname
				</a>
				<br>
				<div class='download'><a class='dlink' href='count-$id.html'>
					  التحميل :  $visits
					</a></div>
				
			</td>
		</tr>
	</tbody>
</table></div></td>";
				   			$counter++;	  
				   		      $nor++;  

			}			
			}
			else{
			$sticky .="<td valign='top'><center><div align=center>لا يوجد مقالات مثبته حتي الان !</div></center><td>";
			}

break;
/***********************************************************************************************
- 404 - 404 - 404 - 404 - 404 - 404 - 404 - 404 - 404 - 404 - 404 - 404 - 404 - 404 - 404 - 404
************************************************************************************************/
case "404" :
$align="center";
$title = "خطأ 404 - Error 404";
$main .= "<td  valign='top'><center><br><br><font size='5' color='#FF0000'><b>
		   عفوا الصفحة المطلوبة غير موجودة
		   </b></font>
		  <br>
		  <br>
		  <br>
		  <img src='./style/$style/images/404.gif'>
		  <br>
		  <font size='4' color='#0000FF'> يمكنك استخدام خاصية البحث في الموقع </font>
		  	<div id='search' style='width: 300px; height: 45px'>
	<form action='index.php?action=search' method='post'> 
	<br>
	<br>
	<center>
		<input name='keyword' type='text' tabindex='1' size='24' style='text-align: right;'>
		 <input type='submit' value='ابحث' tabindex='1' class='input_button'>
		 </center>
	</form></div></center></td>";

break;
/***********************************************************************************************
- 403 - 403 - 403 - 403 - 403 - 403 - 403 - 403 - 403 - 403 - 403 - 403 - 403 - 403 - 403 - 403
************************************************************************************************/
case "403" :

$align="center";
$title = "خطأ 403 - Error 403";
//البريد الذي سوف يستقبل رسائل خطأ 403
$myemail="$from";

//إسم دومين موقعك كامل ... لا تضغ / في النهايه
$websiteaddress="$siteurl";

$emailsubject="hacking";

$thedatetime=date("l")." ".date("F")." ".date("j")." ".date("Y")." - ".date("g").":".date("i").":".date("s")." ".date("A");
$userip=getenv("REMOTE_ADDR");

$useragent=getenv("HTTP_USER_AGENT");

$requestedfile=$websiteaddress.getenv("REQUEST_URI");

$referrerpage=getenv("HTTP_REFERER");

$emailmessage="Error 404 Report\r\nDate/Time: ".$thedatetime."\r\nIP Address: ".$userip."\r\nUser agent: ".$useragent."\r\nRequest page that doesn't exists: ".$requestedfile."\r\nReferrer page that contains the broken link: ".$referrerpage;

mail($myemail, $emailsubject, $emailmessage, "From: ".$myemail);

$main .= "<td  valign='top'><center><br><br><font size='5' color='#FF0000'><b>
		   عفوا انت لا تملك الصلاحية للدخول الي هذه المنطقة
		   </b></font>
		  <br>
		  <br>
		  <br>
		  <img src='./style/$style/images/403.gif'>
		  <br>
		  <font color='#0000FF'><b>Your IP IS </b>
		  <b><i>$userip</i></b></font>
		  <br>
		  <br>
		  <b><i><u> IF You're Trying To Hack This System You'll Be In Jail SooN </u></i></b></font>
		  
		  </center></td>";

break;
/***********************************************************************************************
- topic - topic - topic - topic - topic - topic - topic - topic - topic - topic - topic - topic-
************************************************************************************************/
case "topic" :
$align="center";
$id = intval($_GET['id']);
$name = $_GET['name'];

  $mysqlQuery=new mysqlQueryClass();
  
  $query="Update `products` SET `visits` =`visits` + 1 where `id` = '$id'";
      $mysqlQuery->mysqlQueryUpdate($query);

	$query="SELECT `name`, `photo`, `shortdes`, `vb`, `catid` FROM `products`	WHERE `valid` = 1 AND `id`= '$id'";
	
	$mysqlQuery->mysqlQueryWOF($query);
	
      list($name,$photo,$shortdes,$vbname,$catId) = mysql_fetch_array($mysqlQuery->result);
	  $title = $name;
	  $tquery="SELECT `name` FROM `catagories` 
				WHERE `level` = 1 AND `id` ='$catId' LIMIT 1";
			
			$mysqlQuery->mysqlQueryWOF($tquery);
			
				list($catname)= mysql_fetch_array($mysqlQuery->result);

$main .= "<center><a href='random.html'><img src='style/$style/images/random.gif'></a></center>

<table width='700' style='border:1px solid #000000;' bgcolor='#FFFFFF' cellspacing='0'>
<tr>
<td valign='top'>
<center>
<font size='5'><h1><a href='cat-$catId.html'>$catname</a></h1><h2><a href='t$id-$name.html'>$name</a></h2></font><img border='0' src='$photo'  border='0' alt='$name'><font size='3'><p><b>$shortdes</b></p></font><a style='text-decoration: none; font-family: tahoma; font-size: 10pt; font-weight: bold; color: #FF0000;' href='count-$id.html'><font size='5'> تحميل</font></a>
</center>
</td>
</tr>
</table>";

break;
/***************************************************************************************************
- Random - Random - Random - Random - Random - Random - Random - Random - Random - Random - Random -
***************************************************************************************************/
case "random" :
$align="right";
$title = "تصفح عشوائي للمقالات";
$amysqlQuery=new mysqlQueryClass();

$squery="SELECT `id`, `name`,`photo`,`shortdes`, `vb`,`visits`,`catid` FROM `products` 
				WHERE `valid` = 1 ORDER BY Rand() LIMIT $pagesnum";
			
			$mysqlQuery->mysqlQueryWOF($squery);

			 $counter = 1 + $start  ;			
       $nor = 0; 
      if ($mysqlQuery->resultNoRows!=0) {
      while(list($id,$name,$photo,$shortdes,$vbname,$visits,$catId) = mysql_fetch_array($mysqlQuery->result)){
		    	
				$tquery="SELECT `name` FROM `catagories` 
				WHERE `level` = 1 AND `id` ='$catId' LIMIT 1";
			
			$amysqlQuery->mysqlQueryWOF($tquery);
			
				list($catname)= mysql_fetch_array($amysqlQuery->result);
				
     if ($nor % 4 == 0) {
        $main .= '</tr><tr>';
                  }  
				  
						$main .="<td style='border: 0px none ; margin: 0px; padding: 0px; width: 240px;' align='center' valign='top'>
		   <div style='margin-bottom: 10px;'>				
<table style='background: transparent url(style/$style/images/block_background.jpg) repeat-x scroll left top; -moz-background-clip: border; -moz-background-origin: padding; -moz-background-inline-policy: continuous; width: 230px; height: 100%; font-family: tahoma; font-style: normal; font-variant: normal; font-weight: normal; font-size: 14px; line-height: normal; font-size-adjust: none; font-stretch: normal; -x-system-font: none;' border='0' cellpadding='0' cellspacing='0'>
	<tbody>
		<tr>
			<td style='background: transparent url(style/$style/images/top_background.jpg) no-repeat scroll left center; -moz-background-clip: border; -moz-background-origin: padding; -moz-background-inline-policy: continuous;' align='center' height='35'>
				<a style='text-decoration: none; font-family: tahoma; font-size: 10pt; font-weight: bold; color: #222222;' href='t$id-$name.html'><div style='overflow: hidden; width: 230px;'>
					$name
				</div></a>
			</td>
		</tr>
		<tr>
			<td align='center'>
				<a href='count-$id.html'>
			<img src='$photo' style='border: 0px none ; margin: 0pt; padding: 0pt; vertical-align: middle;' border='0' width='220' height='170'></a>
				<div dir='rtl' style='margin: 0pt; padding: 0pt; background: #FFFFFF none repeat scroll 0% 0%; overflow: scroll; -moz-background-clip: border; -moz-background-origin: padding; -moz-background-inline-policy: continuous; height: 65px; width: 220px; text-align: center; font-family: tahoma; font-size: 10pt; font-weight: bold; color: #333333;'>$shortdes</div>
			</td>
		</tr>
		<tr valign='top'>
			<td style='background: transparent url(style/$style/images/footer_background.jpg) no-repeat scroll left center; -moz-background-clip: border; -moz-background-origin: padding; -moz-background-inline-policy: continuous;' align='center' height='35'>
			
				<div class='cname'>
				<a class='clink' href='cat-$catId.html'>
				$catname
				</a>
				<br>
				<div class='download'><a class='dlink' href='count-$id.html'>
					  التحميل :  $visits
					</a></div>
				
			</td>
		</tr>
	</tbody>
</table></div></td>";
				   			$counter++;	  
				   		      $nor++;  

			}			
			}
			else{
			$main .="<td valign='top'><center><div align=center>لا يوجد اى مقالات فى هذا القسم !</div></center><td>";
			}

break;		
}

?>


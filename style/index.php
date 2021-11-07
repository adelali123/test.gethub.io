<head>

<TITLE><? echo $title;?></TITLE>
<meta http-equiv="Pragma" content="no-cache">
<meta content="index, follow" name="robots">
<meta content="index,follow" name="Robots">
<link href="style/<?php echo $style; ?>/css/style.css" type="text/css" rel="StyleSheet">
<link rel="shortcut icon" href="favicon.png" type="image/ico">
<link rel="alternate" type="application/rss+xml" title="RSS" href="rss.php">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="keywords" content="<? echo $mainkeys ?>">
<meta name="description" content="<? echo $mainkeys ?>">
</head>
	
	<body topmargin="0" leftmargin="0" marginheight="0" marginwidth="0">

<table dir="ltr" width="100%" border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111">
	<tr>
		<td>
			<p align="center">
			<img src="style/<?php echo $style; ?>/images/header.jpg">
		</td>
	</tr>
</table>
<br>
			<?php echo "<div align='center'>$topban</div>"; ?>
			   
    
<!-- address bar -->        

					

<table style="border-collapse: collapse;" border="0" width="100%">
	<tbody>
<table align="center" height="40" border="0" cellpadding="0" cellspacing="0">
	<tr>
	<td><a href="<?php echo $siteurl; ?>/"><img src="style/<?php echo $style; ?>/images/home.jpg"></a>
	</td>
	<td><a href="<?php echo $forumurl; ?>/">
	<img src="style/<?php echo $style; ?>/images/forum.jpg"></a><a href="<?php echo $forumurl; ?>/sendmessage.php"><img src="style/<?php echo $style; ?>/images/call.jpg"></a>
	</td>
	</tr>
</table>
		<tr>
		<td align="center">
<table width="100%" height="34" border="0" cellpadding="0" cellspacing="0">
	<tr>
<div align="center">
  <center>
  </table>
  <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111">
  <tr>
    <td width="100%">
    <div align="center">
      <center>
      <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111" width="950" dir="ltr">
        <tr>
          <td><img border="0" src="style/<?php echo $style; ?>/images/el3dl_01.gif"></td>
          <td width="950" background="style/<?php echo $style; ?>/images/el3dl_02.gif">
          		<?php echo $cats; ?>	</td>
          <td><img border="0" src="style/<?php echo $style; ?>/images/el3dl_03.gif"></td>
        </tr>
      </table>
      </center>
    </div>
    </td>
  </tr>
  </table></center>	</tr>
</table>
		</td>
		</tr>
</tbody></table>

</div>
<!-- address bar -->
    <br>
    
<br>
      <table style="border-collapse: collapse;" border="0" cellpadding="0" cellspacing="0" width="100%">

        <tbody>
          <tr>
       
        <td width="100%" valign="top">
		
<table align="center" border="0" cellpadding="0" cellspacing="0">
	<tbody>
	<?
		 if($_GET['action'] == "viewCat"){
            echo "";
			}elseif($_GET['action'] == "topic"){
			echo "";
			}elseif($_GET['action'] == "404"){
			echo "";
			}elseif($_GET['action'] == "403"){
			echo "";
			}elseif($_GET['action'] == "search"){
			echo "";
			}elseif($_GET['action'] == "random"){
			echo "";
			}else{
?>
		<tr>
		<td>
		
		<img src="style/<?php echo $style; ?>/images/sticky.jpg"><br><br>
		</td>
	</tr>
	<tr>
		<td dir="rtl">
		 <table border="0" cellspacing="0">
		 <tbody><tr>
		 
		<?php echo $sticky; ?>
		
		 </tr>
		 </tbody></table> 
		</td>	
	</tr>
		<? } ?>
	<tr>
		<td>
		
		<img src="style/<?php echo $style; ?>/images/main.jpg"><br><br>
		</td>
	</tr>
	<tr>
		<td dir="rtl" align="<?php echo $align; ?>">
		 <table border="0" cellspacing="0">
		 <tbody><tr>
		 
		<?php echo $main; ?>
		
		 </tr>
		 </tbody></table> 
				<table border="0" cellpadding="2" cellspacing="0" align="center">
					<tbody><tr>
								 
						
<?
		 if($_GET['action'] == "viewCat"){
            echo "$catpages<br>";
            }elseif($_GET['action'] == "random"){
            echo "<br>";
			}else{
			echo "$pages<br>";
            }
            
?>
						
						
					</tr>
				</tbody></table>
		</td>
	</tr>
</tbody>
</table>
         <br>
         </td>
                 
  
        </tr>
        </tbody>
        </table>
<div align="center">
  <center>
<table dir="ltr" width="950" height="32" border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#111111">
	<tr>
		<td align="center" width="5" height="32">
			<img border="0" src="style/<?php echo $style; ?>/images/fo_01.gif"></td>
		<td background="style/<?php echo $style; ?>/images/fo_02.gif" align="center" width="929" height="32">
			<font style="FONT-SIZE: 9pt" face="Tahoma"><font color="#FFFFFF">
            Copyright&nbsp; 2010</font> </font>
            <font face="Tahoma" color="#014670">
            <span lang="en-us">
            <a style="TEXT-DECORATION: none" href="http://www.wadi-mousa.net">
            <font color="#E0CA0F" style="font-size: 9pt">wadi-mousa.net</font></a></span></font><font style="FONT-SIZE: 9pt" face="Tahoma" color="#FFFFFF">. 
            All rights reserved</font></td>
		<td align="center" width="16" height="32">
			<img border="0" src="style/<?php echo $style; ?>/images/fo_03.gif"></td>
	</tr>
</table>
  </center>
</div>
</body></html>
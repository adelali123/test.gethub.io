<?php
if (!defined("_VALID_ACCESS_") || _VALID_ACCESS_ !=1) {
	die("Foot Bokra");
}
/*database connection details*/
define("_DATA_BASE_HOST_","sql308.eb2a.com") ;
define("_DATA_BASE_NAME_","eb2a_5374404_arab") ; //ضع هنا اسم قاعدة اليبانات
define("_DATA_BASE_USER_","eb2a_5374404") ; //ضع هنا اسم مسخدم قاعدة البيانات
define("_DATA_BASE_BASSWORD_","qossi200") ; //ضع هنا كلمة مرور مستخدم قاعدة البيانات
/*database connection details*/

/* upload configuration */
$exts=".jpg-.gif-.jpeg-.bmp-.png"; // الامتدادات

$from ="admin@localhost";

$maxs="2"; // اقصي حجم للمفات المرفوعة بالميجا بايت

$path="../images/products/"; // مسار مجلد الصور الخاصة بالمنتجات اتركه ولا تعدله 

$truepath='D:\xampp\htdocs\ads\images\products/'; // مسار مجلد الصور الخاصة بالمنتجات اتركه ولا تعدله 

$Bpath="../images/banners/"; 

$Btruepath='D:\xampp\htdocs\ads\images\banners/'; // مسار مجلد الصور الخاصة بالإعلانات اتركه ولا تعدله 


?>
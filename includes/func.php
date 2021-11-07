<?
if (!defined("_VALID_ACCESS_") || _VALID_ACCESS_ !=1) {
	die("Foot Bokra");
}

function mod_rewrite( $request, $array_delim, $pair_delim )
{
global $_GET, $HTTP_GET_VARS, $_REQUEST;
$value_pairs = explode( $array_delim, $request );
$make_global = array();

foreach( $value_pairs as $pair )
{
$pair = explode( $pair_delim, $pair );
$_GET[$pair[0]] = $pair[1];
$_REQUEST[$pair[0]] = $pair[1];
$HTTP_GET_VARS[$pair[0]] = $pair[1];
}
}

function refresh($act) {
$refresh="<meta http-equiv='refresh' content='1; url=admin.php?action=$act'>";
return $refresh;
}

function refreshm($act) {
$refresh="<meta http-equiv='refresh' content='1; url=index.php?action=$act'>";
return $refresh;
}

function refreshvb($act) {
$refresh="<meta http-equiv='refresh' content='1; url=$act'>";
return $refresh;
}

function Hawythumb($tpath,$fpath,$new_w,$new_h){
	$system=explode('.',$tpath);
	
	if (preg_match('/jpg|jpeg/',$system[1])){
		$src_img=imagecreatefromjpeg($tpath);
	}elseif(preg_match('/png/',$system[1])){
		$src_img=imagecreatefrompng($tpath);
	}else{
		$src_img=imagecreatefromgif($tpath);
	}
	
	
	$old_x=imageSX($src_img);
	$old_y=imageSY($src_img);

	if ($old_x > $old_y) {
		$thumb_w=$new_w;
		$thumb_h=$old_y*($new_h/$old_x);
	}
	
	if ($old_x < $old_y) {
		$thumb_w=$old_x*($new_w/$old_y);
		$thumb_h=$new_h;
	}
	
	if ($old_x == $old_y) {
		$thumb_w=$new_w;
		$thumb_h=$new_h;
	}
	
	$dst_img=ImageCreateTrueColor($thumb_w,$thumb_h);
	imagecopyresampled($dst_img,$src_img,0,0,0,0,$thumb_w,$thumb_h,$old_x,$old_y); 

	if (preg_match("/png/",$system[1])){
		imagepng($dst_img,$fpath); 
	}elseif(preg_match('/jpg|jpeg/',$system[1])){
		imagejpeg($dst_img,$fpath); 
	}else{
		imagegif($dst_img,$fpath);
	}

	imagedestroy($dst_img); 
	imagedestroy($src_img); 
}

function error($msg) {

echo "<link type='text/css' href='./style/style.css' rel='stylesheet' />
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
<div class='content'><center> <a  href='./index.php'>$msg</a></center>";
exit();
}


function GetDay($time)
{
	$EngDay = @date("D", $time);

	switch($EngDay) 
	{
		case 'Sat':
			$Day = "السبت";
    break;

		case 'Sun':
			$Day = "الأحد";
    break;
			
		case 'Mon':
			$Day = "الاثنين";
    break;
			
		case 'Tue':
			$Day = "الثلاثاء";
    break;

		case 'Wed':
			$Day = "الأربعاء";
    break;

		case 'Thu':
			$Day = "الخميس";
    break;

		case 'Fri':
			$Day = "الجمعة";
    break;
	}
	return $Day;
}


$allcountries='

			<option value="-1">--إختر الدولة --</option><option value="EC">أذربيجان
</option><option value="BA">أفغانستان
</option><option value="PT">أمريكا
</option><option value="VU">اثيوبيا
</option><option value="KY">ارمينيا
</option><option value="AR">اروبا
</option><option value="SE">اريتيريا
</option><option value="ZM">اسبانيا
</option><option value="LV">استراليا
</option><option value="AN">استونيا

</option><option value="TW">اقليم المحيط الهندي البريطاني
</option><option value="EE">الارجنتين
</option><option value="JO">الاردن
</option><option value="FR">الارض الخضراء
</option><option value="BI">الاقاليم الجنوبية الفرنسية
</option><option value="MA">الامارات
</option><option value="NC">البانيا
</option><option value="CF">البوسنة و الهرسك
</option><option value="KW">الجزائر
</option><option value="ER">الجزر العذراء
</option><option value="KG">الجمهورية الدومنيكية
</option><option value="NO">الحمهورية الكورية
</option><option value="SV">الدنمارك
</option><option value="DE">الراس الاخضر
</option><option value="SA">السعودية
</option><option value="ZW">السويد
</option><option value="CM">الصحارى الغربية

</option><option value="UA">الصين
</option><option value="OM">العراق
</option><option value="PS">الكويت
</option><option value="MZ">المانيا
</option><option value="QA">المغرب
</option><option value="MW">النمسا
</option><option value="MG">الهند
</option><option value="LT">اليابان
</option><option value="BH">اليمن
</option><option value="MT">اليونان
</option><option value="ML">انتيغوا وبربودا
</option><option value="NL">اندورا
</option><option value="AZ">اندونيسيا
</option><option value="NI">انغولا
</option><option value="ST">اورغويه
</option><option value="SB">اوزباكستان
</option><option value="UZ">اوغاندا

</option><option value="MN">اوكادور
</option><option value="PR">اوكرانيا
</option><option value="IQ">ايران
</option><option value="GI">ايرلندا
</option><option value="MH">ايسلندا
</option><option value="CD">ايطاليا
</option><option value="GF">بابوا غينيا الجديده
</option><option value="PG">باربادوس
</option><option value="BG">باكستان
</option><option value="MU">بالو
</option><option value="BW">باناما
</option><option value="IS">بانقلادش
</option><option value="SN">باهاماز
</option><option value="SD">بحرين
</option><option value="HU">برازيل
</option><option value="AT">برتغال
</option><option value="RE">برغويه

</option><option value="TC">بركينا فاسو
</option><option value="GH">برمودا
</option><option value="EH">بروناي
</option><option value="TT">بريطانيا
</option><option value="SI">بلجيكيا
</option><option value="MX">بلغاريا
</option><option value="TH">بوتان
</option><option value="US">بوتسوانا
</option><option value="ZA">بورما
</option><option value="NP">بوروندي
</option><option value="RO">بولندا
</option><option value="BJ">بوليفيا
</option><option value="GM">بولينيزيا الفرنسيه
</option><option value="LI">بويرتو ريكو
</option><option value="LA">بيروا
</option><option value="LR">بيلاروسيا
</option><option value="GB">بيلز

</option><option value="RU">بينين
</option><option value="FM">تاجخستان
</option><option value="LC">تانزانيا
</option><option value="KZ">تايلاند
</option><option value="TJ">تايوان
</option><option value="CR">تركمستان
</option><option value="CO">تركيا
</option><option value="MO">ترينيداد و تاباغو
</option><option value="GD">تشاد
</option><option value="TZ">تشيلي
</option><option value="DK">توغو
</option><option value="AU">توفالو
</option><option value="SG">توكيلاو
</option><option value="SO">تونس
</option><option value="NZ">تونغو
</option><option value="PK">تيمور الشرقيه
</option><option value="VG">جبل طارق

</option><option value="ET">جزر الانتيل الهولندية
</option><option value="CV">جزر العذراء
</option><option value="FI">جزر القمر
</option><option value="DJ">جزر المارشال
</option><option value="VC">جزر الماريانا الشمالية
</option><option value="BD">جزر تركس وكايكوس
</option><option value="BR">جزر سليمان
</option><option value="GY">جزر فارو
</option><option value="ES">جزر فوكلاند (مالفيناس)
</option><option value="HR">جزر كايمان
</option><option value="HK">جزر كوك
</option><option value="PF">جمايكا
</option><option value="IE">جمهورية الكونغو الديقراطية
</option><option value="IT">جمهوريه افريقيا الوسطي
</option><option value="LU">جنوب افريقيا
</option><option value="UG">جورجيا
</option><option value="CA">جيبوتي

</option><option value="SK">دومونيكيا
</option><option value="KE">راواندا
</option><option value="MC">روسيا
</option><option value="PY">رومانيا
</option><option value="BO">ريونيون
</option><option value="SL">زامبيا
</option><option value="BE">زمبابوي
</option><option value="KM">ساحل العاج
</option><option value="KR">سامو
</option><option value="FJ">ساموا الامريكية
</option><option value="BB">سان مارينو
</option><option value="CL">سانت فنسنت وغرينادين
</option><option value="GL">سانت كيتس ونيفيس
</option><option value="GP">سانت لوسيا
</option><option value="CH">ساو تومي وبرينسيبي
</option><option value="FK">سايتشيلي
</option><option value="MP">سلفادور

</option><option value="GT">سلوفاكيا
</option><option value="KN">سلوفينيا
</option><option value="SZ">سنغافورة
</option><option value="DO">سنغال
</option><option value="JM">سوازيلند
</option><option value="NG">سودان
</option><option value="YE">سوريا
</option><option value="AD">سورينام
</option><option value="GN">سويسرا
</option><option value="MQ">سيراليون
</option><option value="CY">سيريلانكا
</option><option value="PA">صربيا و الجبل الاسود
</option><option value="TN">صومال
</option><option value="LY">عمان
</option><option value="WS">غابون
</option><option value="LK">غامبيا
</option><option value="NE">غانا

</option><option value="BS">غرينادا
</option><option value="VN">غواتيمالا
</option><option value="NR">غواديلوب
</option><option value="TD">غوام
</option><option value="KH">غيانا الفرنسيه
</option><option value="DM">غينيا
</option><option value="HN">غينيا
</option><option value="MV">غينيا - بيساو
</option><option value="IN">غينيا الاستواءيه
</option><option value="TK">فاتيكان
</option><option value="PH">فانواتو
</option><option value="TG">فرنسا
</option><option value="DZ">فلسطين
</option><option value="PL">فنلندا
</option><option value="PW">فيتنام
</option><option value="MM">فيجي
</option><option value="SM">فيلبين

</option><option value="BF">فينزويلا
</option><option value="AE">قبرص
</option><option value="TL">قرغيزستان
</option><option value="MR">قطر
</option><option value="AG">كازاخستان
</option><option value="BZ">كاليدونيا الجديده
</option><option value="MK">كامبوديا
</option><option value="AF">كامرون
</option><option value="CN">كرباتيا
</option><option value="KI">كرواتيا
</option><option value="AM">كندا
</option><option value="GQ">كوبا
</option><option value="CI">كوستاريكا
</option><option value="AL">كولومبيا
</option><option value="TM">كونغو
</option><option value="HT">كينيا
</option><option value="VE">لاتافيا

</option><option value="IO">لاووس
</option><option value="LB">لبنان
</option><option value="VI">لوكسمبورغ
</option><option value="IR">ليبيا
</option><option value="GW">ليبيريا
</option><option value="LS">ليتوانيل
</option><option value="AW">ليختننشتاين
</option><option value="BN">ليسوتو
</option><option value="CK">مارتينيكوي
</option><option value="BT">ماكو
</option><option value="JP">مالديف
</option><option value="CG">مالطا
</option><option value="BM">مالي
</option><option value="TR">ماليزيا
</option><option value="CZ">مدغشقر
</option><option value="EG">مصر
</option><option value="GA">مكسيك

</option><option value="SR">ملاوي
</option><option value="TV">منقوليا
</option><option value="SY">موريتانيا
</option><option value="CS">موريشيوس
</option><option value="TF">موزامبيق
</option><option value="PE">موليدافيا
</option><option value="UY">موناكو
</option><option value="FO">ميكرونيزيا
</option><option value="TO">ناميبيا
</option><option value="GU">نرويج
</option><option value="ID">نورو
</option><option value="MY">نيبال
</option><option value="MD">نيجر
</option><option value="AO">نيجيريا
</option><option value="VA">نيكارغوا
</option><option value="GE">نيوزيليندا
</option><option value="SC">هايِتي

</option><option value="NA">هندوراس
</option><option value="AS">هنغاريا
</option><option value="RW">هولندا
</option><option value="BY">هونغ كونغ
</option><option value="CU">يوغسلافيا
</option></select>
';
?>
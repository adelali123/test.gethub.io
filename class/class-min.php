
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
</head>

<?php


// كلاس احتساب الوقت

class Turn

{

var $start;
var $end;

function start(){
$start=microtime();
$start=explode(' ',$start);
$this->start=$start[1] + $start[0];
}

function end(){
$end=microtime();
$end=explode(' ',$end);
$this->end=$end[1] + $end[0];
echo " تم انشاء الصفحة في ".round($this->end-$this->start,15)." ثانية";
}
};

?>
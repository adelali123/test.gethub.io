<?php

for($limit1=0;$limit1<$num_pages;$limit1++)
{
	$s = $limit1+2;
	if($s==$current) {
$p = $_GET['start']-$pagesnum;
$pages .= "<td ><A href='p$p'><div onMouseOver='turn_off(this);' onmouseout='turn_on(this);' class='page'>&laquo; السابق</div></A></td>";  
	} 
	}


$start = $start + $pagesnum;

for($i=0;$i<$num_pages;$i++)
{
    if(strlen($pages)!=0)
    {
        $pages .= "";
    }
	$s = $i+1;
	if($s==$current) {
	$pages .= "<td ><div onMouseOver='turn_off(this);' onmouseout='turn_on(this);' class='cpage'>$s</div></td>";
	}
    elseif($i<7 && $current<=3)
    {
        $c = $i*$pagesnum;
        $pages .= "<td ><a href=\"p$c\"><div onMouseOver='turn_off(this);' onmouseout='turn_on(this);' class='page'>$s</div></a></td>";
    }
    elseif($current>3 && $i<($current+5))
    {
        if($i<$current-3 && $current<($num_pages-3))
        {
            $i = $current-3;
            $c = 0;
            $pages .= "<td ><a href=\"p$c\"><div onMouseOver='turn_off(this);' onmouseout='turn_on(this);' class='page'>1</div></a></td>";
            $pages .= "<td >...</td>";
        }
        elseif($i<$num_pages-11 && $current>=($num_pages-5))
        {
            $i = $num_pages-5;
            $c = 0;
            $pages .= "<td ><a href=\"p$c\"><div onMouseOver='turn_off(this);' onmouseout='turn_on(this);' class='page'>1</div></a></td>";
            $pages .= "<td >...</td>";
        }
        $c = $i*$pagesnum;
        if($i+1==$num_pages && $i>=5)
        {
            $name = "$num_pages";
        }
        else
        {
            $name = $i+1;
        }
        $pages .= "<td ><a href=\"p$c\"><div onMouseOver='turn_off(this);' onmouseout='turn_on(this);' class='page'>$name</div></a></td>";
    }
    else
    {
        $pages .= "<td >...</td>";
        $c = ($num_pages-1)*$pagesnum;
        $pages .= "<td ><a href=\"p$c\"><div onMouseOver='turn_off(this);' onmouseout='turn_on(this);' class='page'>$num_pages</div></a></td>";
        break;
    }
}
for($limit1=0;$limit1<$num_pages;$limit1++)
{
	$s = $limit1+1;
	if($limit1==$current) {
	 $p = $_GET['start']+$pagesnum;
$pages .= "<td ><A href='p$p'><div onMouseOver='turn_off(this);' onmouseout='turn_on(this);' class='page'>التالي &raquo;</div></A></td>";  
	} 
	}
			
?>
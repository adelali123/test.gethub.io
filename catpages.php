<?php

for($limit=0;$limit<$num_pages;$limit++)
{
	$s = $limit+2;
	if($s==$current) {
$p = $_GET['start']-$pagesnum;
$catpages .= "<td ><A href='cat-$catId-p$p'><div onMouseOver='turn_off(this);' onmouseout='turn_on(this);' class='page'>&laquo; السابق</div></A></td>";  
	} 
	}


$start = $start + $pagesnum;

for($i=0;$i<$num_pages;$i++)
{
    if(strlen($catpages)!=0)
    {
        $catpages .= "";
    }
	$s = $i+1;
	if($s==$current) {
	$catpages .= "<td ><div onMouseOver='turn_off(this);' onmouseout='turn_on(this);' class='cpage'>$s</div></td>";
	}
    elseif($i<7 && $current<=3)
    {
        $c = $i*$pagesnum;
        $catpages .= "<td ><a href=\"cat-$catId-p$c\"><div onMouseOver='turn_off(this);' onmouseout='turn_on(this);' class='page'>$s</div></a></td>";
    }
    elseif($current>3 && $i<($current+5))
    {
        if($i<$current-3 && $current<($num_pages-3))
        {
            $i = $current-3;
            $c = 0;
            $catpages .= "<td ><a href=\"cat-$catId.html\"><div onMouseOver='turn_off(this);' onmouseout='turn_on(this);' class='page'>1</div></a></td>";
            $catpages .= "<td >...</td>";
        }
        elseif($i<$num_pages-11 && $current>=($num_pages-5))
        {
            $i = $num_pages-5;
            $c = 0;
            $catpages .= "<td ><a href=\"cat-$catId.html\"><div onMouseOver='turn_off(this);' onmouseout='turn_on(this);' class='page'>1</div></a></td>";
            $catpages .= "<td >...</td>";
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
        $catpages .= "<td ><a href=\"cat-$catId-p$c\"><div onMouseOver='turn_off(this);' onmouseout='turn_on(this);' class='page'>$name</div></a></td>";
    }
    else
    {
        $catpages .= "<td >...</td>";
        $c = ($num_pages-1)*$pagesnum;
        $catpages .= "<td ><a href=\"cat-$catId-p$c\"><div onMouseOver='turn_off(this);' onmouseout='turn_on(this);' class='page'>$num_pages</div></a></td>";
        break;
    }
}
for($limit=0;$limit<$num_pages;$limit++)
{
	$s = $limit+1;
	if($limit==$current) {
	 $p = $_GET['start']+$pagesnum;
$catpages .= "<td ><A href='cat-$catId-p$p'><div onMouseOver='turn_off(this);' onmouseout='turn_on(this);' class='page'>التالي &raquo;</div></A></td>";  
	} 
	}
			
?>
<?

class mysqlQueryClass {
	var $result,$resultNoRows;

	function dbConnect(){
		$dbConnect=mysql_pconnect(_DATA_BASE_HOST_, _DATA_BASE_USER_, _DATA_BASE_BASSWORD_)
		or die(mysql_error());

		mysql_select_db(_DATA_BASE_NAME_)
		or die(mysql_error());

		return $dbConnect;
	}

	function dbClose($resultOfQuery, $dbConnect){
		mysql_free_result($resultOfQuery)
		or die(mysql_error());

		mysql_close($dbConnect)
		or die(mysql_error());
	}
	
	function dbCloseWOF($dbConnect){
		mysql_close($dbConnect)
		or die(mysql_error());
	}

	function mysqlQuery($query){
		$dbConnect=$this->dbConnect();
		
		$resultOfQuery=mysql_query($query)
		or die(mysql_error());

		$this->result=mysql_fetch_array($resultOfQuery);

		$this->resultNoRows=mysql_num_rows($resultOfQuery);

		$dbclose=$this->dbClose($resultOfQuery, $dbConnect);
	}
	
	function mysqlQueryWOF($query){
		$dbConnect=$this->dbConnect();

		$resultOfQuery=mysql_query($query)
		or die(mysql_error());

		$this->result=$resultOfQuery;

		$this->resultNoRows=mysql_num_rows($resultOfQuery);

		$dbclose=$this->dbCloseWOF($dbConnect);
	}
	
	function mysqlQueryUpdate($query){
		$dbConnect=$this->dbConnect();

		$resultOfQuery=mysql_query($query)
		or die(mysql_error());

		$dbclose=$this->dbCloseWOF($dbConnect);
	}

	function esc($clean)
	{
		if(@version_compare(@phpversion(), "4.3.0") == "-1") 
		{
			$out = @mysql_escape_string(trim($clean));
		}
		else
		{
			$out = @mysql_real_escape_string(trim($clean));
		}
		return $out;
	}


}


class random {
var $salt = '';
var $salt_lower = "abcdefghijklmnopqrstuvwxyz";
var $salt_upper = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
var $salt_number = "0123456789";
function random($what, $n)
{
if (preg_match ("/l/", $what))
$this->salt .= $this->salt_lower;

if (preg_match ("/u/", $what))
$this->salt .= $this->salt_upper;

if (preg_match ("/n/", $what))
$this->salt .= $this->salt_number;

if ($this->salt !== '') {
$this->salt = str_shuffle($this->salt);
$this->salt = substr($this->salt, 0, $n);

}
}
}

    class upload 
    {
     
     var $up ;
     var $error ;
     var $ext;
     function upload($code,$exts,$maxs,$path,$truepath,$thumb,$twidth,$theight) { 
     
      /* Constants */   
      $sec_path=substr($path,3);
      /* Constants */
      
      /* Config */ 
      
      $vexts=explode('-',$exts) ;
      $msize= ($maxs*1024)*1024 ; 
      $new_w=$twidth ; 
      $new_h=$theight ;
      $dngr= array('text/html','text/plain','application/xhtml+xml','application/x-php','text/php',
                   'application/x-httpd-php','application/x-javascript');        
      /* Config */
     
      /* attributes */
      $file_name=str_replace(" ","-",$_FILES['fileup']['name']);
      $filetype=$_FILES['fileup']['type'];
      $filesize=$_FILES['fileup']['size'];
      $error   =$_FILES['fileup']['error'];
      $this->error = $error;
      $fileext=strtolower(strrchr($file_name,'.')) ;
      $this->ext = $fileext;
      /* attributes */
      
      /* generate new files names */
      
      $filename=$code.$fileext;
      $fpath=$path.$filename;

      if($thumb == "T" ) {
      $thname="thmb_".$code.$fileext;
      $tpath=$path."thumb/".$thname;

      }
      /* generate new files names */

      if (!in_array($fileext,$vexts)){ $main .=  "<br> <br> هذا الامتداد غير مسموح به ".$refresh; }
      
      elseif (in_array($filetype,$dngr)){ $main .=  "<br> <br> هذا الملف خطر ".$refresh;  }
      
      elseif ($filesize > $msize){ $main .=  "<br> <br> الحجم اكبر من المسموح به ".$refresh;  }
      
      else 
      {
       
          if(move_uploaded_file($_FILES['fileup']['tmp_name'],$fpath))
          {
            $this->up = "T";          
          }
          else 
          { 
            $this->up = "F";
          }

      }

} 
}
?>
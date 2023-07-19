<?php
require_once ("../../include/initialize.php");
	 if (!isset($_SESSION['ACCOUNT_ID'])){
      redirect(web_root."admin/index.php");
     }

$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

switch ($action) {
	case 'backup' :
	doBackup();
	break;
	
	case 'restore' :
	doEdit();
	break;
 

 
	}
   
	function doBackup(){
	
		require_once('backup_restore.class.php'); 
		
		$dbhost = 'localhost';
		$dbuser = 'root';
		$dbpass = '';
		$dbname = 'dbgreenvalley';

		 $newImport = new backup_restore($db_host,$db_name,$db_user,$db_pass);
    
	    $fileName = $db_name . "_" . date("Y-m-d_H-i-s") . ".sql";    
	 
	    header("Content-disposition: attachment; filename=".$fileName);
	    header("Content-Type: application/force-download");
	    
	    header("Pragma: no-cache");
	    header("Cache-Cont//header("Content-Transfer-Encoding: application/zip;\n");rol: must-revalidate, post-check=0, pre-check=0, public");
	    header("Expires: 0");

	  
	    echo $newImport -> backup(); die();

	
	}

	function doRestore(){
 

			  message("[". $_POST['SUBJ_CODE'] ."] has been updated!", "success");
			redirect("index.php");
	 }


 
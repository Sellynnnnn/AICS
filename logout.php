<?php 
require_once 'include/initialize.php';

@session_start();

 $sql="INSERT INTO `tbllogs` (`USERID`, `LOGDATETIME`, `LOGROLE`, `LOGMODE`) 
          VALUES (".$_SESSION['ACCOUNT_ID'].",'".date('Y-m-d H:i:s')."','".$_SESSION['ACCOUNT_TYPE']."','Logged out')";
          $mydb->setQuery($sql);
          $mydb->executeQuery();


unset($_SESSION['ACCOUNT_ID']);
unset($_SESSION['ACCOUNT_NAME']);   
unset($_SESSION['ACCOUNT_USERNAME']);  
unset($_SESSION['ACCOUNT_PASSWORD']); 	 
unset($_SESSION['ACCOUNT_TYPE'] );		 

redirect(web_root."login.php?logout=1");
?>
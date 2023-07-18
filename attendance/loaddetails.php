<?php
 require_once ("../include/initialize.php");

 $studenID   = $_POST['IDNO'];
 

 
if (isset($_POST['checkattendance'])) {
 	
 	  
 	$timestring = $_POST['stringtime'];
 	$dateObject = new DateTime($timestring);
    $resDate =  $dateObject->format('A');

    $insertTime =  date('h:i A',strtotime($timestring));


 
    if ($resDate=='AM') {
    	

    	$validate_verifytimeintimeout_table = validate_verifytimeintimeout($studenID);

    	if ($validate_verifytimeintimeout_table==true) {
    	

    		 $verifytimeintimeout = new VerifyTimeinTimeout();
    		 $row_verify  = $verifytimeintimeout->single_verifytimeintimeout($studenID);


    		 $vefication = $row_verify->Verification; 

    		
				switch ($vefication) {
		   			case 'TimeIn': 
		   			
		   			       TIMEOUT_VERIFY_UPDATE($studenID,$insertTime);

		   			       $r = validate_timetable($studenID,Date('Y-m-d')); 
						   if ($r == true) {
						   
						   		TIMETABLEUPDATE_TIMEOUT_AM($studenID,$insertTime);

						   }else{
						   
								TIMETABLE_TIMEIN_AM_INSERT($studenID,$insertTime);
						   } 
		   				break;
		   			case 'TimeOut': 

 						  
		   				
		   				  TIMEIN_VERIFY_UPDATE($studenID,$insertTime);

		   				   $r = validate_timetable($studenID,Date('Y-m-d')); 
						   if ($r == true) {
						   
						   		TIMETABLE_TIMEIN_AM_INSERT($studenID,$insertTime);

						   }else{
						   	
								TIMETABLE_TIMEIN_AM_INSERT($studenID,$insertTime);
						   }

		   				break;
		   			 
		   		}

    			  
    	}else{

 			
    		 TIMEIN_VERIFY_INSERT($studenID,$insertTime);

             TIMETABLE_TIMEIN_AM_INSERT($studenID,$insertTime);


    	}

	   
 
    }else if ($resDate=='PM') {
    	

    	$validate_verifytimeintimeout_table = validate_verifytimeintimeout($studenID);

    	if ($validate_verifytimeintimeout_table==true) {
    		

    		 $verifytimeintimeout = new VerifyTimeinTimeout();
    		 $row_verify  = $verifytimeintimeout->single_verifytimeintimeout($studenID);
    		 $vefication = $row_verify->Verification; 


				switch ($vefication) {
		   			case 'TimeIn': 
		   				

		   			       TIMEOUT_VERIFY_UPDATE($studenID,$insertTime);

		   			       $r = validate_timetable($studenID,Date('Y-m-d')); 
						   if ($r == true) {
						   
						   		TIMETABLEUPDATE_TIMEOUT_PM($studenID,$insertTime);

						   }else{
						   
								TIMETABLE_TIMEIN_PM_INSERT($studenID,$insertTime);
						   } 
		   				break;
		   			case 'TimeOut': 

 					    
		   			
		   				  TIMEIN_VERIFY_UPDATE($studenID,$insertTime);

		   				   $r = validate_timetable($studenID,Date('Y-m-d')); 
						   if ($r == true) {
						   	
						   		TIMETABLEUPDATE_TIMEIN_PM($studenID,$insertTime);

						   }else{
						   
								TIMETABLE_TIMEIN_PM_INSERT($studenID,$insertTime);
						   }

		   				break;
		   			 
		   		}

    			  
    	}else{
 
    		 TIMEIN_VERIFY_INSERT($studenID,$insertTime);

             TIMETABLE_TIMEIN_PM_INSERT($studenID,$insertTime);


    	}

    }

 
 }

if (isset($_POST['name'])) {
 	
 	$sql = "SELECT * FROM `tblstudent`  s, `tblcourse` c WHERE s.`CourseID`=c.`CourseID` AND StudentID='".$studenID."'";
 	$mydb->setQuery($sql);
    @$cur = $mydb->loadSingleResult();

    echo @$cur->Lastname . ', ' .@$cur->Firstname ;
 }

  if (isset($_POST['course'])) {
 	
 	$sql = "SELECT * FROM `tblstudent`  s, `tblcourse` c WHERE s.`CourseID`=c.`CourseID` AND StudentID='".$studenID."'";
 	$mydb->setQuery($sql);
    @$cur = $mydb->loadSingleResult();

    echo @$cur->CourseCode ;
 }

 if (isset($_POST['year'])) {
 
 	$sql = "SELECT * FROM `tblstudent`  s, `tblcourse` c WHERE s.`CourseID`=c.`CourseID` AND StudentID='".$studenID."'";
 	$mydb->setQuery($sql);
    @$cur = $mydb->loadSingleResult();

    echo @$cur->YearLevel ;
 }

  if (isset($_POST['img'])) {
 
 	$sql = "SELECT * FROM `tblstudent`  s, `tblcourse` c WHERE s.`CourseID`=c.`CourseID` AND StudentID='".$studenID."'";
 	$mydb->setQuery($sql);
    @$cur = $mydb->loadSingleResult();

    echo '<img title="profile image" id="imgprofile" class="img-hover"   src="'.web_root. 'student/'.  @$cur->StudPhoto.'" />' ;
 }



 function TIMEIN_VERIFY_INSERT($id,$time){
 	 if (student_notexist($id)) return;
 	$verifytimeintimeout = New VerifyTimeinTimeout();
 	$verifytimeintimeout->StudentID = $id;
 	$verifytimeintimeout->TimeIn = $time;
 	$verifytimeintimeout->Verification = 'TimeIn';
 	$verifytimeintimeout->DateValidation = Date('Y-m-d');
 	$verifytimeintimeout->create();

 }

 function TIMEIN_VERIFY_UPDATE($id,$time){

 	$verifytimeintimeout = New VerifyTimeinTimeout(); 
 	$verifytimeintimeout->Verification = 'TimeIn';
 	$verifytimeintimeout->TimeIn = $time;
 	$verifytimeintimeout->DateValidation = Date('Y-m-d');
 	$verifytimeintimeout->update($id);
 	
 }

 function TIMEOUT_VERIFY_UPDATE($id,$time){

   if (validate_time_interval2($id,'TimeIn',$time)) return;

 	$verifytimeintimeout = New VerifyTimeinTimeout(); 
 	$verifytimeintimeout->TimeOut = $time;
 	$verifytimeintimeout->Verification = 'TimeOut';
 	$verifytimeintimeout->DateValidation = Date('Y-m-d');
 	$verifytimeintimeout->update($id);
 }


function TIMETABLE_TIMEIN_AM_INSERT($id,$time){
  if (student_notexist1($id)) return;
	$timetable = New TimeTable();
	$timetable->StudentID = $id;
	$timetable->TimeInAM =  $time;
	$timetable->AttendDate = Date('Y-m-d'); 
	$timetable->create();  
	attendance_message();
	echo "<h2>Time-In : {$time}</h2>";
}

function TIMETABLE_TIMEIN_PM_INSERT($id,$time){
   if (student_notexist1($id)) return;
	$timetable = New TimeTable();
	$timetable->StudentID = $id;
	$timetable->TimeInPM =  $time;
	$timetable->AttendDate = Date('Y-m-d'); 
	$timetable->create();
	attendance_message(); 
	echo "<h2>Time-In : {$time}</h2>";

}
 
function TIMETABLEUPDATE_TIMEIN_AM($id,$time){
	global $mydb;
 	if(time_exists($id,date('Y-m-d'),'TimeInAM')) return;
	$sql = "UPDATE `tbltimetable` SET `TimeInAM`= '{$time}' WHERE DATE(`AttendDate`) = '".Date('Y-m-d')."' AND `StudentID`='" .$id. "'";
	$mydb->setQuery($sql);
	$mydb->executeQuery();
    attendance_message();
	echo "<h2>Time-In : {$time}</h2>"; 
}

function TIMETABLEUPDATE_TIMEOUT_AM($id,$time){
	global $mydb;
 
	if(time_exists($id,date('Y-m-d'),'TimeOutAM')) return;

    if (validate_time_interval($id,date('Y-m-d'),'TimeInAM',$time)) return;

	$sql = "UPDATE `tbltimetable` SET `TimeOutAM`= '{$time}' WHERE DATE(`AttendDate`) = '".Date('Y-m-d')."' AND `StudentID`='" .$id. "'";
	$mydb->setQuery($sql);
	$mydb->executeQuery();
    attendance_message();
	echo "<h2>Time-Out : {$time}/h2>";
}
  
function TIMETABLEUPDATE_TIMEIN_PM($id,$time){
global $mydb;
     
	if(time_exists($id,date('Y-m-d'),'TimeInPM')) return; 

	$sql = "UPDATE `tbltimetable` SET `TimeInPM`= '{$time}' WHERE DATE(`AttendDate`) = '".Date('Y-m-d')."' AND `StudentID`='" .$id. "'";
	$mydb->setQuery($sql);
	$mydb->executeQuery();
	attendance_message();
	echo "<h2>Time-iN : {$time}</h2>";

}
function TIMETABLEUPDATE_TIMEOUT_PM($id,$time){
global $mydb;
 	
 	if(time_exists($id,date('Y-m-d'),'TimeOutPM')) return;

 	if (validate_time_interval($id,date('Y-m-d'),'TimeInPM',$time)) return;

	$sql = "UPDATE `tbltimetable` SET `TimeOutPM`= '{$time}' WHERE DATE(`AttendDate`) = '".Date('Y-m-d')."' AND `StudentID`='" .$id. "'";
	$mydb->setQuery($sql);
	$mydb->executeQuery();
	attendance_message();
	echo "<h2>Time-Out : {$time}</h2>";
 }

 function validate_timetable($id,$date){
 	global $mydb;

 	$sql ="SELECT * FROM `tbltimetable` WHERE  `StudentID`='{$id}' AND  date(`AttendDate`)='{$date}'";
 	$mydb->setQuery($sql);
	$result = $mydb->executeQuery();  
 	 $maxrow = $mydb->num_rows($result);

 	 if ($maxrow > 0) {
 	
 	 	$time_table_validate = $mydb->loadSingleResult();
 	 	return true;
 	 }else{
 	 	return false;
 	 } 
 }

  function validate_verifytimeintimeout($id){
  	global $mydb;
 	$sql ="SELECT * FROM `tblverifytimeintimeout` WHERE  `StudentID`='{$id}'";
 	$mydb->setQuery($sql);
	$result = $mydb->executeQuery();  
 	 $maxrow = $mydb->num_rows($result);
 	 if ($maxrow > 0) {
 	 	
 		$rowverifytimeintimeout = $mydb->loadSingleResult();
 	 	return true;
 	 }else{
 	 	return false;
 	 } 
 }
 

 function time_exists($id,$date,$tfield){ 
 	global $mydb;
 	$sql ="SELECT * FROM `tbltimetable` WHERE  `StudentID`='{$id}' AND  date(`AttendDate`)='{$date}'";
 	$mydb->setQuery($sql);
	$result = $mydb->executeQuery();  
 	 $max = $mydb->num_rows($result);
 	$row = $mydb->loadSingleResult();
    $flag=0;
    for($i=0;$i<$max;$i++){
      if($row->$tfield!=''){
        $flag=1; 
        echo "Attendance is already checked.";
        break;
      }
    }
    return $flag;
  }

  function validate_time_interval($id,$date,$tfield,$time_now){
  	global $mydb;
   

  	$sql ="SELECT * FROM `tbltimetable`  WHERE  `StudentID`='{$id}' AND  date(`AttendDate`)='{$date}'";
 	$mydb->setQuery($sql); 
 	$row = $mydb->loadSingleResult();

 	 $tfrom= time_from($row->$tfield);
     $tto = time_to($time_now);
               
     $tinterval = round(abs($tto  - $tfrom) / 60 ,2);

	    $flag=0;
	    for($i=0;$i<$max;$i++){
	 
	      if($tinterval < 16){
	        $flag=1;
	        echo "Attendance is already checked.";
	        break;
	      }


     }
    return $flag;

  }

  function validate_time_interval2($id,$tfield,$time_now){ 
global $mydb;

  	$sql ="SELECT * FROM `tblverifytimeintimeout`  WHERE  `StudentID`='{$id}'";
 	$mydb->setQuery($sql);
	$result = $mydb->executeQuery();  
 	 $max = $mydb->num_rows($result);
 	$row = $mydb->loadSingleResult();

 	 $tfrom= time_from($row->$tfield);
     $tto = time_to($time_now);
               
     $tinterval = round(abs($tto  - $tfrom) / 60 ,2);

	    $flag=0;
	    for($i=0;$i<$max;$i++){
	 
	      if($tinterval < 16){
	        $flag=1; 
	        break;
	      }


     }
    return $flag;

  }

   function student_notexist($id){ 
   	global $mydb;

		$sql ="SELECT * FROM `tblstudent`  WHERE  `StudentID`='{$id}'";
		$mydb->setQuery($sql);
		$result = $mydb->executeQuery();  
		$max = $mydb->num_rows($result);
	    $flag=0; 
	 
	      if($max < 1){
	        $flag=1; 
	        echo "ID is not registered in the system";
	      } 
    return $flag;

  }
   function student_notexist1($id){ 
global $mydb;

		$sql ="SELECT * FROM `tblstudent`  WHERE  `StudentID`='{$id}'";
		$mydb->setQuery($sql);
		$result = $mydb->executeQuery();  
		$max = $mydb->num_rows($result);

	    $flag=0; 
	 
	      if($max < 1){
	        $flag=1;  
	      } 
    return $flag;

  }

 function time_from($time){ 
		$dateObject = new DateTime($time);
		$resHr =  $dateObject->format('H:i'); 
	      return  strtotime($resHr);  
 }
  function time_to($time){
  		$dateObject = new DateTime($time);
		$resHr  =  $dateObject->format('H:i'); 
	    return  strtotime($resHr); 
  }

  function attendance_message(){
     echo "<h2>Attendance Checked</h2>"; 
  }

 

 ?>
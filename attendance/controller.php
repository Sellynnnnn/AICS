<?php
require_once ("../../include/initialize.php");
	 if (!isset($_SESSION['ACCOUNT_ID'])){
      redirect(web_root."admin/index.php");
     }

$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

switch ($action) {
	case 'add' :
	doInsert();
	break;
	
	case 'edit' :
	doEdit();
	break; 
	
	case 'delete' :
	doDelete();
	break;
 
 
	}
   
	function doInsert(){
		if(isset($_POST['save'])){


		if ($_POST['StudentID'] == "Select" OR $_POST['Position'] == "Select" OR $_POST['PartyList'] == ""
			OR $_POST['RunningDate'] == "" ) {
			$messageStats = false;
			message("All field is required!","error");
			redirect('index.php?view=add');
		}else{	
 
				$candidate = New Candidate(); 
				$candidate->StudentID 		= $_POST['StudentID'];
				$candidate->Position		= $_POST['Position']; 
				$candidate->PartyList		= $_POST['PartyList']; 
				$candidate->RunningDate	 	= date_format(date_create($_POST['RunningDate']),'Y-m-d');  
				$candidate->create();


				$stud = New Student(); 
				$stud->Cand_Status 		= 'Candidate'; 
				$stud->update($_POST['StudentID']);

							

				message("New Candidate created successfully!", "success");
				redirect("index.php"); 
		 }
		}

	}

	function doEdit(){
	if(isset($_POST['save'])){

		if ($_POST['Position'] == "Select" OR $_POST['PartyList'] == ""
			OR $_POST['RunningDate'] == "" ) {
			$messageStats = false;
			message("All field is required!","error");
			redirect('index.php?view=add');
		}else{	
 
				$candidate = New Candidate(); 
				
				$candidate->Position		= $_POST['Position'];
				$candidate->PartyList		= $_POST['PartyList']; 
				$candidate->RunningDate	 	= date_format(date_create($_POST['RunningDate']),'Y-m-d');  
				$candidate->update($_POST['CandidateID']);


				message("Candidate has been updated!", "success");
				redirect("index.php"); 
		 }
 
		   
	}

} 

	function doDelete(){
		

			 
		
		
 
		
				$id = 	$_GET['canid'];

				$candidate = New Candidate();
				$candidate->delete($id);
			 
		 
				$stud = New Student(); 
				$stud->Cand_Status 		= ''; 
				$stud->update($_GET['studid']);

			message("Candidate already Deleted!","success");
			redirect('index.php');

		
	}
 
 
?>
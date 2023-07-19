<?php
require_once ("../include/initialize.php");
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

	case 'photos' :
	doupdateimage();
	break;

 
	}
 
	function doInsert(){
		if(isset($_POST['save'])){
			
  		if ($_POST['COURSE_NAME'] == ""  OR $_POST['COURSE_DESC'] == "" OR $_POST['DEPT_ID'] == "none") {
			$messageStats = false;
			message("All field is required!","error");
			redirect('index.php?view=add');
		}else{	
			$course = New Course();
		
			$course->CourseCode 		= $_POST['COURSE_NAME']; 
			$course->Description		= $_POST['COURSE_DESC']; 
			$course->DepartmentID			= $_POST['DEPT_ID'];
			$course->create();

						

			message("New [". $_POST['COURSE_NAME'] ."] created successfully!", "success");
			redirect("index.php");
			
		}
		}

	}

	function doEdit(){
	if(isset($_POST['save'])){

			$course = New Course(); 
			$course->CourseCode 		= $_POST['COURSE_NAME']; 
			$course->Description		= $_POST['COURSE_DESC']; 
			$course->DepartmentID			= $_POST['DEPT_ID'];
			$course->update($_POST['COURSE_ID']);

			  message("[". $_POST['COURSE_NAME'] ."] has been updated!", "success");
			redirect("index.php");
		}
	}


	function doDelete(){
		
		

		
				$id = 	$_GET['id'];

				$course = New Course();
	 		 	$course->delete($id);
			 
			message("Course already Deleted!","info");
			redirect('index.php');
		
		
	}

	 
?>
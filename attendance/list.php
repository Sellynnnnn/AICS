<?php
	 if (!isset($_SESSION['ACCOUNT_ID'])){
      redirect(web_root."index.php");
     }

?>

 
      <section id="feature" class="transparent-bg">
        <div class="container">
           <div class="center wow fadeInDown">
                 <h2 class="page-header">Attendance</h2>
               
            </div>

            <div class="row">
                <div class="features">
				   			 <form class=" " action="controller.php?action=delete" Method="POST">   			
								<table id="dash-table" class="table table-striped table-bordered table-hover " style="font-size:12px" cellspacing="0">
								
								  <thead>
								  <tr>
								  	<th colspan="2"></th> 
								  	<th colspan="2"><center>AM</center></th>
								  	<th colspan="2"><center>PM</center></th> 
								  </tr>
								  	<tr>
								   		<th>Student</th>
								  		<th>Date</th>
								  		<th width="150px">Time-In</th>  
								  		<th width="150px">Time-Out</th>
								  		<th width="150px">Time-In</th>  
								  		<th width="150px">Time-Out</th>  
								  	</tr>	
								  </thead> 
								  <tbody>
								  	<?php  
								  	

								  		$mydb->setQuery("SELECT * FROM `tbltimetable` t, `tblstudent` s
								  						 WHERE t.`StudentID`=s.`StudentID` ORDER BY TimeTableID desc");

								  		$cur = $mydb->loadResultList();

										foreach ($cur as $result) { 
								  		echo '<tr>';
								  	    echo '<td>'. $result->Firstname.','. $result->Lastname.' '. $result->Middlename.'</td>';
								  		echo '<td>'. date_format(date_create($result->AttendDate),'M. d, Y').'</td>'; 
								  		echo '<td>'. $result->TimeInAM.'</td>'; 
								  		echo '<td>'. $result->TimeOutAM.'</td>';  
								  		echo '<td>'. $result->TimeInPM.'</td>'; 
								  		echo '<td>'. $result->TimeOutPM.'</td>'; 
								  		 
								  		echo '</tr>';
								  	} 
								  	?>
								  </tbody>
									
								</table> 
							 
						</form>
                </div>
            </div>
        </div>
    </section>

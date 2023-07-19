<?php 
 if (!isset($_SESSION['ACCOUNT_ID'])){
    redirect(web_root."admin/index.php");
   }


 @$CandidateID = $_GET['id'];
    if($CandidateID==''){
  redirect("index.php");
}
  $candidate = New Candidate();
  $can_result = $candidate->single_candidate($CandidateID);
 
 
   switch ($can_result->Position) {

     case 'President':
   
        $position ='<select class="form-control input-sm" name="Position" id="Position">
                      <option>Select</option>
                      <option SELECTED value="President">President</option>
                      <option value="Vice-President">Vice-President</option>
                      <option value="Secretary">Secretary</option>
                      <option value="Treasurer">Treasurer</option>   
                      <option value="Senators">Senators</option>n value="Fourth" >Fourth</option>
                    </select> ';
       break;
     case 'Vice-President':
      
        $position ='<select class="form-control input-sm" name="Position" id="Position">
                      <option>Select</option>
                      <option  value="President">President</option>
                      <option SELECTED value="Vice-President">Vice-President</option>
                      <option value="Secretary">Secretary</option>
                      <option value="Treasurer">Treasurer</option>   
                      <option value="Senators">Senators</option>n value="Fourth" >Fourth</option>
                    </select> ';

       break;
     case 'Secretary':
     
       $position ='<select class="form-control input-sm" name="Position" id="Position">
                      <option>Select</option>
                      <option  value="President">President</option>
                      <option  value="Vice-President">Vice-President</option>
                      <option SELECTED value="Secretary">Secretary</option>
                      <option value="Treasurer">Treasurer</option>   
                      <option value="Senators">Senators</option>n value="Fourth" >Fourth</option>
                    </select> ';
       break;
     case 'Treasurer':
       
        $position ='<select class="form-control input-sm" name="Position" id="Position">
                      <option>Select</option>
                      <option  value="President">President</option>
                      <option  value="Vice-President">Vice-President</option>
                      <option  value="Secretary">Secretary</option>
                      <option SELECTED value="Treasurer">Treasurer</option>   
                      <option value="Senators">Senators</option>n value="Fourth" >Fourth</option>
                    </select> ';
       break;
     case 'Senators':
         $position ='<select class="form-control input-sm" name="Position" id="Position">
                      <option>Select</option>
                      <option  value="President">President</option>
                      <option  value="Vice-President">Vice-President</option>
                      <option  value="Secretary">Secretary</option>
                      <option  value="Treasurer">Treasurer</option>   
                      <option SELECTED value="Senators">Senators</option> 
                    </select> ';
       break;

     default:
     
       $position ='<select class="form-control input-sm" name="Position" id="Position">
                      <option>Select</option>
                      <option  value="President">President</option>
                      <option  value="Vice-President">Vice-President</option>
                      <option  value="Secretary">Secretary</option>
                      <option  value="Treasurer">Treasurer</option>   
                      <option SELECTED value="Senators">Senators</option> 
                    </select> ';
       break;
   }
 ?> 

<section id="feature" class="transparent-bg">
    <div class="container">
       <div class="center wow fadeInDown">
             <h2 class="page-header">Update Candidate</h2>
          
        </div>

        <div class="row">
            <div class="features">

                <form class="form-horizontal span6 " action="controller.php?action=edit" method="POST"> 
                             <div class="form-group">
                              <div class="col-md-8">
                                <label class="col-md-4 control-label" for=
                                "StudentID">Candidates :</label>

                                <div class="col-md-8">
                                <input type="hidden" value="<?php echo $can_result->CandidateID; ?>" name="CandidateID"> 
                                <label style="font-size:25px">
                                <?php  

                                    $Student = New Student();
                                    $singlestudent = $Student->single_student($can_result->StudentID);
                                    echo   $singlestudent->Lastname.', '.$singlestudent->Firstname;
                                ?>
                                </label>

                                      <?php  
                                       
                                        ?>
                                 
                                   
                                </div>
                              </div>
                            </div>
 
                            <div class="form-group">
                              <div class="col-md-8">
                                <label class="col-md-4 control-label" for=
                                "Position">Position:</label>

                                <div class="col-md-8">
                                 <?php echo $position; ?>
                                  
                                </div>
                              </div>
                            </div>


                             <div class="form-group">
                              <div class="col-md-8">
                                <label class="col-md-4 control-label" for=
                                "PartyList">Party List:</label>

                                <div class="col-md-8">
                                  
                                   <input class="form-control input-sm" id="PartyList" name="PartyList" placeholder=
                                      "Party List" type="any" value="<?php echo $can_result->PartyList; ?>" required>
                                </div>
                              </div>
                            </div> 
 
                             <div class="form-group">
                              <div class="col-md-8">
                                <label class="col-md-4 control-label" for=
                                "RunningDate">Date of Candidacy:</label>
           
                                <div class="col-md-8">
                                   <div class="input-group" id=""> 
                                        <div class="input-group-addon"> 
                                          <i class="fa fa-calendar"></i>
                                        </div>
                                        <input required id="datemask2" name="RunningDate"  value="<?php echo date_format(date_create($can_result->RunningDate),'m/d/Y'); ?>" type="text" class="form-control " size="7" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask>
                                      </div>
                                </div>
                              </div>
                            </div>  
                         
                       <div class="form-group">
                              <div class="col-md-8">
                                <label class="col-md-4 control-label" for=
                                "idno"></label>

                                <div class="col-md-8">
                                 <button class="btn btn-primary btn-sm" name="save" type="submit" ><span class="fa fa-save fw-fa"></span>  Save</button> 
                                   
                                 </div>
                              </div>
                            </div> 
                  </form>

            
            </div>
        </div>
    </div>
</section>
 

<section id="bottom">
    <div class="container wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
    
    </div> 
</section>
       
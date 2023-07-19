<?php 
 if (!isset($_SESSION['ACCOUNT_ID'])){
    redirect(web_root."index.php");
   }



 ?> 

 <section id="feature" class="transparent-bg">
        <div class="container">
           <div class="center wow fadeInDown">
                 <h2 class="page-header">Add New Department</h2>
            </div>
               
            <div class="row">
                <div class="features">
 
                  <form class="form-horizontal span6  wow fadeInDown" action="controller.php?action=add" method="POST">

                      <?php echo $res->AUTO; ?>
                         
                     <div class="form-group">
                      <div class="col-md-8">
                        <label class="col-md-4 control-label" for=
                        "DEPARTMENT_NAME">Department:</label>

                        <div class="col-md-8">
                          <input name="deptid" type="hidden" value="">
                           <input class="form-control input-sm" id="DEPARTMENT_NAME" name="DEPARTMENT_NAME" placeholder=
                              "Department Name" type="text" value=""  onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-md-8">
                        <label class="col-md-4 control-label" for=
                        "DEPARTMENT_DESC">Description:</label>

                        <div class="col-md-8">
                          <input name="deptid" type="hidden" value="">
                          <textarea  class="form-control input-sm" id="DEPARTMENT_DESC" name="DEPARTMENT_DESC" placeholder=
                              "Description" rows="5" cols="60"  onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off"></textarea>
                          
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


                  <div class="form-group">
                  <div class="rows">
                    <div class="col-md-6">
                      <label class="col-md-6 control-label" for=
                      "otherperson"></label>

                      <div class="col-md-6">
                     
                      </div>
                    </div>

                    <div class="col-md-6" align="right">
                     

                     </div>
                    
                  </div>
                  </div>

                  </form>
       
       
                
                </div>
            </div> 
        </div>
    </section>

 
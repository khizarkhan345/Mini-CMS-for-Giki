<?php
  session_start();
  if(isset($_SESSION['username']))
    {
        $username=$_SESSION['username'];
        
       
    }
    else
    {
        header("location:department_login.php");
    }
  $link = mysqli_connect("localhost","root","");
   mysqli_select_db($link,"obe system");
 include "header.php";
?>
        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Plain Page</h3>
                    </div>

                    <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Plain Page</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <form name="form1" action="" method="post" class="col-lg-6">
								 <table class = "table table-bordered">
								  <tr>
								   <td>
								    
								    
										  									 <div class="container">
																		<!-- /*down here php code for selecting Departments name*/ -->
																		<?php

																		$query = "SELECT Dept_id FROM department_login WHERE username = '$username'";
																		
																		if(($res=mysqli_query($link, $query))==TRUE){
																		  $row = mysqli_fetch_array($res);
																		   $dept_id = $row["Dept_id"];
																		 
																		}
																		 
																		
																		?>

																		<div class="form-group">
																	Select Program
																	<select  class="form-control" name=program_id>
																	<?php
																	 $query1 = "SELECT * FROM program WHERE Dept_id = '$dept_id'";
																	 if($res=mysqli_query($link, $query1)){
																	while($row=mysqli_fetch_array($res)){?>
																	<option value=<?php echo $row["Prog_id"]; ?>>
																				<?php echo $row["Prog_name"]; echo "</option>"; }
																	 }?>
																				
																	</select>
																	
																	</div>
																		</div>
								   </td>									
								  </tr>
								  <tr>
								   <td>
								     			 <div class="container">
																		

																		<div class="form-group">
																	Select Course
																	<select  class="form-control" name=course_id>
																	<?php
																	 $query1 = "SELECT * FROM courses";
																	 if($res=mysqli_query($link, $query1)){
																	while($row=mysqli_fetch_array($res)){?>
																	<option value=<?php echo $row["C_id"]; ?>>
																				<?php echo $row["C_name"]; echo "</option>"; }
																	 }?>
																				
																	</select>
																	
																	</div>
																		</div>
								    </td>
									</tr>
								  <tr>
								   <td>
								    
									<div class="container">
																	<div class="form-group">
																	Select Semester
																	<select class="form-control" id="sel1" name=semester>
																	<option value="1">1</option>
																	<option value="2">2</option>
																	<option value="3">3</option>
																	<option value="4">4</option>
																	<option value="5">5</option>
																	<option value="6">6</option>
																	<option value="7">7</option>
																	<option value="8">8</option>
																	</select>
																	</div>

																	</div>
								     
								    </td>
									</tr>
								  <tr>
								  
								   <td>
								     Pre requisite 1<br>
								    <input type = "text" class="form-control" name="prerequisite1">
								    </td>
									</tr>
                                   <tr>
								   <td>
								    Pre requisite 2<br>
								    <input type = "text" class="form-control" name="prerequisite2">
								    </td>
									</tr>	
                                   <tr>
								   <td>
								    <input type = "submit" class="btn btn-default submit" name="submit1" value="Submit" >
								    </td>
									</tr>									
								 </table>
								 </form>
								<?php
								   

											$query = "SELECT Dept_id FROM department_login WHERE username = '$username'";
																		
														if(($res=mysqli_query($link, $query))==TRUE){
															   $row = mysqli_fetch_array($res);
																 $dept_id = $row["Dept_id"];
																		 
															}
																		 
																		
																	
                                 
									 if(isset($_POST["submit1"])){
										 
	                                  $programe_id = $_POST["program_id"];
								   $course_id = $_POST["course_id"];
								   $semester = $_POST["semester"];
								    $pre_requisite1 = $_POST["prerequisite1"];
									$pre_requisite2 = $_POST["prerequisite2"];
									
	                                 $query = "insert into degree_plane values('$dept_id', '$programe_id', '$course_id', '$semester')";
									  
       
	                          if(mysqli_query($link, $query) == TRUE){
								  
								     

                                         ?>
                                   <div class="alert alert-success col-lg-6 col-lg-push-3">
                                      Inserted successfully
                                       </div>

                                          <?php	 
	                                       }   
                                        
									if(!empty($pre_requisite1)){
										
									   $query1 = "insert into course_prerequisite values('$course_id', '$pre_requisite1')";
									   if(mysqli_query($link, $query1)==TRUE){
									     ?>
										 <div class="alert alert-success col-lg-6 col-lg-push-3">
                                      Pre requisite 1 Inserted successfully
                                       </div>
									   <?php
									   }
									}
                                  if(!empty($pre_requisite2)){
									   $query2 = "insert into course_prerequisite values('$course_id', '$pre_requisite2')";
									   if(mysqli_query($link, $query2)==TRUE){
									     ?>
										 <div class="alert alert-success col-lg-6 col-lg-push-3">
                                      Pre Requisite 2 Inserted successfully
                                       </div>
									   <?php
									}										
								}
									 }
                                 ?>								
								 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->
		
		          

<?php
 include "footer.php";
?>
       
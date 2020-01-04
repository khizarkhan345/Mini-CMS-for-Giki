<?php
  session_start();
  if(isset($_SESSION['username']))
    {
        $username=$_SESSION['username'];
        
       
    }
    else
    {
        header("location:instructor_login.php");
    }
  $link = mysqli_connect("localhost","root","");
   mysqli_select_db($link,"obe system");
 include "instructor_header.php";
?>
        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3></h3>
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
                                <h2>Calculate student CLOs</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <form name="form1" action="" method="post" class="col-lg-6">
								 <table class = "table table-bordered">
								  <tr>
								   <td>
								     			 <div class="container">
																	<?php
																	$query = "SELECT Inst_id FROM instructor_login WHERE username = '$username'";
																		
																		if(($res=mysqli_query($link, $query))==TRUE){
																		  $row = mysqli_fetch_array($res);
																		   $Inst_id = $row["Inst_id"];
																		}
																			
                                                                   ?>
																		<div class="form-group">
																	Select Student
																	<select  class="form-control" name=reg_no>
																	<?php
																	 $query7 = "SELECT Distinct Reg_no FROM course_activities_record WHERE Inst_id='$Inst_id'";
																	 if($res=mysqli_query($link, $query7)){
																	while($row=mysqli_fetch_array($res)){
																	   ?>																	   ?>
																	<option value=<?php echo $row["Reg_no"]; ?>>
																				<?php echo $row["Reg_no"]; echo "</option>"; 
																	}
																	 }
																	
																	 ?>
																				
																	</select>
																	
																	</div>
																		</div>
								    </td>
									</tr>
									<tr>
									 <td>
									    <div class="container">
																	
																		<div class="form-group">
																		<?php
																	$query = "SELECT Inst_id FROM instructor_login WHERE username = '$username'";
																		
																		if(($res=mysqli_query($link, $query))==TRUE){
																		  $row = mysqli_fetch_array($res);
																		   $Inst_id = $row["Inst_id"];
																		}		
                                                                   ?>
																	Select Course
																	<select  class="form-control" name=course_id>
																	<?php
																	 $query5 = "SELECT Distinct C_id FROM course_activities_record WHERE Inst_id='$Inst_id'";
																	 if($res2=mysqli_query($link, $query5)){
																	while($row2=mysqli_fetch_array($res2)){
																	   $query6 = "SELECT C_name FROM courses WHERE C_id='$row2[C_id]'";
																	   if($res1=mysqli_query($link, $query6)){
																		  While($row1=mysqli_fetch_array($res1)){ 
																	   ?>
																	<option value=<?php echo $row2["C_id"]; ?>>
																				<?php echo $row1["C_name"]; echo "</option>"; }
																	}
																	
																	}
																	 }
																																		 
																	
																	 
																	 ?>
																				
																	</select>
																	
																	</div>
																		</div>
																		
									 </td>
									</tr>
									<tr>
									 <td>
									    <div class="container">
																	<?php
																	$query = "SELECT Inst_id FROM instructor_login WHERE username = '$username'";
																		
																		if(($res=mysqli_query($link, $query))==TRUE){
																		  $row = mysqli_fetch_array($res);
																		   $Inst_id = $row["Inst_id"];
																		}
																			
                                                                   ?>
																		<div class="form-group">
																	Select Student
																	<select  class="form-control" name=cloname>
																	<?php
																	 $query7 = "SELECT Distinct Clo_name FROM manage_clos WHERE Inst_id='$Inst_id'";
																	 if($res=mysqli_query($link, $query7)){
																	while($row=mysqli_fetch_array($res)){
																	   ?>																	   
																	<option value=<?php echo $row["Clo_name"]; ?>>
																				<?php echo $row["Clo_name"]; echo "</option>"; 
																	}
																	 }
																	
																	 ?>
																				
																	</select>
																	
																	</div>
																		</div>
									  </td>
									</tr>
								
									<tr>
									<td>
									 <input type="submit" class="btn btn-default submit" name="submit2" value="Enter">
									 </td>
									 </tr>
									</table>
								 </form>
									
								   <?php
								   if(isset($_POST['submit2'])){
									   
									     $query = "SELECT Inst_id FROM instructor_login WHERE username = '$username'";
																		
																		if(($res=mysqli_query($link, $query))==TRUE){
																		  $row = mysqli_fetch_array($res);
																		   $Inst_id = $row["Inst_id"];
																		}
									     
									    $reg_no = $_POST["reg_no"];
									    $course_id = $_POST["course_id"];
                                         $cloname = $_POST["cloname"];										
										
										$query1 = "SELECT * FROM course_activities_record WHERE Reg_no ='$reg_no' and C_id='$course_id'and Inst_id='$Inst_id'";
										if($res1=mysqli_query($link, $query1)){
										  while($row1=mysqli_fetch_array($res1)){
										     $assignment = $row1["Assignment_%"];
											  $quizes = $row1["Quizes_%"];
											   $mid = $row1["Mid_%"];
											    $final = $row1["Final_%"];
												 $project = $row1["Project_%"];
												 
												  
											
										  }
                                         									  
										  
										}
										/*echo $assignment; ?> <br><?php
										echo $quizes; ?> <br><?php
										echo $mid;    ?> <br><?php
										echo $final;  ?> <br><?php
										echo $project; ?> <br><?php*/
										
										$query2 = "SELECT * FROM manage_clos WHERE C_id='$course_id'and Inst_id='$Inst_id' and Clo_name='$cloname'";
										if($res2=mysqli_query($link, $query2)){
										  while($row2=mysqli_fetch_array($res2)){
											  
										     $assignment1 = $row2["Assignment_%"];
											  $quizes1 = $row2["Quizes_%"];
											   $mid1 = $row2["Mid_%"];
											    $final1 = $row2["Final_%"];
												 $project1 = $row2["Project_%"];
											
										  }
										
										}
										/*echo $cloname; ?> <br><?php
										echo $assignment1; ?> <br><?php
										echo $quizes1;   ?> <br><?php
										echo $mid1;      ?> <br><?php
										echo $final1;    ?> <br><?php
										echo $project1;  ?> <br><?php*/
										
									$query1 = "SELECT * FROM course_activities WHERE C_id='$course_id'and Inst_id='$Inst_id'";
										if($res1=mysqli_query($link, $query1)){
										  while($row1=mysqli_fetch_array($res1)){
										     $assignment2 = $row1["Assignment_%"];
											  $quizes2 = $row1["Quizes_%"];
											   $mid2 = $row1["Mid_%"];
											    $final2 = $row1["Final_%"];
												 $project2 = $row1["Project_%"];
												 
												  
											
										  }
                                         									  
										  
										}
                                        if($assignment2 != 0){										
										$assignment_p = ($assignment*100)/$assignment2;
										}else{
										 $assignment_p=0;
										}
										if($quizes2 != 0){										
										$quizes_p = ($quizes*100)/$quizes2;
										}else{
											$quizes = 0;
										}
										if($mid2 != 0){										
										$mid_p = ($mid*100)/$mid2;
										}else{
										 $mid_p=0;
										}
										if($final2 != 0){										
										$final_p = ($final*100)/$final2;
										}else{
										 $final_p = 0;
										}
										if($project2 != 0){										
										$project_p = ($project*100)/$project2;
										}
										else{
										 $project_p=0;
										}
										
										
										
										
                                       										
										/*echo $assignment2; ?> <br><?php
										echo $quizes2;   ?> <br><?php
										echo $mid2;      ?> <br><?php
										echo $final2;    ?> <br><?php
										echo $project2;  ?> <br><?php*/
										
										/*echo $assignment_p; ?> <br><?php
										echo $quizes_p;   ?> <br><?php
										echo $mid_p;      ?> <br><?php
										echo $final_p;    ?> <br><?php
										echo $project_p;  ?> <br><?php*/
										
										
										
								   $assignment_clo = ($assignment1*$assignment_p)/100;
								   $quizes_clo = ($quizes1*$quizes_p)/100;
								   $mid_clo = ($mid1*$mid_p)/100;
								   $final_clo = ($final1*$final_p)/100;
								   $project_clo = ($project1*$project_p)/100;
								
								   
								   $sum = $assignment_clo + $quizes_clo + $mid_clo + $final_clo + $project_clo;
								   
								   
								   
								   if($sum>=50){
									$query4 = "insert into student_clo_record values('$reg_no','$course_id','$cloname','$sum','Pass')";
								   }else{
								    $query4 = "insert into student_clo_record values('$reg_no','$course_id','$cloname','$sum','Fail')";
								   }
                                     if(mysqli_query($link, $query4)==TRUE){									
									   
                                         ?>
                                   <div class="alert alert-success col-lg-6 col-lg-push-3">
                                      CLO Record Inserted successfully
                                       </div>

                                          <?php	 
								   
								   }
								   else{
									      ?>
                                   <div class="alert alert-success col-lg-6 col-lg-push-3">
                                      CLO Record Already Inserted
                                       </div>

                                          <?php   
								   
								   
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
 include "instructor_footer.php";
?>
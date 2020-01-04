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
                                <h2>Set CLOs mapping on Course activities</h2>

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
																	Select Course
																	<select  class="form-control" name=course_id>
																	<?php
																	 $query1 = "SELECT C_id FROM course_offering WHERE Inst_id='$Inst_id'";
																	 if($res=mysqli_query($link, $query1)){
																	while($row=mysqli_fetch_array($res)){
																	   $query2 = "SELECT C_name FROM courses WHERE C_id='$row[C_id]'";
																	   if($res1=mysqli_query($link, $query2)){
																		  While($row1=mysqli_fetch_array($res1)){ 
																	   ?>
																	<option value=<?php echo $row["C_id"]; ?>>
																				<?php echo $row1["C_name"]; echo "</option>"; }
																	}
																	}
																	 }?>
																				
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
									    $course_id = $_POST["course_id"];	
										
									   ?>
									   <form name="form2" action="?course_id=<?php echo $course_id; ?>" method="post" class="col-lg-6">
								 <table class = "table table-bordered"> 
									      <tr>
								            <td>
								     			 <div class="container">
																	
																		<div class="form-group">
																	Select CLO
																	<select  class="form-control" name=cloname required="">
																	<?php
																	 $query1 = "SELECT Clo_name FROM course_clos WHERE C_id='$course_id'";
																	 if($res=mysqli_query($link, $query1)){
																	while($row=mysqli_fetch_array($res)){
																		
																	   ?>
																	<option value=<?php echo $row["Clo_name"]; ?>>
																				<?php echo $row["Clo_name"]; echo "</option>"; }
																	}
																	
																	 ?>
																				
																	</select>
																	
																	</div>
																		</div>
								    </td>
									</tr>
									
									
								  <tr>
								  
								   <td>
								     <?php
									  
										$query2 = "SELECT * FROM course_activities WHERE C_id = '$course_id'";
                                        if($res2 = mysqli_query($link, $query2)){
                                           $row = mysqli_fetch_array($res2);
										   
																					
									  ?>
								
								     Assignment %<br>
									 Assigned Percentage: <?php echo $row["Assignment_%"];?>%<br>
								    <input type = "text" class="form-control" name="assignment" >
								    </td>
									</tr>
									<td>
								     Quizes %<br>
									Assigned Percentage: <?php echo $row["Quizes_%"];?>%<br>
									 <input type = "text" class="form-control" name="quizes" >
								    </td>
									</tr>
									<td>
								     Mid %<br>
									 Assigned Percentage: <?php echo $row["Mid_%"];?>%<br>
								    <input type = "text" class="form-control" name="mid" ">
								    </td>
									</tr>
									<td>
								     Final %<br>
									 Assigned Percentage: <?php echo $row["Final_%"];?>%<br>
								    <input type = "text" class="form-control" name="final" >
								    </td>
									</tr>
									<td>
								     Project %<br>
									 Assigned Percentage: <?php echo $row["Project_%"];?>%<br>
								    <input type = "text" class="form-control" name="project" >
									<?php
									 }
									?>
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
								   }
																
									 if(isset($_POST["submit1"])) {
										 
										$query = "SELECT Inst_id FROM instructor_login WHERE username = '$username'";
																		
																		if(($res=mysqli_query($link, $query))==TRUE){
																		  $row = mysqli_fetch_array($res);
																		   $Inst_id = $row["Inst_id"];
																		} 
									
									 $sum = 0;	 
	                                 
								   $course_id = $_GET["course_id"];
								   $cloname = $_POST["cloname"];
								   $assignment = $_POST["assignment"];
								    $quizes = $_POST["quizes"];
									$mid = $_POST["mid"];
								    $final = $_POST["final"];
									$project = $_POST["project"];
								if(empty($assignment)){
								 $assignment=0;
								} 
								if(empty($quizes)){
								 $quizes=0;
								}
								if(empty($mid)){
								 $mid=0;
								}
								if(empty($final)){
								 $final=0;
								}
								if(empty($project)){
								 $project=0;
								}									
							   $sum = $assignment + $quizes + $mid + $final + $project;	  
                               
                                     
                                        
										  if($sum <= 100){	
	                                 $query = "insert into manage_clos values('$course_id', '$Inst_id', '$cloname', '$assignment', '$quizes', '$mid', '$final', '$project')";
									  
       
	                          if(mysqli_query($link, $query) == TRUE){
								  
								     

                                         ?>
                                   <div class="alert alert-success col-lg-6 col-lg-push-3">
                                      Inserted successfully
                                       </div>

                                          <?php	 
	                                       }
										  } 
									else{
									      ?>
                                   <div class="alert alert-success col-lg-6 col-lg-push-3">
                                      Please check your clos mapping
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
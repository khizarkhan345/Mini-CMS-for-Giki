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
                                        

                                         
                                           echo "<table class='table table-striped'>";
	                                      echo "<tr>";
	                                     echo "<th>"; echo "Reg No";  echo "</th>";
	                                     echo "<th>"; echo "Course code";  echo "</th>";
	                                     echo "<th>"; echo "Course name";  echo "</th>";
										 echo "<th>"; echo "CLO Name";  echo "</th>";
										 echo "<th>"; echo "Obtained_%";  echo "</th>";
										 echo "<th>"; echo "Status";  echo "</th>";
										
	                                      echo "</tr>";
										  $query2="SELECT * FROM student_clo_record WHERE Reg_no='$reg_no' and C_id='$course_id'";
										  $res=mysqli_query($link, $query2);
	                                       while($row=mysqli_fetch_array($res)){
											
											   $query3 = "SELECT C_name FROM courses WHERE C_id = '$row[C_id]'";
											   if(($res1 = mysqli_query($link, $query3))==TRUE){
										       $row2 = mysqli_fetch_array($res1);
										        $c_name = $row2["C_name"];
										        }
												 echo "<tr>";
			                                   echo "<td>"; echo $reg_no; echo "</td>";
			                                   echo "<td>"; echo $course_id; echo "</td>";
			                                   echo "<td>"; echo $c_name; echo "</td>";
											   echo "<td>"; echo $row["Clo_name"]; echo "</td>";
											   echo "<td>"; echo $row["Obtained_%"]; echo "</td>";
											   echo "<td>"; echo $row["Status"]; echo "</td>";
												
										       
										        
												}
											   
											   
										   
										  
											
			                               echo "</tr>";
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
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
																	<select  class="form-control" name=program_id required="">
																	<?php
																	 $query1 = "SELECT * FROM program WHERE Dept_id = '$dept_id'";
																	 if($res=mysqli_query($link, $query1)){
																	while($row=mysqli_fetch_array($res)){?>
																	<option value=<?php echo $row["Prog_id"]; ?>>
																	<?php echo $row["Prog_name"]; echo "</option>"; }
																	 }
																	 ?>
																				
																	</select>
																	
																	</div>
																		</div>	
								    </td>
									</tr>
									<tr>
									<td>
									 <input type="submit" class="btn btn-default submit" name="submit2" value="Enter" required="">
									 </td>
									 </tr>
									</table>
								 </form>
									
								   <?php
								   if(isset($_POST['submit2'])){
									    $prog_id = $_POST["program_id"];	
										
									   ?>
									   <form name="form2" action="?prog_id=<?php echo $prog_id; ?>" method="post" class="col-lg-6">
								 <table class = "table table-bordered"> 
									      <tr>
								            <td>
								     			 <div class="container">
																	
																		<div class="form-group">
																	Select PLO
																	<select  class="form-control" name=ploname required="">
																	<?php
																	 $query1 = "SELECT P_name FROM plos WHERE Prog_id='$prog_id'";
																	 if($res=mysqli_query($link, $query1)){
																	while($row=mysqli_fetch_array($res)){
																		
																	   ?>
																	<option value=<?php echo $row["P_name"]; ?>>
																				<?php echo $row["P_name"]; echo "</option>"; }
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
																	Select Course
																	<select  class="form-control" name=course_id required="">
																	<?php
																	 $query1 = "SELECT Distinct C_id FROM course_clos";
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
									<td>
								     <div class="form-group">
																	Select CLOs
																	<select  class="form-control" name=cloname required="">
																	<?php
																	 $query1 = "SELECT Distinct Clo_name FROM course_clos";
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
								    <input type = "submit" class="btn btn-default submit" name="submit1" value="Submit" >
								    </td>
									</tr>									
								 </table>
								 </form>
																
								<?php
								   }
																
									 if(isset($_POST["submit1"])) {
										 
										
																		$query = "SELECT Dept_id FROM department_login WHERE username = '$username'";
																		
																		if(($res=mysqli_query($link, $query))==TRUE){
																		  $row = mysqli_fetch_array($res);
																		   $dept_id = $row["Dept_id"];
																		 
																		}
									
									 $sum = 0;	 
	                               
                                    $prog_id = $_GET["prog_id"];
                                    $plo_name = $_POST["ploname"];									
								   $course_id = $_POST["course_id"];
								   $cloname = $_POST["cloname"];
								   
							   	  
                               
                                     
                                        
										  	
	                                 $query = "insert into manage_plos values('$dept_id', '$prog_id', '$plo_name', '$course_id', '$cloname')";
									  
       
	                          if(mysqli_query($link, $query) == TRUE){
								  
								     

                                         ?>
                                   <div class="alert alert-success col-lg-6 col-lg-push-3">
                                      Inserted successfully
                                       </div>

                                          <?php	 
	                                       }
										   
									else{
									      ?>
                                   <div class="alert alert-success col-lg-6 col-lg-push-3">
                                      Failed! Please check your clos mapping
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
 include "footer.php";
?>
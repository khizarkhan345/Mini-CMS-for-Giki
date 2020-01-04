<?php
session_start();
  if(isset($_SESSION['username']))
    {
        $username=$_SESSION['username'];

       
    }
    else
    {
        header("location:examination_login.php");
    }
 include "examination_header.php";
 /*course inserted indicator*/
/* $i=0;
   if(isset($_GET['id'])){
        $i=$_GET["id"];
        $i++;
    }*/
?>


<?php

   /*Connection with database*/
   $link = mysqli_connect("localhost","root","");
    mysqli_select_db($link,"obe system");
       
                                    /*query for selecting emp_id from database*/
										$query = "SELECT Emp_id FROM examination_login
										WHERE username='$username'";
										
										if ($res = mysqli_query($link, $query)) {

										$row=mysqli_fetch_array($res);
										$emp_id=$row["Emp_id"];


										}
							
									

									
								
?>




<?php if(isset($_POST['department_id'])){
	$department_id=$_POST['department_id'];
}
elseif (isset($_GET['department_id'])) {
	$department_id=$_GET['department_id'];
}
else{
	$department_id="";
}
 ?>

        <!-- page content area main -->
        <div class="right_col" role="main">
	            <div class="">
	                <div class="page-title">
	                    <div class="title_left">
	                        <h3>Course Offering</h3>
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
				                                <h2>Set Course For each Program:</h2>
					                                <div class="clearfix">
					                                	
					                                </div>
				                            </div>
				                      
				                            <div class="x_content">

												<form name="form1" action="" method="post" class="col-lg-6">
													<table class = "table table-bordered">
															<tr>
															<td>
																<div class="container">
																		<!-- /*down here php code for selecting Departments name*/ -->
																		<?php

																		$query = "SELECT * FROM department";
																		$res = mysqli_query($link, $query);
																		?>

																		<div class="form-group">
																				<label for="sel1">Select Department :</label>
																				<select class="form-control" id="sel1" name=department_id>
																				<?php
																				while($row=mysqli_fetch_array($res)){?>
																				<option value=<?php echo $row["Dept_id"]; ?>>
																				<?php echo $row["Dept_name"]; echo "</option>"; }?>
																				</select>
																		</div>

                                                                 </div>
															</td>									
															</tr>
															<tr>
															<td>
															<input type = "submit" class="btn btn-primary" name="submit" value="Select Department" >
															</td>
															</tr>
														</table>
													</form>

													
												











                                                <form name="form1" action="?department_id=<?php echo $department_id; ?>" method="post" class="col-lg-6">
														<table  class = "table table-bordered">
															<tr>
															<td>

																	<div class="container">
																	<!-- /*down here php code for selecting program name*/ -->
																	<?php
																	$query = "SELECT * FROM program WHERE Dept_id='$department_id'";
																	$res = mysqli_query($link, $query);
																	?>

																	<div class="form-group">
																	<label for="sel1">Select Program :</label>
																	<select class="form-control" id="sel1" name=programe_id>
																	<?php
																	while($row=mysqli_fetch_array($res)){?>
																	<option value=<?php echo $row["Prog_id"]; ?>>
																	<?php echo $row["Prog_name"]; echo "</option>"; }?>
																	</select>
																	</div>

																	</div>
															</td>
															</tr>

															<tr>
															<td>
																	<div class="container">
																	<!-- /*down here php code for selecting course name*/ -->
																	<?php

																	$query = "SELECT * FROM courses";
																	$res = mysqli_query($link, $query);
																	?>

																	<div class="form-group">
																	<label for="sel1">Select Course :</label>
																	<select class="form-control" id="sel1" name=course_id>
																	<?php
																	while($row=mysqli_fetch_array($res)){?>
																	<option value=<?php echo $row["C_id"]; ?>>
																	<?php echo $row["C_name"]; echo "</option>"; }?>
																	</select>
																	</div>

																	</div>
															</td>
															</tr>
															<tr>
															<td>
																	<div class="container">
																	<!-- /*down here php code for selecting instructor name*/ -->
																	<?php

																	$query = "SELECT * FROM instructor WHERE Dept_id='$department_id'";
																	$res = mysqli_query($link, $query);
																	?>

																	<div class="form-group">
																	<label for="sel1">Select Instructor :</label>
																	<select class="form-control" id="sel1" name=instructor_id>
																	<?php
																	while($row=mysqli_fetch_array($res)){?>
																	<option value=<?php echo $row["Inst_id"]; ?>>
																	<?php echo $row["Inst_name"]; echo "</option>"; }?>
																	</select>
																	</div>

																	</div>
															</td>
															</tr>
															<tr>
															<td>
																	<div class="container">
																	<div class="form-group">
																	<label for="sel1">Select Semester :</label>
																	<select class="form-control" id="sel1" name=samester>
																	<option value="Fall">Fall</option>
																	<option value="Spring">Spring</option>
																	</select>
																	</div>

																	</div>
															</td>
															</tr>
															<tr>
															<td>
															<label for="sel1">Year :</label>
															<input type = "text" class="form-control" name="year" required="" placeholder="Enter Year e.g. 2019">
															</td>
															</tr>	
															<tr>
															<td>
															<input type = "submit" class="btn btn-primary" name="submit1" value="Add Course" >
															</td>
															</tr>						
													</table>
												</form>





















                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->
}
<?php		
		  /*Select emp_id from the emp table using username*/


        if(isset($_POST["submit1"])){

								 $department_id=$_GET['department_id'];
								 $programe_id= $_POST['programe_id'];
	                             $course_id = $_POST['course_id'];
	                             $instructor_id= $_POST['instructor_id'];
								 $samester  = $_POST['samester'];
                                 $year=$_POST['year'];
	                            $query = "insert into course_offering values('$department_id', '$programe_id', '$emp_id','$course_id','$instructor_id','$samester','$year')";
	                            
                                if(mysqli_query($link, $query)==TRUE){
									
                                  echo "<script> window.open('view_course.php','_self'); </script>";
                                 }
                                 

                      }
                          ?>
<?php
 include "examination_footer.php";
?>

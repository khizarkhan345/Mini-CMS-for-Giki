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
                                <h2>Calculate student CLOs</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <form name="form2" action="" method="post" class="col-lg-6">
								 <table class = "table table-bordered">
								  <tr>
								   <td>
								     				<!-- /*down here php code for selecting Departments name*/ -->
																		<?php

																		$query = "SELECT Dept_id FROM department_login WHERE username = '$username'";
																		
																		if(($res=mysqli_query($link, $query))==TRUE){
																		  $row = mysqli_fetch_array($res);
																		   $dept_id = $row["Dept_id"];
																		 
																		}
																		 
																		
																		?>

																		<div class="form-group">
																	SELECT Program
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
									  
									   $Prog_id = $_POST["program_id"];
									  ?>
                                        <form name="form1" action="?prog_id=<?php echo $Prog_id; ?>" method="post" class="col-lg-6">
								 <table class = "table table-bordered">
								  
									<tr>
									<td>
									 <tr>
								   <td>
								     			 <div class="container">
																	
																		<div class="form-group">
																	Select Student
																	<select  class="form-control" name=reg_no>
																	<?php
																	 $query7 = "SELECT Distinct Reg_no FROM student WHERE Prog_id='$Prog_id'";
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
									</td>
									</tr>
									
									<tr>
									 <td>
									    <div class="container">
																	
																		<div class="form-group">
																	Select PLO
																	<select  class="form-control" name=ploname>
																	<?php
																	 $query7 = "SELECT Distinct P_name FROM plos WHERE Prog_id='$Prog_id'";
																	 if($res=mysqli_query($link, $query7)){
																	while($row=mysqli_fetch_array($res)){
																	   ?>																	   
																	<option value=<?php echo $row["P_name"]; ?>>
																				<?php echo $row["P_name"]; echo "</option>"; 
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
									 <input type="submit" class="btn btn-default submit" name="submit1" value="Enter">
									 </td>
									 </tr>
									</table>
								 </form>
																		  
									<?php  
								   }
								   
								   if(isset($_POST["submit1"])){
									 $prog_id = $_GET["prog_id"];
									 $reg_no = $_POST["reg_no"];
                                     $ploname = $_POST["ploname"];
									$sum=0;
									 $i=0;
                                    
                                      $query1="SELECT C_id, Clo_name FROM manage_plos WHERE Prog_id='$prog_id' and P_name='$ploname'";
                                   
                                      if(($res1=mysqli_query($link, $query1))==TRUE){
                                         While($row1=mysqli_fetch_array($res1)){
										   $C_id = $row1["C_id"];
										   $Clo_name=$row1["Clo_name"];
										   echo $C_id;
									   echo $Clo_name;
									    
									    $query2="SELECT * FROM student_clo_record WHERE C_id='$C_id' and Clo_name='$Clo_name' and Reg_no='$reg_no'";
										   
                                      if(($res2=mysqli_query($link, $query2))==TRUE){
                                         While($row2=mysqli_fetch_array($res2)){
										   $obtain = $row2["Obtained_%"];
										    //echo $obtain; ?> <br> <?php
										    $sum=$sum+$obtain;
											echo "Helloo";
											$i++;
										 }
									    
										}
										
										 }											 
									  
									  }
									  echo $sum; ?> <br> <?php									  
								      
										echo $i;
										
									$average = ($sum/$i);
								if($average>=60){	
                                $query3="insert into student_plo_record values('$reg_no','$ploname','Pass')";									
								}else
								{
									 $query3="insert into student_plo_record values('$reg_no','$ploname','Fail')";
								 
								}	
                                    if(mysqli_query($link, $query3)==TRUE){
										?>
									  <div class="alert alert-success col-lg-6 col-lg-push-3">
                                      PLO record inserted successfully
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
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

?>


<?php

   /*Connection with database*/
   $link = mysqli_connect("localhost","root","");
    mysqli_select_db($link,"obe system");								
?>


        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>View Course</h3>
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

				<!-- php code for select all column from course_offering -->
						<?php
						$query = "SELECT * FROM course_offering";
						$res = mysqli_query($link, $query); 
						?>
<!-- added code start  -->
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">S.NO.</th>
      <th scope="col">Department Name</th>
      <th scope="col">Program Name</th>
      <th scope="col">Course Name</th>
      <th scope="col">Instructor Name</th>
      <th scope="col">Samester</th>
      <th scope="col">Year</th>
      
    </tr>
  </thead>
  <tbody>
  	<?php 
    $i=0;
  	while($row=mysqli_fetch_array($res)){
      $i++;
            $query = "SELECT Dept_name FROM department WHERE Dept_id='$row[Dept_id]'";

            $result = mysqli_query($link, $query); 
            if(($output=mysqli_fetch_array($result))==TRUE)
            {$Dept_name=$output["Dept_name"];}
            
            $query = "SELECT Prog_name FROM program WHERE Prog_id='$row[Prog_id]'";
            $result = mysqli_query($link, $query); 
            if(($output=mysqli_fetch_array($result))==TRUE)
            {$prog_name=$output["Prog_name"];}
            
            $query = "SELECT C_name FROM courses WHERE C_id='$row[C_id]'";
            $result = mysqli_query($link, $query); 
            if(($output=mysqli_fetch_array($result))==TRUE)
            {$course_name=$output["C_name"];}
           
            $query = "SELECT Inst_name FROM instructor WHERE Inst_id='$row[Inst_id]'";
            $result = mysqli_query($link, $query); 
            if(($output=mysqli_fetch_array($result))==TRUE)
            {$instr_name=$output["Inst_name"];}
             
  		echo "<tr>";
     echo '<th scope="row">'; echo $i;  echo "</th>";
     echo "<td>"; echo $Dept_name;  echo "</td>";
     echo "<td>"; echo $prog_name; echo "</td>";
     echo "<td>"; echo $course_name;  echo "</td>";
     echo "<td>"; echo $instr_name;  echo "</td>";
     echo "<td>"; echo $row["Semester"];  echo "</td>";
     echo "<td>"; echo $row["Year"];  echo "</td>";
    
            }
            
            
    echo "</tr>";
  	
   
   

?>


  </tbody>
</table>
<!-- added code end  -->







                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->

<?php
 include "examination_footer.php";
?>

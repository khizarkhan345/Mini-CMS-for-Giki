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
                        <h3>Student PLO Transcript</h3>
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













<form class="form-inline" action="plo_transcript.php" method="post">
   <!-- <label>Enter Reg. Number:</label> -->
  <div class="form-group mx-sm-3 mb-2">
    <input type="text" class="form-control" name="reg" placeholder="Enter Reg. Number" required="">
  </div>
  <button type="submit" class="btn btn-primary mb-2" name="submit">Search</button>
</form>

















				

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Reg#</th>
      <th scope="col">PLO Name</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  
  	<?php 
   if(isset($_POST['submit'])){
   	  	echo "<tbody>";
  	/*php code for select all column from student_plo_record*/
  	$reg=$_POST['reg'];
	$query = "SELECT * FROM student_plo_record WHERE Reg_no=$reg";
	
	$res = mysqli_query($link, $query); 

  	while($row=mysqli_fetch_array($res)){
  		echo "<tr>";
     echo '<th scope="row">'; echo $row["Reg_no"];  echo "</th>";
     echo "<td>"; echo $row["P_name"];  echo "</td>";
     
     echo "<td>"; echo $row["Status"];  echo "</td>";
    echo "</tr>";
  	}
   
   echo "</tbody>";
   }


?>


  
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

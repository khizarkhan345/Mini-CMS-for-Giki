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
 include "header.php";
?>
        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Add Courses</h3>
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
                                <h2>Add Courses</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
							
                                <form name="form1" action="" method="post" class="col-lg-6">
								 <table class = "table table-bordered">
								  <tr>
								   <td>
								    Course Code <br>
								    <input type = "text" class="form-control" name="coursecode" required="">
								   </td>									
								  </tr>
								  <tr>
								   <td>
								    Course Name <br>
								    <input type = "text" class="form-control" name="coursename"  required="">
								    </td>
									</tr>
								  <tr>
								   <td>
								    Credit Hours <br>
								    <input type = "text" class="form-control" name="credithrs" required="">
								    </td>
									</tr>
								  	
                                   <tr>
								   <td>
								    <input type = "submit" class="btn btn-default submit" name="submit1" value="Submit" >
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
		<?php
    
   if(isset($_POST["submit1"])){
	    $coursecode = $_POST["coursecode"];
	 $coursename = $_POST["coursename"];
	 $credithrs = $_POST["credithrs"];
	   $link = mysqli_connect("localhost","root","");
	   mysqli_select_db($link,"obe system");
	   $query = "insert into courses values('$coursecode', '$coursename', '$credithrs')";
       
	   if(mysqli_query($link, $query) == TRUE){

     ?>
      <div class="alert alert-success col-lg-6 col-lg-push-3">
        Course inserted successfully
    </div>

    <?php	 
	   }   
   }
?>

<?php
 include "footer.php";
?>
       
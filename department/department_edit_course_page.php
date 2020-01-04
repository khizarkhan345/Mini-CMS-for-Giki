<?php
session_start();
 session_start();
  if(isset($_SESSION['username']))
    {
        $username=$_SESSION['username'];

       
    }
    else
    {
        header("location:department_login.php");
    }


/*Connection with database*/
$link = mysqli_connect("localhost","root","");
mysqli_select_db($link,"obe system");


$id =count($_GET)-1;


        /*query for selecting emp_id from database*/
            $query = "SELECT Emp_id FROM examination_login
            WHERE username='$username'";
            
            if ($res = mysqli_query($link, $query)) {

            $row=mysqli_fetch_array($res);
            $emp_id=$row["Emp_id"]; }

/*     select repectivite name from id */
           $Dept_id=$_GET[$id]['Dept_id'];

            $pro_id=$_GET[$id]['Prog_id'];

            $course_id=$_GET[$id]['course_id'];

            $inst_id=$_GET[$id]['instr_id'];
            $samester=$_GET[$id]['semester'];
           $year=$_GET[$id]['year'];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Plain Page | LMS </title>


    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/nprogress.css" rel="stylesheet">
    <link href="css/custom.min.css" rel="stylesheet">
</head>

<body >
<div class="container-fluid" style="align-items: center; width: 60%">


     <!-- page content area main -->
        <div class="center-block" >
            <div class="">
                <div class="page-title">
                    <div class="title_center">
                        <h3 style="color: white;text-align: center;">Edit Course</h3>
                    </div>
<!-- 
                    <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                            </div>
                        </div>
                    </div> -->
                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
<!--                             <div class="x_title">
                                <h2>Plain Page</h2>

                                <div class="clearfix"></div>
                            </div> -->
                            <div class="x_content">
                                                <form name="form1" action="" method="post" class="col-lg-12">
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
                                                                    <div class="container">
                                                                    <!-- /*down here php code for selecting program name*/ -->
                                                                    <?php

                                                                    $query = "SELECT * FROM program";
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

                                                                    $query = "SELECT * FROM instructor";
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
                                                            <label for="sel1">Year :</label>
                                                            <input type = "text" class="form-control" name="year" required="" placeholder="Enter Year e.g. 2019">
                                                            </td>
                                                            </tr>   
                                                            <tr>
                                                            <td>
                                                            <div class="form-row">
                                                            <div class="form-group col-sm-2">
                                                            <input type = "submit" class="btn btn-primary" name="submit" value="Edit Course" >
                                                            </div>
                                                            <div class="form-group col-sm-2">
                                                            <button type="button" class="btn btn-primary"> <a style="color: white" href="department_edit_delete_course.php" target="_self">Cancel</a> </button>
                                                            </div>
                                                            </div>
                                                            </td>
                                                            </tr>                      
                                                    </table>
                                                </form
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->




       




    <!-- <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="#" class="site_title"><i class="fa fa-book"></i> <span>LMS</span></a>
                </div> -->






        <!-- footer content -->
<!--         <footer>
            <div class="pull-right">
                Library Management System
            </div>
            <div class="clearfix"></div>
        </footer> -->
        <!-- /footer content -->
<!--     </div>
</div>
</div> -->
</div>
<!-- jQuery -->
<script src="js/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="js/fastclick.js"></script>
<!-- NProgress -->
<script src="js/nprogress.js"></script>

<!-- Custom Theme Scripts -->
<script src="js/custom.min.js"></script>
</body>
</html>

<?php 

   if(isset($_POST["submit"])){
         $department_id_form=$_POST['department_id'];
         $programe_id_form= $_POST['programe_id'];
         $course_id_form= $_POST['course_id'];
         $instructor_id_form= $_POST['instructor_id'];
         $samester_form= $_POST['samester'];
         $year_form=$_POST['year'];
    

      $query= "UPDATE course_offering SET Dept_id = '$department_id_form' , Prog_id='$programe_id_form' , Emp_id='$emp_id' , C_id='$course_id_form' , Inst_id='$instructor_id_form' , Semester='$samester_form' , Year='$year_form' WHERE Dept_id='$Dept_id' and Prog_id='$pro_id' and  C_id='$course_id' and Inst_id='$inst_id' and Semester='$samester' and Year='$year'";
      
      
       if(mysqli_query($link, $query)){
        /*header("location:edit_delete_course.php");*/
        echo "<script> window.open('department_edit_delete_course.php','_self'); </script>";
       }
       else {
        echo "not working";
       /* echo "<script> window.open('edit_delete_course.php','_self'); </script>";*/
       }

   }
 


 ?>
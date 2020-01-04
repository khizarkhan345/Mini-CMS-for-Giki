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


/*Connection with database*/
$link = mysqli_connect("localhost","root","");
mysqli_select_db($link,"obe system");


$id =count($_GET)-1;

/*     select repectivite name from id */
           $Dept_id=$_GET[$id]['Dept_id'];
          
            $query = "SELECT Dept_name FROM department WHERE Dept_id='$Dept_id'";
            $result = mysqli_query($link, $query); 
            if(($output=mysqli_fetch_array($result))==TRUE)
            {$Dept_name=$output["Dept_name"];}
            $pro_id=$_GET[$id]['Prog_id'];
            $query = "SELECT Prog_name FROM program WHERE Prog_id='$pro_id'";
            $result = mysqli_query($link, $query); 
            if(($output=mysqli_fetch_array($result))==TRUE)
            {$prog_name=$output["Prog_name"];}
            $course_id=$_GET[$id]['course_id'];
            $query = "SELECT C_name FROM courses WHERE C_id='$course_id'";
            $result = mysqli_query($link, $query); 
            if(($output=mysqli_fetch_array($result))==TRUE)
            {$course_name=$output["C_name"];}
            $inst_id=$_GET[$id]['instr_id'];
            $query = "SELECT Inst_name FROM instructor WHERE Inst_id='$inst_id'";
            $result = mysqli_query($link, $query); 
            if(($output=mysqli_fetch_array($result))==TRUE)
            {$instr_name=$output["Inst_name"];}
           $samester=$_GET[$id]['semester'];
           $year=$_GET[$id]['year'];



           /*select emp name from username*/
                                               /*query for selecting emp_id from database*/
                                      /*  $query = "SELECT Emp_id FROM examination_login
                                        WHERE username='$username'";
                                        
                                        if ($res = mysqli_query($link, $query)) {

                                        $row=mysqli_fetch_array($res);
                                        $emp_id=$row["Emp_id"];}*/
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
                        <h3 style="color: white;text-align: center;">Delete Course</h3>
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
                                    Department: <br>
                                    <input type = "text" class="form-control" value="<?php echo $Dept_name; ?>"  readonly>
                                   </td>                                    
                                  </tr>
                                  <tr>
                                   <td>
                                    Program: <br>
                                    <input type = "text" class="form-control" value="<?php echo $prog_name; ?>"   readonly >
                                    </td>
                                    </tr>
                                  <tr>
                                   <td>
                                    Course:<br>
                                    <input type = "text" class="form-control" value="<?php echo $course_name; ?>"  readonly >
                                    </td>
                                    </tr>
                                  <tr>
                                  
                                   <td>
                                    Instructor: <br>
                                    <input type = "text" class="form-control" value="<?php echo $instr_name; ?>"  readonly>
                                    </td>
                                    </tr>
                                   <tr>
                                   <td>
                                    Semester: <br>
                                    <input type = "text" class="form-control" value="<?php echo $_GET[$id]['semester']; ?>" readonly >
                                    </td>
                                    </tr>
                                    <tr>
                                    <td>
                                    Year: <br>
                                    <input type = "text" class="form-control" value="<?php echo $_GET[$id]['year']; ?>"  readonly>
                                    </td>
                                    </tr> 
                                    <tr>
                                    <td>
                                    <div class="form-row">
                                    <div class="form-group col-sm-2">
                                    <input type = "submit" class="btn btn-primary" name="submit" value="Delete Course" >
                                    </div>
                                    <div class="form-group col-sm-2">
                                    <button type="button" class="btn btn-primary"> <a style="color: white" href="edit_delete_course.php" target="_self">Cancel</a> </button>
                                    </div>
                                    </div>
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
    
       $query="DELETE FROM course_offering WHERE Dept_id='$Dept_id' and Prog_id='$pro_id'  and C_id='$course_id' and Inst_id='$inst_id' and Semester='$samester' and Year='$year'";
      
       if(mysqli_query($link, $query)){
        /*header("location:edit_delete_course.php");*/
        echo "<script> window.open('edit_delete_course.php','_self'); </script>";
       }
       else {
         echo "<script> window.open('edit_delete_course.php','_self'); </script>";
       }

   }
 




 ?>
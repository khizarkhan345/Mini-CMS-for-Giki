<?php
session_start();
 /*Connection with database*/
   $link = mysqli_connect("localhost","root","");
    mysqli_select_db($link,"obe system");
    $invalid_id="";
    if(isset($_GET['id'])){
        $invalid_id=$_GET["id"];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Student Login Form | LMS </title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/custom.min.css" rel="stylesheet">
</head>

<br>

<div class="col-lg-12 text-center ">
    <h1 style="font-family:Lucida Console">OBE System</h1>
</div>

<br>

<body class="login">


<div class="login_wrapper">

    <section class="login_content">
        <form name="form1" action="" method="post">
            <h2>Department Login </h2>

            <div>
                <input type="text" name="username" class="form-control" placeholder="Username" required=""/>
            </div>
            <div>
                <input type="password" name="password" class="form-control" placeholder="Password" required=""/>
            </div>
            <div>

                <input class="btn btn-default submit" type="submit" name="submit" value="Login">
                
            </div>

            <div class="clearfix"></div>

            <div class="separator">
                <p class="change_link">Back to Home Page?
                    <a href="../"> Home Page </a>
                </p>

                <div class="clearfix"></div>
                <br/>


            </div>
        </form>
    </section>


</div>


<?php  /*for invalid username or password*/
if($invalid_id==1){

echo '<div class="alert alert-danger col-lg-6 col-lg-push-3">
    <strong style="color:white">Invalid</strong> Username Or Password.
</div>';

} ?>


</body>
</html>

<?php       
          
   
        if(isset($_POST["submit"])){
            
                                 $username=$_POST["username"];
                                 $password= $_POST["password"];
                                $query = "SELECT * FROM department_login
                                          WHERE username='$username' AND Password='$password' LIMIT 1";
                                         /* $result=mysqli_query($link, $query);*/
										 

                                if(($res=mysqli_query($link, $query))==TRUE){
                                    $row=mysqli_fetch_array($res);
                                         if($username==$row["username"] and $password==$row["Password"]){

                                          $_SESSION['username']=$_POST['username'];
                                          
                                          header("location:Add_courses.php");
                                         }
                                          else{
                                    header("location:department_login.php?id=1");
                                }
                                    
                                    }
                                     else{
                                    header("location:department_login.php?id=1");
                                }
                           ?>
<!--                             <div class="alert alert-success col-lg-6 col-lg-push-3">
                              Course inserted successfully
                            </div>
 -->
                       <?php     
                                }
       
               
?>


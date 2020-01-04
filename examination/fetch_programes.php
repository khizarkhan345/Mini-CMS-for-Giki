<?php
   /*Connection with database*/
   $link = mysqli_connect("localhost","root","");
    mysqli_select_db($link,"obe system");
    $id=$_REQUEST["id"];

    /*php code for selecting Departments name*/
     $query = "SELECT * FROM program
                WHERE Dept_id='$id'";
     $res = mysqli_query($link, $query);
     while($rows=mysqli_fetch_array($res))
     {
     	$program_id=$rows['Prog_id'];
     	$program_name=$row['Prog_name'];
     
                                        
?>
        <select class="form-control" id="sel1" name=$department_name>
        <?php
        while($row=mysqli_fetch_array($res)){
		                                   
		 ?> <option value=<?php echo $row["Dept_id"]; ?>> <?php echo $row["Dept_name"]; echo "</option>";
	        }?>
          
      </select>


<!-- *********** script that is will put down the course_offering.php page
 --><!-- 
      <script>
      	$(document).ready(function(){
      		$('select').on('change', function() {
      			var dep_id=this.value;
      			var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    	alert(this.responseText);
    }
  };
  xhttp.open("GET", "fetch_programes.php?id="+dep_id, true);
  xhttp.send();
});
});
      </script>	 -->	  

<?php 
include_once 'database.php';
?>
<!DOCTYPE html>
<html>
    
    <head>
        <title>House Assistants Registration</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->	
        <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->	
        <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="css/util.css">
        <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->
    <style>
        body {
           
            margin: 1 20%;
            text-align:left;
        }
        
        h3 {
            text-align: center;
        }
    </style>

    </head>
  <body>
      
    <div class="limiter">
		<div class="containerdataentry">
			<div class="wrap-dataentry">
                <h1> New house assistant Registration </h1>
                <br>
	<form method="post" action="House_Assistants.php" onSubmit="alert('When you click ok ,a new House Assistant Record will be  created!')">
        <label for ="NatID"> NationalID: </label><br>
        <input class="input100" type="number" name="NatID" id ="NatID">
        <span class="focus-input100"></span>
		<span class="symbol-input100"></span>
		<br>
        <label for ="DOB">Date of Birth: </label><br>
		<input  class="input100" type="date" name="DOB" id ="dob">
		<br>
        <label for ="fname">First name: </label><br>
		<input  class="input100"type="text" name="fname" id ="fname">
		<br>
		<label for ="lname">Last name: </label> <br>
		<input  class="input100" type="text" name="lname">
		<br>
        <label for ="gender">Gender :</label> <br>
        <select  class="input100" name ="gender" id ="gender">
        <option value ="F"> Female </option>
        <option value ="M"> Male </option> </select>
        <br>

        <label for ="prefStructure">Preffered Working structure ?</label> <br>
        <select class="input100" name ="prefStructure" id ="structure">
        <option value ="Commute"> Commute </option>
        <option value ="Stay in"> Stay in </option> </select>
        <br>
        
		<label for ="phone">Telephone Number: </label> <br>
		<input  class="input100" type="Number" name="phone">
        <br>
        <label for ="ephone">Emergency Contact: </label> <br>
		<input class="input100" type="Number" name="ephone">
		
        <br>
        <label for ="rating">On a scale of 1 to 5, please rate the house assistant with 5 being the highest and 1 the lowest</label> <br>
		<select  class="input100" name ="rating" id ="rating">
        <option value ="1"> 1 </option>
        <option value ="2"> 2 </option>
        <option value ="3"> 3 </option>
        <option value ="4"> 4 </option>
        <option value ="5"> 5 </option> 
    </select>
        <br>
        <label for ="goodconduct">Good conduct clearance:</label> <br>
        <select class="input100"  name ="goodconduct" id ="goodconduct">
        <option value ="Cleared"> Cleared </option>
        <option value ="Pending"> Pending</option>
		<option value ="Not Cleared"> Not cleared</option> </select>
		<br>
		
		


        
        <br> <br>
        <div class="container-submit100-form-btn"></div>
		<input  class ="login100-form-btn" type="submit" name="save" value="submit">
    </form>
</div>
</div>

</div>
  </body>

</html>


<?php

if(isset($_POST['save']))
{	 
     $NatID = $_POST['NatID'];
	 $DOB = date("Y-m-d", strtotime($_POST['DOB']));
	 $gender= $_POST['gender'];
	 $fname = $_POST['fname'];
	 $lname = $_POST['lname'];
     $structure = $_POST['prefStructure'];
     $phone = $_POST['phone'];
     $ephone = $_POST['ephone'];
     $rating = $_POST['rating'];
     $goodconduct = $_POST['goodconduct'];
	 $sql = "INSERT INTO House_Assistant (National_ID,DOB,Gender,Fname,Lname,working_structure,Telephone_Number,E_Contact,Rating,Good_Conduct_clearance)
	 VALUES ('$NatID','$DOB','$gender','$fname','$lname','$structure','$phone','$ephone','$rating','$goodconduct')";

	 if (!mysqli_query($conn, $sql))  {
		echo "Error: " . $sql . "
" . mysqli_error($conn);
	 }
	 mysqli_close($conn);
}
?>
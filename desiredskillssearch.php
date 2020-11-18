<?php 
include_once 'database.php';
?>
<!DOCTYPE html>
<html>
    
    <head>
        <title>House Assistants Skills Registration</title>
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
                <h1> Employer Desired skills Registration </h1>
                <br>
                <br>
	<form method="post" action="desiredskills.php" )>
        <label for ="name"> Please enter the Employer's National ID Number  </label>
        <input type = "number" class ="input100" name ="NatID" id ="NatID">

        
        
        <br> <br>
        <div class="container-submit100-form-btn"></div>
		<input  class ="login100-form-btn" type="submit" name="save" value="submit">
    </form>
</div>
</div>

</div>
  </body>

</html>



<?php 
include_once 'database.php';
?>
<!DOCTYPE html>
<html>
    
    <head>
        <title>Payment Processing</title>
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
                <h1> Transaction Registration </h1>
                <br>
	<form method="post" action="payment.php" onSubmit="alert('When you click ok ,a new salary payment will be filled, please esnure you have filled all required fields!')">
        <!--House Assisnta Registartion -->
        <label for ="HID">Please select  the House Assistant's ID number </label> <br>
		<?php 


        echo "<select name ='HID' class='input100' >
        <option> House Assistant  </option>";
 
		$sqli = "SELECT * FROM house_assistant";
		$result = mysqli_query($conn, $sqli);
		while ($row = mysqli_fetch_array($result)) {
		echo "<option value =$row[HID]>$row[National_ID].$row[Fname] </option>";
		}
 
		echo '</select>';
 
			?>
		<br>
        <!--Employers -->
        <label for ="EID"> Please select the Employers ID Number and Name Below: </label><br>
        <?php 


        echo "<select name ='EID' class='input100' >
        <option> Employer </option>";
 
		$sqli = "SELECT * FROM employers";
		$result = mysqli_query($conn, $sqli);
		while ($row = mysqli_fetch_array($result)) {
		echo "<option value =$row[EID]>$row[National_ID].$row[Fname] </option>";
		}
 
		echo '</select>';
 
			?>
		<br>
        <!--Company employee -->
        <label for="CEID"> Please select the Company Employee ID Number and Name Below:</label><br>
        <?php 


        echo "<select name ='CEID' class='input100' >
        <option> Company Employee </option>";
 
		$sqli = "SELECT * FROM company_employee";
		$result = mysqli_query($conn, $sqli);
		while ($row = mysqli_fetch_array($result)) {
		echo "<option value =$row[CEID]>$row[National_ID] ;$row[Fname] </option>";
		}
 
		echo '</select>';
 
			?>
		<br>
        <label for ="month">Payment Month </label><br>
		<select class="input100" name ="month" id ="month">
        <option > Payment Month </option>
        <option value ="January"> January </option>
        <option value ="February"> February </option> 
        <option value ="March"> March </option> 
        <option value ="April"> April</option> 
        <option value ="May"> May </option> 
        <option value ="June"> June </option> 
        <option value ="July"> July </option> 
        <option value ="August"> August </option> 
        <option value ="September"> September </option> 
        <option value ="October"> October </option> 
        <option value ="November"> November </option> 
        <option value ="December"> December </option> 
        </select>
        
		<br>
        <label for ="amount"> Amount</label><br>
        <input  class="input100" type="number" name="amount" id ="amount">

		
		


        
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
     $HID = $_POST['HID'];
	 $time_stamp = date("Y-m-d H:i:s");
	 $EID= $_POST['EID'];
	
	 $CEID = $_POST['CEID'];
     $month = $_POST['month'];
     $amount = $_POST['amount'];
     
	 $sql = "INSERT INTO payment (HID,EID,CEID,Month,time_stamp,amount)
	 VALUES ('$HID','$EID','$CEID','$month','$time_stamp','$amount')";

	 if (!mysqli_query($conn, $sql))  {
		echo "Error: " . $sql . "
" . mysqli_error($conn);
	 }
	 mysqli_close($conn);
}
?>
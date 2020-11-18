<?php 
include_once 'database.php';
?>
<?php
$NatID= $_POST['NatID'];
        $sql= "SELECT * from employers where National_ID ='$NatID'";
        $result=mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($result);
            
           $fname=$row['Fname'];
           
            
        
        
        
        ?>
<!DOCTYPE html>
<html>
    
    <head>
        <title>Employers Skills Registration</title>
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
                <h1> Employer's Desired Skills Registration </h1>
                <br>

        <form method="post" action="desiredskills.php" onSubmit="alert('When you click ok ,the employer's desired will be updated!')">
        
        <p> Please confirm the employer's name and then update the skills they are looking for below  </p>
        <br>
        
        <label for="name"> Employers Name </label>
        <input type = "text" class ="input100" name ="name" value = <?php echo $fname ?> >
        
		
		<label for ="skills">Please select the  skills that the employer is looking for</label> <br>
		<?php 


        echo "<select name ='skills' class='input100' >
        <option>Select</option>";
 
		$sqli = "SELECT * FROM skills";
		$result = mysqli_query($conn, $sqli);
		while ($row = mysqli_fetch_array($result)) {
		echo "<option value =$row[SID]>$row[name] </option>";
		}
 
		echo '</select>';
 
			?>
        
        
        <br> <br>
        <div class="container-submit100-form-btn">
        <input  class ="login100-form-btn" type="submit" name="save" value="submit"> </div>
    </form>
        </div>
</div>

</div>
  </body>

</html>

<?php
if(isset($_POST['save']))
{
$sqlID= "SELECT * from employers where National_ID ='$NatID'";
$resultID=mysqli_query($conn,$sqlID);
$rowID = mysqli_fetch_array($resultID);
$ID=$rowID['EID'];
$skillID=$_POST['skills'];
$sqli = "INSERT INTO desired_skills (SID,EID)
	 VALUES ('$skillID','$ID')";

if (!mysqli_query($conn, $sql))  {
    echo "Error: " . $sql . "
" . mysqli_error($conn);
 }
 mysqli_close($conn);
}
?>
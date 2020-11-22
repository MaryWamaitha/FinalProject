<?php 
include_once 'database.php';
?>
<?php 
$NatID= $_POST['NatID'];
        $sql= "SELECT * from house_assistant where National_ID ='$NatID'";
        $result=mysqli_query($conn,$sql);
        $row = mysqli_fetch_array( $result);
            
           $fname=$row['Fname'];
            $lname=$row['Lname'];
            
        
        
        
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
                <h1> House assistant Skills Registration </h1>
                <br>

        <form method="post" action="Possesedskills.php" onSubmit="alert('When you click ok ,the house assistant skill will be updated!')">
        
        <p> Please confirm the house assistant's name and then update their skills below </p>
        <br>
        
        <label for="name"> House Assistant Name </label>
        <input type = "text" class ="input100" name ="name" value = <?php echo $fname. " ".$lname ?> >
        
		
		<label for ="skills">Please select the employees skills </label> <br>
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
$sqlID= "SELECT HID from house_assistant where National_ID ='$NatID'";
$resultID=mysqli_query($conn,$sqlID);
$rowID = mysqli_fetch_array( $resultID);
$ID=$rowID['HID'];
$skillID=$_POST['skills'];
$sqli = "INSERT INTO possesed_skills (SID,HID)
	 VALUES ('$skillID','$ID')";

if (!mysqli_query($conn, $sql))  {
    echo "Error: " . $sql . "
" . mysqli_error($conn);
 }
 mysqli_close($conn);
}
?>
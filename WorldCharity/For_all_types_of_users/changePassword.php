<?php
     
     require_once("header.php");
	 require_once("dbconnect.php");
?>


<?php 

    if(isset($_POST['change'])){ 
		
		$oldPass= md5($_POST['currentPassword']);
		$sql="SELECT * FROM charity  
		      WHERE email='$_SESSION[email]' AND password='$oldPass'";
		
		$rs= mysqli_query($connect, $sql);
		$count= mysqli_num_rows($rs);
		
		if($count>=0){
			
					$error=0;
				
				 if($_POST['pass']!=$_POST['cpass']){
					 
					 $misspass='Password and Confirm-Password mismatched.<br>';
					 $error=1;
				 }
				 
				 if(strlen($_POST['pass'])<6){
					 
					 $passLength='Password must be more then 5 characters.';
					 $error=1;
				 }
				 
				 if($error>0){
					 
					 echo "<b style='color:brown;'>Please follow the instruction.</b>";
				 
				 }
				 
				 else{
					 
					 $pass=md5($_POST['pass']);
					 
					 $updatePassword="UPDATE charity SET    
					                   password='$pass'    
									   WHERE id='$_SESSION[userId]'";
									  
					mysqli_query($connect, $updatePassword);	

                    echo "<h4 style='color:green;'> Successfully update your password.</h3>";					
					 
				 }
			
		}
		
		else{
			echo "<h4 style='color:red;'> Your given password is invalid. Please re-type your current password.</h4>";
		}
	}

?>



<h1>Change Your Password</h1>

<form action="" method="post" >

<table>

        <tr>
			<td>Current Password</td><td>:</td><td><input type="password" name="currentPassword" placeholder="Type your current password" required> <b style="color:red;">*</b></td>
		</tr>
		
  
		<tr>
			<td>New Password</td><td>:</td><td><input type="password" name="pass" required  value="<?php  if(isset($_POST['pass'])) {echo $_POST['pass'];} ?>"> <b style="color:red;">*</b></td>
		</tr>
		
		<tr>	
			<td></td><td></td><td><b style="color:red;">
					
					<?php  if(isset($misspass)) {echo $misspass ;} ?><br>
					 <?php  if(isset($passLength)) {echo $passLength ;} ?>
					 
			</b></td>
		</tr>

		<tr>	
			<td>Confirm New Password</td><td>:</td><td><input type="password" name="cpass" required  value="<?php  if(isset($_POST['cpass'])) {echo $_POST['cpass'];} ?>" > <b style="color:red;">*</b></td>
		</tr>
		
		<tr>
		<td></td><td></td><td><input type="submit" name="change" value="Change"></td>
	</tr> 

</table>

</form>
			
<?php
     require_once("footer.php");
?>	
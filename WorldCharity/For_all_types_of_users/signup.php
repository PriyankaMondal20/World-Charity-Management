<?php
     
     require_once("header.php");
	 require_once("dbconnect.php"); 
	 
?>


<?php 

    if(isset($_POST['sub'])){
		
		$error=0;
		
	     if($_POST['pass']!=$_POST['cpass']){
			 
			 $misspass='Password and Confirm-Password mismatched.<br>';
			 $error=1;
		 }
		 
		 if(strlen($_POST['pass'])<6){
			 
			 $passLength='Password must be more then 5 characters.';
			 $error=1;
		 }
		 
		 
		 $sqlCheck = "SELECT * FROM charity WHERE email='$_POST[email]'";
		 
		 $rscheck = mysqli_query($connect,$sqlCheck);
		 $count= mysqli_num_rows($rscheck);
		 
		 
		 if($count>0){
			 
			 $exist="Already have account for this email. Please try another one or <a href='signin.php'>Login</a>";
			 echo "<b style='color:red;'>".$exist."</b>";
			 
			 $error=1;
		 }
		
		
		if($error==0){
			
			
			
			$mdpass=md5($_POST['pass']);
		
        $userInsert="INSERT charity SET 
					   name='$_POST[name]', 
					   `mobile`='$_POST[mobile]', 
					   `address`='$_POST[address]', 
					   `email`='$_POST[email]',
					   `status`='Active',
					   `password`='$mdpass',
					   `profilepic`='profile'";
					   
					   
		mysqli_query($connect,$userInsert);	
        $lastId= mysqli_insert_id($connect);
		
		$picName="UploadPic/".$lastId.$_FILES['pic']['name'];
		
		move_uploaded_file($_FILES['pic']['tmp_name'],$picName);
		
		$sqlUpdate= "UPDATE charity SET 
		                    profilePic='$picName' WHERE id='$lastId'";

        mysqli_query($connect,$sqlUpdate);							
        
		echo $lastId;	

        $sqlSelect="SELECT * FROM charity WHERE id='$lastId'";

        $records=mysqli_query($connect,$sqlSelect);

        $count=mysqli_num_rows($records);
         
        if($count==1){
			
			$field=mysqli_fetch_array($records);
			
			$_SESSION['userId']=$field['id'];
			$_SESSION['username']=$field['name'];
			$_SESSION['email']=$field['email'];
			$_SESSION['password']=$field['password'];
			$_SESSION['mobile']=$field['mobile'];
			$_SESSION['address']=$field['address'];
			$_SESSION['profilepic']=$field['profilepic'];
			
			echo "<script language=Javascript>document.location.href='profile.php'</script>";
		}	 
		
		else{
			echo "<h1>Not success. Try again</h1>";
		} 
	}
}	
?>	

	
	
			


			
<h1 style="color:green;">Signup here</h1>
<form action="" method="post" >

<table>

	<tr>
        <td>Type</td><td>:</td><td><input type="text" name="type" required  value="<?php  if(isset($_POST['name'])) {echo $_POST['name'];} ?>"> <b style="color:red;">*</b></td>
	</tr>
    
	<tr>
        <td>Name</td><td>:</td><td><input type="text" name="name" required  value="<?php  if(isset($_POST['name'])) {echo $_POST['name'];} ?>"> <b style="color:red;">*</b></td>
	</tr>	
	
	<tr>
		<td>Email</td><td>:</td><td><input type="email" name="email" required  value="<?php  if(isset($_POST['email'])) {echo $_POST['email'];} ?>"> <b style="color:red;">*</b></td>
	</tr>	
		
	<tr>
        <td>Password</td><td>:</td><td><input type="password" name="pass" required  value="<?php  if(isset($_POST['pass'])) {echo $_POST['pass'];} ?>"> <b style="color:red;">*</b></td>
	</tr>
	
	<tr>	
		<td></td><td></td><td><b style="color:red;">
		        
				<?php  if(isset($misspass)) {echo $misspass ;} ?><br>
				 <?php  if(isset($passLength)) {echo $passLength ;} ?>
				 
		</b></td>
	</tr>

    <tr>	
		<td>Confirm-Password</td><td>:</td><td><input type="password" name="cpass" required  value="<?php  if(isset($_POST['cpass'])) {echo $_POST['cpass'];} ?>" > <b style="color:red;">*</b></td>
	</tr>

	<tr>
		<td>Mobile</td><td>:</td><td><input type="text" name="mobile"   value="<?php  if(isset($_POST['mobile'])) {echo $_POST['mobile'];} ?>" ></td>
	</tr>
 
	<tr>
		<td>Address</td><td>:</td><td><textarea rows="4" cols="30" name="address"> <?php  if(isset($_POST['address'])) {echo $_POST['address'];} ?> </textarea></td>
	</tr>

	<tr>
		<td>Profile Picture</td><td>:</td><td><input type="file" name="pic"></td>
	</tr>

	<tr>
		<td></td><td></td><td><input type="submit" name="sub" value="Signup"></td>
	</tr>

</table>	

</form>

<div align="right">*=Required Field</div>


<?php
     require_once("footer.php");
?>	
		
	
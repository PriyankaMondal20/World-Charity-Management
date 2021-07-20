<?php
  
     require_once("header.php"); 
	 require_once("dbconnect.php"); 
?>


<?php 

    if(isset($_POST['update'])){
		
		
        $userUpdate="UPDATE charity SET 
					   name='$_POST[name]', 
					   `mobile`='$_POST[mobile]', 
					   `address`='$_POST[address]', 
					   `email`='$_POST[email]'
					   
				WHERE id='$_SESSION[userId]'";	   
					   
					   
					   
		mysqli_query($connect,$userUpdate);	
    
		
		if(!empty($_FILES['pic']['name'])){
			
			    unlink($_SESSION['profilepic']);
		        
				$picName="UploadPic/".$_SESSION['userId'].$_FILES['pic']['name'];
				
				move_uploaded_file($_FILES['pic']['tmp_name'],$picName);
				
				$sqlUpdate= "UPDATE charity SET 
									profilePic='$picName' WHERE id='$_SESSION[userId]'";

				mysqli_query($connect,$sqlUpdate);							
      
	  }
	  
	  
	  
	   $sqlSelect="SELECT * FROM charity WHERE id='$_SESSION[userId]'";

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
?>	




<h1>Update Your Profile</h1>
<form action="" method="post" enctype="multipart/form-data">

<table>
    
	<tr>
        <td>Name</td><td>:</td><td><input type="text" name="name" required  value="<?php  echo $_SESSION['username']; ?>"> <b style="color:red;">*</b></td>
	</tr>	
	
	<tr>
		<td>Email</td><td>:</td><td><input type="email" name="email" required  value="<?php  echo $_SESSION['email']; ?>"> <b style="color:red;">*</b></td>
	</tr>	
		
	

	<tr>
		<td>Mobile</td><td>:</td><td><input type="text" name="mobile"   value="<?php  echo $_SESSION['mobile']; ?>" ></td>
	</tr>

	<tr>
		<td>Address</td><td>:</td><td><textarea rows="4" cols="30" name="address"> <?php  echo $_SESSION['address']; ?> </textarea></td>
	</tr>

	<tr>
		<td>Profile Picture</td><td>:</td><td><input type="file" name="pic"><img src="<?php  echo $_SESSION['profilepic']; ?>"  width="80"></td>
	</tr>

	<tr>
		<td></td><td></td><td><input type="submit" name="update" value="Update"></td>
	</tr>

</table>	

</form>




<?php
     require_once("footer.php");
?>	

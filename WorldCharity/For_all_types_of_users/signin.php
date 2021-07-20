<?php
    
     require_once("header.php");
	 require_once("dbconnect.php");
?>

			
<h1 style="color:green;">Signin here</h1>

<form action="" method="post">

    <table>
	
	      <tr>
             <td>E-mail</td><td>:</td><td><input type="email" name="email"></td>
		  </tr>

		  <tr> 
	         <td>Passwor d</td><td>:</td><td><input type="password" name="pass"></td>
		  </tr>

		  <tr>
	         <td></td><td></td><td><input type="submit" name="login" value="Signin"></td>
          </tr>
	
	</table>	  

</form>

<?php
   
   if(isset($_POST['login'])){
	   
	   $mdpass=md5($_POST['pass']);
       $sqlSelect="SELECT * FROM `charity` 
	               WHERE email='$_POST[email]' AND password='$mdpass' AND status='Active'";
		
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
		 echo "<h3 style='color:brown;'>Login failed. Please try again</h3>";
	 }	
   }

?>

			
			
<?php
     require_once("footer.php");
?>			
	
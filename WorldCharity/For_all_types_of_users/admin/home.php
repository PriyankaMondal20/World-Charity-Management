<?php 

     require_once("header.php");
	  require_once("dbconnect.php");

?>


<?php   

     if(isset($_POST['login'])){
		 
		 $sql="SELECT * FROM myadmin WHERE adminUser='$_POST[username]' AND password='$_POST[userpass]'";
		 
		 $rs=mysqli_query($connect, $sql);
		 $count=mysqli_num_rows($rs);
		 
		 if($count==1){
			 
			 $adminField=mysqli_fetch_array($rs);
			 
			 $_SESSION['adminId']=$adminField['id'];
			 $_SESSION['adminUser']=$adminField['adminUser'];
			 $_SESSION['adminPass']=$adminField['password'];
			 
			 echo "<script  language='Javascript'>document.location.href='dashboard.php'</script>";
		 }
		 
	 }


?>

<h1 style="color:green; font-size:40px">Administrator Login<h1/>

<h1 style="color:green;">Sign in here</h1>

<form action="" method="post">

    <table>
	
	      <tr>
             <td>Username</td><td>:</td><td><input type="text" name="username"></td>
		  </tr>

		  <tr> 
	         <td>Password</td><td>:</td><td><input type="password" name="userpass"></td>
		  </tr>

		  <tr>
	         <td></td><td></td><td><input type="submit" name="login" value="Login"></td>
          </tr>
	
	</table>	  

</form>


<?php 

     require_once("footer.php");

?>

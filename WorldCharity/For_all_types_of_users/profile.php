<?php
    
     require_once("header.php");
     require_once("dbconnect.php");
   
   
	 if(isset($_SESSION['userId'])){
		
?>




											 <?php
											 
												if(isset($_POST['searchSubmit'])){
													
													$sqlSearch="SELECT * FROM `charity` WHERE 
													name LIKE '%$_POST[search]%' OR 
													email LIKE '%$_POST[search]' OR 
													address LIKE '%$_POST[search]%'";
													
													$rsSearch=mysqli_query($connect, $sqlSearch);
													$countSearch=mysqli_num_rows($rsSearch);
													
													 if($countSearch>0){
														 
												?>
													
													<table border="1"  width="100%">
													<caption><h2>Your Searching Result for Keyword of <u style="color:brown"><?php echo $_POST['search']; ?></u> is <u style="color:green;"><?php echo $countSearch; ?></u></h2> </caption>
											
														   <tr> 
														   
															  <th>SI </th>
															  <th>Name </th>
															  <th>Address </th>
															  <th>Email </th>
															  <th>Mobile </th>
															  <th>Picture </th>
															  
															  
														   </tr>
														   
													<?php	
												
												$j=0;
												while($rowSearch=mysqli_fetch_array($rsSearch)){
													
													$j++;
													
										?>

												  <tr  align="center">
														
														<td><?php echo $j; ?></td>
														<td><?php echo $rowSearch['name']; ?></td>
														<td><?php echo $rowSearch['address']; ?></td>
														<td><?php echo $rowSearch['email']; ?></td>
														<td><?php echo $rowSearch['mobile']; ?></td>
														<td><img src="<?php echo $rowSearch['profilepic']; ?>" width="60"></td>
														
														  
												 </tr>
											   

											<?php			
													
												}
												
												echo "</table>";	  
														  
													 }	
													 else{
														 
											 ?>
											 
													<h2>Your Searching Result for Keyword of <u style="color:brown"><?php echo $_POST['search']; ?></u> is not found. Try another keyword. </h2>

											<?php				 
														
													 }			 
													
												}
											 
												
											 ?>






    <h1>Your Profile Here</h1>
	 
	 <div
	      style="float:right; "><img src="<?php echo $_SESSION['profilepic']; ?>"  width="250">
	 
	 </div>
	 
	 <div style="background:skyblue; font-size:20px; float:left; width:350px; padding:15px; border: 1px solid black; min-height: 220px; border-radius: 20px; background-color: #8c00ff4f; color: #6e00ff;">
			 Name: <?php echo $_SESSION['username']; ?><br>
			 Email: <?php echo $_SESSION['email']; ?><br>
			 Mobile: <?php echo $_SESSION['mobile']; ?><br>
			 Address: <?php echo $_SESSION['address']; ?><br>
	 
	
	 
	 <div   style="margin-top:20px;">
	    
		   <a  href='updateProfile.php'>Update your profile</a> |
		   <a  href='changePassword.php'>Change Password</a>
	 
	 </div>
	 
	 </div>
	 
	  

	   
	 
	 
	 
	 
<?php

     }
	 else{
		?>
		
		<script language="Javascript">document.location.href="signin.php"</script> 
		
<?php
	 }
         require_once("footer.php");
?>
<?php 

     session_start();

?>

<!doctype html>
<html>
<head>
	
	<link rel="stylesheet" type="text/css" href="design.css">
</head>
<body>
	<div class="wrapper">
		<div class="header">
		
		<?php if(isset($_SESSION['username']))  { ?>
		    
			<span  style="float:right;"> <img src="<?php echo $_SESSION['profilepic'] ?>" width="50" style="border-radius:10px;"><a style='color:blue; 
			padding:10px; font-size:30px; text-decoration:none;' href="profile.php" > 
			<?php echo $_SESSION['username'] ?></a> </span>
			
			<?php
					   } 
			?>
			
			<h1>Welcome to World Charity Website</h1>		
		</div>
		<div class="navbar">
			<ul>
				<li><a href="home.php">Home</a></li>
				
				
				<?php if(isset($_SESSION['username']))  { ?>
					
					       <li><a href="profile.php">Profile</a></li>
				           <li><a href="logout.php">Logout</a></li>
						   
																				   <li><form action="profile.php" method="post" >
																				   
																					   <input type="text"  name="search">
																					   
																					   <input type="submit"  name="searchSubmit"  value="Search">
																				   
																				   </form></li>
							  
						
					<?php
					   } 
						else{
							
					?>		
							
							<li><a href="signin.php">Signin</a></li>
				            <li><a href="signup.php">Signup</a></li>
					

                    <?php 					
							
						}
			        ?>
				
				
				
				<li><a href="services.php">Services</a></li>
				<li><a href="aboutus.php">About us</a></li>
				<li><a href="ouraim.php">Our Aim</a></li>  
			</ul>
		</div>
		<div class="main">
			<div class="leftbar"></div>
			<div class="content">
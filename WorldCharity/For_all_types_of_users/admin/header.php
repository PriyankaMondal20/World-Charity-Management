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
		
		
		
		<?php if(isset($_SESSION['adminUser']))  { ?>
		    
			<span  style="float:right;"> <img src="8.jpg" width="50" style="border-radius:10px;"><a style='color:blue; 
			padding:10px; font-size:30px; text-decoration:none;' href="profile.php" > 
			<?php echo $_SESSION['adminUser'] ?></a> </span>
			
			<h1 style='color: yellow'> Welcom to ADMIN home! </h1>

           
			
			<?php
					   } 
			?>
			
				
		</div>
		<div class="navbar">
			<ul>
				<li><a href="home.php">Sign in</a></li>
				
				<?php if(isset($_SESSION['adminUser']))  { ?>
				
				    
					       <li><a href="alluser.php">All User</a></li>
				           <li><a href="logout.php">Logout</a></li>
						   
						   <li><form action="alluser.php" method="post" >
						   
						       <input type="text"  name="search">
							   
						       <input type="submit"  name="searchSubmit"  value="Search">
						   
						   </form></li>
						  
					
					<?php
					   } 
						else{
							
					?>		
							
							

                    <?php 					
							
						}
			        ?>
				
				
				
				<li><a href="services.php">Services</a></li>
				<li><a href="aboutus.php">About us</a></li>
				<li><a href="ouraim.php">Our Aim</a></li> 	
			</ul>
		</div>
		<div class="main">
			<div class="leftbar">Leftbar</div>
			<div class="content">
<?php
    
     require_once("header.php");
	 require_once("dbconnect.php");
	 
	 if(isset($_SESSION['adminUser'])){
	
?>


<?php 
     /*
	 
	 Edit User
	 
	 */
	 
    if(isset($_GET['editId'])){
		
	   $editId=$_GET['editId'];
	   
	   $sqlEdit="SELECT status FROM charity WHERE id='$editId'";
	   
	   $rs=mysqli_query($connect, $sqlEdit);
	   $row=mysqli_fetch_array($rs);
	   
	   if($row['status']=='Active'){
		   
		   $st='Inactive';
	   }
	   
	   else{
		   
		   $st="Active";
	   }
	   
	   $sqlUpdate="UPDATE charity SET status='$st' WHERE id='$editId'";
	   mysqli_query($connect, $sqlUpdate);
	}



?>



<?php

  /*
	 
	 Delete The User
	 
	 */
	 if(isset($_GET['deleteId'])){
		 
		 $deleteId=$_GET['deleteId'];
		 
		 $sqlDelete="DELETE FROM charity WHERE id='$deleteId'";
		 mysqli_query($connect, $sqlDelete);
	 }

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
					  <th>Status </th>
					  <th>Action </th>
					  
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
				<td><img src="../<?php echo $rowSearch['profilepic']; ?>" width="60"></td>
				<td><a href="alluser.php?editId=<?php echo $rowSearch['id']; ?> "><?php echo $rowSearch['status']; ?> </a></td>
				<td> <a href="alluser.php?deleteId=<?php echo $rowSearch['id']; ?> " onClick="return confirm('Do you want to delete this user?');"> Delete </a> </td>
				  
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


<h1>All User of My Website</h1>


<?php 

    $sql="SELECT * FROM `charity` ORDER BY id DESC ";
	
	$records=mysqli_query($connect, $sql);
	$count=mysqli_num_rows($records);
	
	if($count>0){
		
?>	

    <table border="1"  width="100%">
	
	   <tr> 
	   
	      <th>SI </th>
		  <th>Name </th>
		  <th>Address </th>
		  <th>Email </th>
		  <th>Mobile </th>
		  <th>Picture </th>
		  <th>Status </th>
		  <th>Action </th>
		  
		  
	   
	   </tr>
	   
<?php	
		
		$i=0;
		while($row=mysqli_fetch_array($records)){
			
			$i++;
			
?>

          <tr  align="center">
		        
				<td><?php echo $i; ?></td>
				<td><?php echo $row['name']; ?></td>
				<td><?php echo $row['address']; ?></td>
				<td><?php echo $row['email']; ?></td>
				<td><?php echo $row['mobile']; ?></td>
				<td><img src="../<?php echo $row['profilepic']; ?>" width="60"></td>
				<td><a href="alluser.php?editId=<?php echo $row['id']; ?> "><?php echo $row['status']; ?> </a></td>
				<td> <a href="alluser.php?deleteId=<?php echo $row['id']; ?> " onClick="return confirm('Do you want to delete this user?');"> Delete </a> </td>
				  
		 </tr>
	   

<?php			
			
		}
		
		echo "</table>";
	}
	
	else{
		
		echo "<h1>No user in my website.</h1>";
		
	}


?>


<?php

	 }
	 
	 else{
		 
		  
		 echo "<script language='Javascript'>document.location.href='home.php'</script> ";
		 
	 }

     require_once("footer.php");
?>
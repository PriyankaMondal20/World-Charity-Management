<?php
     $host="localhost";
	 $user="root";
	 $password="";
	 $databaseName="worldcharity";
	 
	 $connect = mysqli_connect($host,$user,$password,$databaseName);

	mysqli_select_db($connect, $databaseName);
   
?>	 
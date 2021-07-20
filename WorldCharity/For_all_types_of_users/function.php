<?php

   function check($x){
				
				$removeSpace=trim($x);
				$removeSlashes=stripcslashes($removeSpace);
				$y=mysqli_real_escape_string($connect, $removeSlashes);
				
				return $y;
				
			}
			


?>
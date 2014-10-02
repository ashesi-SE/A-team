<html>
	<title>Search</title>
	<h1>Welcome to The Trader.com</h1>
	
	<body>
		<?php		
			$search_text;
			
			include("seller.php");
			$obj = new seller();			
		?>
			
		
			<form action="post_ad.php" method="post">
			<input type="text" name="search_text" placeholder="Enter text to search" >
			<input type="submit" value="search">
			</form>
			
			
		<?php
				if(isset($_POST['search_text'])){		
				$search_text=$_POST['search_text'];
				$row=$obj->search($search_text);
				
				
				while($row){
					
					 echo '<div>'.$row['image'].'<br></div>';
					 echo '<div>'.$row['seller_name'].'<br></div>';
					 echo '<div>'.$row['seller_email'].'<br></div>';
					 echo '<div>'.$row['seller_phone'].'<br></div>';
					 echo '<div>'.$row['product_category'].'<br></div>';
					 echo '<div>'.$row['product_name'].'<br></div>';
					 echo '<br><br>';
					 $row=$obj->fetch();
				 }	
			}
		?>

		
	</body>
</html>
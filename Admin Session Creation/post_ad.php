<html>
	<title>Post AD</title>
	<h1>Welcome to The Trader.com</h1>
	
	<body>
	<?php
		
		
		$search_text;
		
		include("seller.php");
		$obj = new seller();
		
		
		if(isset($_POST['search_text'])){		
			$search_text=$_POST['search_text'];
			
			
			$row=$obj->search($search_text);
			 
			 echo $row['seller_name'];
			 echo $row['product_name'];
			  echo $row['product_category'];
			 echo $row['product_details'];
			 echo $row['price'];
			 echo $row['seller_phone'];
		}
		
		
					
		?>
		
		
		
		<p>Click the Sell Now button to sell</p>
		<input type="button" value="Sell Now" onClick="window.location.href='sell.php'">
		<br>
		<br>
		<form action="post_ad.php" method="post">
		<input type="text" name="search_text" placeholder="Enter text to search" >
		<input type="submit" value="search">
		</form>
		
	
	</body>
</html>
<html>
	<?php
		include("seller.php");
			$obj = new seller();
			
			if (!isset($_REQUEST["id"])){
			echo "unable to obtain product id";
			}
			
			$vid =$_REQUEST["id"];
			
			$obj->delete_product($vid);
			$row = $obj->fetch();
			header('Location: admin.php'); 
			echo "deleted successfully";
			
			
			?>
</html>
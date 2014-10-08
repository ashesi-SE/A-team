<!DOCTYPE html>
<html>
<body>
<?php
	include("seller.php");
	$obj = new seller();
	
	if(!$obj->get_seller(1)){
		echo "Unable to get seller";
			}
		$row = $obj->fetch();
		echo $row['seller_email'];
		
?>
<button>
	<a href="mailto:someone@example.com?" target="_top">
	Click to contact seller via Email</a>
</button>

</body>
</html>



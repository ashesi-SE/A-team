<html>
	<title>Services</title>
	<head>
		<script src="jquery-1.11.0.js"></script>
		<script src="gen.js"></script>
	<?php
			include("seller.php");
			$obj = new seller();	
		?> 
	</head>
	<body>
	<div class="header">
		<h1>Service for sale</h1>
	</div>
	<div class="main">
	<table>
	<?php
		$obj->get_product_by_category('services');
		$row = $obj->fetch();
		
	while($row){
	echo "<tr>";
	echo "<td>";
	echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['product_image'] ).'"/>';
	echo "</td>";
	echo "<td>";
	echo $row['product_name'];
	echo "</td>";
	echo "<td>";
	echo $row['price'];
	echo "</td>";
	echo "<td>";
	echo $row['price_type'];
	echo "</td>";
	echo "</tr>";
	$row = $obj->fetch();
	}
	?>
	</table>
	</div>
	</body>
</html>
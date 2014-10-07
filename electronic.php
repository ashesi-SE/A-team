<!DOCTYPE html>
<html>

<head>
	<title>Electronics</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<table align="center">
		<tr>
			<td colspan="2" class="header">
					<table align="center">
						<tr>
							<td>
					 			<div align="left"><a href="index.php"><img src="popsell.png" alt="popsell-out" width="250" height="100">
					 			</a></div>
							</td>
							<td width="867px"></td>
						<td>
							<!-- place AD button -->
						<a href="new_sales.php" class="btn btn-primary">Post an AD!</a>
						</td>
					</tr>
				</table>

				</td>
			</tr>
      <!-- categories list-->
			<tr>
				<td>
					<div id="divMenu">
					    <ul>
					        <li><a href="index.php">Home</a></li>
					        <li><a href="#">Categories</a>
					                <ul>
					            <li><a href="electronic.php">Electronics</a></li>
					            <li><a href="#">Food</a></li>
					            <li><a href="#">Fashion</a></li>
					            <li><a href="#">Services</a></li>
					            <li><a href="#">Education</a></li>
					        </ul></li>
					        <li><a href="#">Campus Location</a>
					                <ul>
					            <li><a href="#">On-Campus Hostel</a></li>
					            <li><a href="#">Colombiana</a></li>
					            <li><a href="#">Dufie Platinum</a></li>
					            <li><a href="#">Charlottes</a></li>
					            <li><a href="#">Berekuso Township</a></li>
					            <li><a href="#">Comet</a></li>
					        </ul></li>
					        <li><a href="#">Help & Support</a></li>
					    </ul>
					    </div>

				</td>
				<!-- <td width="0px"> </td> -->
				<td>
					<!--  search -->
					<form action="searchad.php" method="post">
					<div align="right"><input class="textbox" type="text" name="search_text" placeholder="Search by product name or seller name">
		  			<div class='btn btn-secondary'>
		  				<a href='searchad.php'>
		  				<input class='btn btn-secondary' type="submit" value="Search"></a></div>
		  			</div>
					</form>

		  <!-- main content -->
		<div align="middle" class="main">
						<table>
							<tr class="pagehead" align="right">
								<td align="left"> ~Electronics~</td>
								<td width="660"></td>
							</tr>
						</table>
						<table width="90%" class="reportTable">
							<tr class="header" >
								<td width="330">Product Details</td>
								<td width="30">Seller</td>
								<td width="30">Contact</td>
							</tr>
							<?php
							include("seller.php");
			$obj = new seller();
		$obj->get_product_by_category('electronics');
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
			</td>
		</tr>

	</table>
	
		<!-- footer -->
		<div class="footer">
			popSell-Out Copyright 2014 | Powered by The A-Team.
		</div>
</body>
</html>	

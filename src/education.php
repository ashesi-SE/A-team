<!DOCTYPE html>
<html>

<head>
	<title>Education</title>
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
					            <li><a href="food.php">Food</a></li>
					            <li><a href="fashion.php">Fashion</a></li>
					            <li><a href="services.php">Services</a></li>
					            <li><a href="education.php">Education</a></li>
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
								<td align="left"> ~Education~</td>
								<td width="800"></td>
							</tr>
						</table>
						
										<?php
							include("seller.php");
			$obj = new seller();
			if($obj->get_product_by_category('education')){
		$obj->get_product_by_category('education');
		$row = $obj->fetch();
		?>
						
						<table width="90%" class="reportTable">
							<tr class="header" >
								<td width="330">Product Details</td>
								<td width="30">Seller</td>
								<td width="30">Contact</td>
							</tr>
							</table>
			
		<?php
$row_counter=0;	
							while($row){
		
									if($row_counter%2==0){
									$style=" class='row1' ";
									}
									else{
									$style=" class='row2' ";
								}
								?>
								<?php
								$id=$row['seller_id'];
                                echo" <a href='buy_item.php?id=$id'>";
								echo'<table width="90%" class="reportTable">';
								
									echo"<tr $style><td class='detaillabel'>";
								echo '<img src="data:image/jpeg;base64,'.base64_encode($row['product_image'] ).'"/><br>';	
								echo "Product: ";
								echo"$row[product_name]<br>";

								echo "Price: ";
								echo"$row[price]<br>";
								echo "Product Category: ";
								echo"$row[product_category]<br>";
								echo "Seller Location: ";
								echo"$row[seller_location]<br></td>";
								echo "<td class='detaillabel' align='center'>";
								echo"$row[seller_name]</td>";
								echo "<td class='detaillabel' align='center'>";
								echo"<b>$row[seller_phone]</b></td></tr>";
								 echo"</table></a>";
								$row=$obj->fetch();
								$row_counter++;
							   }
							   }
	?>

							</table>
							<br>
							<br>

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

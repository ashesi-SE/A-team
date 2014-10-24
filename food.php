<!DOCTYPE html>
<html>

<head>
	<title>Food</title>
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
							<td width="667px"></td>

							<td>
								<a href="login.php" class="btn btn-login">Admin Login</a>
							</td>

							<td width="50px">
							</td>
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
      					<table align="center">
      						<tr>
      							<td>
					    <ul id="horiznav">
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
					            <li><a href="oncampus.php">On-Campus Hostel</a></li>
					            <li><a href="colombiana.php">Colombiana</a></li>
					            <li><a href="dufie.php">Dufie Platinum</a></li>
					            <li><a href="charlottes.php">Charlottes</a></li>
					            <li><a href="masere.php">Masere</a></li>
					            <li><a href="berekuso.php">Berekuso Town</a></li>
					            <li><a href="comet.php">Comet</a></li>
					            <li><a href="other.php">Other</a></li>
					        </ul></li>
					        <li><a href="help.php">Help & Support</a></li>
					    </ul>
					</td>

					<td width="145px">
					</td>

					<!--  search -->
						<td>
					<form action="searchad.php" method="post">
					<div align="right"><input class="textbox" type="text" name="search_text" placeholder="Search by product name or seller name">
		  			<div class='btn btn-secondary'>
		  				<input class='btn btn-secondary' type="submit" value="Search"></div>
		  			</div>
					</form>
							</td>
				</tr>
			</table>
					
				</tr>

			<tr>
				<td width="100px">

				</td>
				<td>

		  <!-- main content -->
		<div align="middle" class="main">
						<table>
							<tr class="pagehead" align="right">
								<td align="left"> ~Food~</td>
								<td width="860"></td>
							</tr>
						</table>
						<table width="90%" class="reportTable"></table>
							<?php
							include("seller.php");
			$obj = new seller();
		$obj->get_product_by_category('food');
		$row = $obj->fetch();
		if ($row==null){
											echo "<font size='6' color='red'>No item found</font>";
										}
		
$row_counter=0;	
							while($row){
		
									if($row_counter%2==0){
									$style=" class='row1' ";
									}
									else{
									$style=" class='row2' ";
								}
									$id=$row['seller_id'];
								$pic= $row['product_image'];
                                echo" <a href='buy_item.php?id=$id'>";
                                echo'<table width="90%" class="reportTable">';
								echo"<tr $style><td width='150'class='detaillabel'>";
								echo '<img src="upload/'.$pic.'" width="120" height="100"/></td>';
								echo"<td class='detaillabels' width='250'>$row[product_name]<br></td>";
								echo"<td class='detailed' width='350'>$row[product_category], $row[seller_location]</td>";
								echo "<td class='detailprice' align='left'>";
								echo"GHc $row[price]</td>";
								echo "";
								echo"</tr></table></a>";

								$row=$obj->fetch();
								$row_counter++;
							   }
	?>

							
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

<!DOCTYPE html>
<html>

<head>
	<title>Search Results</title>
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
								<td align="left"> ~Search Results~</td>
								<td width="760"></td>
							</tr>
						</table>
						<table width="90%" class="reportTable">
							<tr class="header" >
								<td width="330">Product Details</td>
								<td width="30">Seller</td>
								<td width="30">Contact</td>
							</tr>

							<?php
									$search_text;
		
									include("seller.php");
									$obj = new seller();
									
									
									if(isset($_POST['search_text'])){		
										$search_text=$_POST['search_text'];
										
										
										$row=$obj->search($search_text);
										$row_counter=0;	
							while($row){
		
									if($row_counter%2==0){
									$style=" class='row1' ";
									}
									else{
									$style=" class='row2' ";
								}
								echo "<tr $style >";
				 				echo "<td>$row[product_name]<br>";
				  				echo "$row[product_category]<br>";
				 				echo "$row[product_details]<br>";
				 				echo "$row[price]</td>";
				 				echo "<td>$row[seller_name]</td>";
				 				echo "<td>$row[seller_phone]</td>";
				 				echo "</tr>";
				 				$row=$obj->fetch();
								$row_counter++;
		                     }
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
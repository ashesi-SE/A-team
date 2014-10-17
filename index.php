<!DOCTYPE html>
<html>

<head>
	<title>popSell-Out</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<table align="center">
		<tr>
			<td>
			<marquee bgcolor="#420612" behavior="alternate" direction="left" scrollamount="3"><font face="Segoe UI Light" color="white" size="5">Welcome to popSellOut!!! The best place for all your on-line shopping. You can sell anything here.</font></marquee>
				</td>
		</tr>
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
				<table width= "820px" align= "center">
				<tr>	
					<td>
						<marquee behavior="scroll" direction="left">
						  <img src="phone.jpg" width="200" height="164" alt="phone" />
						  <img src="rice.jpg" width="200" height="164" alt="rice" />
						  <img src="shoe.jpg" width="200" height="164" alt="shoe" />
						  <img src="banku.jpg" width="200" height="164" alt="banku" />
						  <img src="toshiba.jpg" width="200" height="164" alt="toshiba" />
						  <img src="shoe1.jpg" width="200" height="164" alt="shoe1" />
						  <img src="mac.jpg" width="200" height="164" alt="mac" />
						  <img src="phone.jpg" width="200" height="164" alt="phone" />
						  <img src="shirt.jpg" width="200" height="164" alt="shirt" />
						  <img src="fashion.jpg" width="200" height="164" alt="fashion" />
						  <img src="jollof.jpg" width="200" height="164" alt="jollof" />
						  <img src="jordans.jpg" width="200" height="164" alt="jordans" />
						  <img src="coke.jpg" width="200" height="164" alt="coke" />
						  <img src="bag.jpg" width="200" height="164" alt="bag" />
						  <img src="banku.jpg" width="200" height="164" alt="banku" />
						  <img src="jordans.jpg" width="200" height="164" alt="jordans" />
						  <img src="bag1.jpg" width="200" height="164" alt="bag1" />
						  <img src="phone.jpg" width="200" height="164" alt="phone" />
						  <img src="shirt1.jpg" width="200" height="164" alt="shirt1" />
						  <img src="shoe2.jpg" width="200" height="164" alt="shoe2" />
						  <img src="phone1.jpg" width="200" height="164" alt="phone1" />
						  <img src="waakye.jpg" width="200" height="164" alt="waakye" />
						  <img src="shirt1.jpg" width="200" height="164" alt="shirt1" />
						  <img src="jordans1.jpg" width="200" height="164" alt="jordans1" />
						  </marquee>
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
								<td align="left"> ~All Products & Services~</td>
								<td width="660"></td>
							</tr>
						</table>
						<table width="90%" class="reportTable">
							<!-- <tr class="header" >
								<td width="330">Product Details</td>
								<td width="30">Seller</td>
								<td width="30">Contact</td>
							</tr> -->
						</table>

							<?php

							include("seller.php");
				$obj = new seller();

	if(! $obj->connect()){
			echo"Error! Sorry we are unable to get any information for you currently";
	   exit();

}
	   if($obj->get_sellers()){
	   $result=$obj->get_sellers();

	   $row=$obj->fetch();
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
								 // <img src="upload/'.$pic.'"/> 
								echo"<td class='detaillabels' width='250'>$row[product_name]<br></td>";
								echo"<td class='detailed' width='350'>$row[product_category], $row[seller_location]</td>";
								echo "<td class='detailprice' align='left'>";
								echo"GHc $row[price]</td>";
								echo "";
								echo"</tr></table></a>";

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

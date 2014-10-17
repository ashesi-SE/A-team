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
			<marquee bgcolor="#420612" behavior="scroll" direction="left" scrollamount="2"><font face="Segoe UI Light" color="white" size="5">Welcome to popSellOut!!! The best place for all your on-line shopping. You can sell anything here.</font></marquee>
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
							<td width="867px"></td>
						<td>

							<!-- place AD button -->
						<a href="index.php" class="btn btn-primary">logout</a>
						
						</td>
					</tr>
				</table>

				</td>
			</tr>
      <!-- categories list-->

      				<tr>
      					<table align="center">
      						<tr>
      							

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
				<table width= "850px" align= "center">
				<tr>
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
                                //echo" <a href='buy_item.php?id=$id'>";
                                echo'<table width="90%" class="reportTable">';
								echo"<tr $style><td width='150'class='detaillabel'>";
								echo '<img src="upload/'.$pic.'" width="120" height="100"/></td>';
								 // <img src="upload/'.$pic.'"/> 
								echo"<td class='detaillabels' width='250'>$row[product_name]<br></td>";
								echo"<td class='detailed' width='300'>$row[product_category], $row[seller_location]</td>";
								echo "<td class='detailprice' align='left'>";
								echo"GHc $row[price]</td>";
								echo "<td width='70' class='detaillabel' align='left'>";
								echo "<a href='delete.php?id=$row[seller_id]'>Delete</a></td>";
								echo "";
								
								echo"</tr></table>";

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

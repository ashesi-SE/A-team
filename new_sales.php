<!DOCTYPE html>
<html>

<head>
	<title>Post Ad</title>
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
								<td align="left"> ~Fill The Form Below~</td>
								<td width="660"></td>
							</tr>
							</table>

							<?php
				include("seller.php");
				$obj = new seller();


	if(! $obj->connect()){
			echo"Cannot connect to database";
	   exit();
	}         if(isset($_GET['sellerName'])){
				 $sellerName = $_GET['sellerName'];
		 		 $sellerLocation = $_GET['sellerLocation'];
		  		$sellerEmail = $_GET['sellerEmail'];
		    	$sellerPhone =$_GET['sellerPhone'];
		    	$productName= $_GET['productName'];
		    	$productImage= $_GET['productImage'];
		 $productDetails = $_GET['productDetails'];
		  $productPrice = $_GET['productPrice'];
		  $productCategory = $_GET['productCategory'];
		   $priceType = $_GET['priceType'];

		    if(isset($_GET['submit'])){

	  $obj->add_seller($sellerName,$sellerLocation,$sellerEmail,$sellerPhone,$productName,
								$productDetails,$productCategory,$productImage,$productPrice,$priceType);
		  //  $query="insert into seller set seller_name='$sellerName',seller_location='$sellerLocation',seller_email='$sellerEmail', seller_phone='$sellerPhone',product_name='$productName',
		  //  product_details='$productDetails',product_image='$productImage',price='$productPrice',product_category='$productCategory',price-Type=' $priceType'";
		  // echo $query";
		}  		
		echo mysql_error();
	}
	// // if(! $obj->query($query)){
	// 		echo"Error fetching data";
	// }
	// 	$row=$obj->fetch();
	// 	$row_counter=0;

			// if(isset($_POST['submit'])){
				
			// }
			
	// echo "<html>";
             
			// echo"<h1>Fill the form below to sell your product</h1>";
	echo"<table>";

			echo"<form action='new_sales.php' method='GET'>";

				echo"<tr>";
				echo"<td class='formlabel'>Product Name:</td><td><input class='textbox1' type='text' name='productName'  id='productName'/></td>";
			echo"</tr>";

			echo"<tr>";
				echo"<td class='formlabel'>Price:</td> <td><input class='textbox1' type='text'  name='productPrice' id='productPrice'/></td>";
			echo"</tr>";

			echo"<div>";
			
								// echo " Product Category:<select name='productCategory' id='productCategory'>";
								// if(!$obj->get_all_categories()){
								// 	echo "Unable to get categories";
								// }
								// $row = $obj->fetch();
								// while($row){
								// 	echo "<option value='$row[category_id]' selected>$row[category_name] </option>";
								// 	$row = $obj->fetch();
								// }
								// echo "</select>"; 
								
			echo"</div>";



			echo"<tr>";
				echo"<td class='formlabel'>Product Description:</td> <td><input class='textbox1' type='text'  style='height:100px;width:300px;font-size:14pt' name ='productDetails' id='productDetails'/></td>
			</tr>";
	
			
								echo " <tr><td class='formlabel'>Product Category:</td><td><select class='textbox1' name='productCategory' id='productCategory'>";
								if(!$obj->get_all_categories()){
									echo "Unable to get categories";
								}
								$row = $obj->fetch();
								while($row){
									echo "<option value='$row[category_name]' selected>$row[category_name] </option>";
									$row = $obj->fetch();
								}
								echo "</select></td></tr>"; 
								
			// echo"</div>";
	   					echo"<tr><td class='formlabel'> 

				Product Image</td><td><input class='textbox1' name='MAX_FILE_SIZE' value='102400' type='hidden'>
						<input name='productImage' accept='image/jpeg' type='file'>


				</td></tr>";
								
								echo "<tr><td class='formlabel'>Is the Price fixed or Negotiable:</td><td><select class='textbox1' name='priceType' id='priceType'>";
								if(!$obj->get_all_price_type()){
									echo "Unable to get categories";
								}
								$row = $obj->fetch();
								while($row){
									echo "<option value='$row[price_type]' selected>$row[price_type] </option>";
									$row = $obj->fetch();
								}
								echo "</select></td></tr>"; 
								

				echo"<tr>	
				<td class='formlabel'>
				Seller Name:</td> <td><input class='textbox1' type='text' name='sellerName'  id='sellerName'/>
			</td>
			
			</tr>";
			
								echo "<tr><td class='formlabel'>Location:</td> <td><select class='textbox1' name='sellerLocation'  id='sellerLocations'>";
								if(!$obj->get_all_locations()){
									echo "Unable to get categories";
								}
								$row = $obj->fetch();
								while($row){
									echo "<option value='$row[location_name]' selected>$row[location_name] </option>";
									$row = $obj->fetch();
								}
								echo "</select></td>"; 
								
							echo"</tr>
			<tr>
			<td class='formlabel'>
				Seller Email:</td> <td><input class='textbox1' type='text' name='sellerEmail' id='sellerEmail'/>
			</tr>
			<tr>
			<td class='formlabel'>
				Phone Number:</td> <td><input class='textbox1' type='text' name='sellerPhone'/>
			</td>
			</tr>
			<tr height='30'></tr>
			<tr>
				<td width='170'></td>
				<td><a href='index.php'><input class='btn btn-add' type='submit' value='Save' name='submit'/></a></td><br>
			</tr>";
			 
			echo"</form>";
			
		echo"</table>";

	echo"</html>";
	?>

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

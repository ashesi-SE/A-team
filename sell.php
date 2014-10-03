
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
			
	echo "<html>";
             
			echo"<h1>Fill the form below to sell your product</h1>";
	echo"<body>";

			echo"<form action='sell.php' method='GET'>";

				echo"<div>";
				echo"Product Name:<input type='text' name='productName'  id='productName'/>";
			echo"</div>";

			echo"<div>";
				echo"Price: <input type='text'  name='productPrice' id='productPrice'/>";
			echo"</div>";

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



			echo"<div>";
				echo"Product Description: <input type='text'  style='height:100px;width:300px;font-size:14pt' name ='productDetails' id='productDetails'/>
			</div>";
	
			
								echo " Product Category:<select name='productCategory' id='productCategory'>";
								if(!$obj->get_all_categories()){
									echo "Unable to get categories";
								}
								$row = $obj->fetch();
								while($row){
									echo "<option value='$row[category_name]' selected>$row[category_name] </option>";
									$row = $obj->fetch();
								}
								echo "</select>"; 
								
			echo"</div>";
	   					echo"<div> 

				Product Image<input name='MAX_FILE_SIZE' value='102400' type='hidden'>
						<input name='productImage' accept='image/jpeg' type='file'>
					</div>


				<div>";
								
								echo "Is the Price fixed or Negotiable:<select name='priceType' id='priceType'>";
								if(!$obj->get_all_price_type()){
									echo "Unable to get categories";
								}
								$row = $obj->fetch();
								while($row){
									echo "<option value='$row[price_type]' selected>$row[price_type] </option>";
									$row = $obj->fetch();
								}
								echo "</select>"; 
								

				echo"</div>	
				<div>
				Seller Name: <input type='text' name='sellerName'  id='sellerName'/>
			</div>
			
			<div>";
			
								echo "Location:<select name='sellerLocation'  id='sellerLocations'>";
								if(!$obj->get_all_locations()){
									echo "Unable to get categories";
								}
								$row = $obj->fetch();
								while($row){
									echo "<option value='$row[location_name]' selected>$row[location_name] </option>";
									$row = $obj->fetch();
								}
								echo "</select>"; 
								
							echo"</div>
			<div>
				Seller Email: <input type='text' name='sellerEmail' id='sellerEmail'/>
			</div>
			<div>
				Phone Number: <input type='text' name='sellerPhone'/>
			</div>
			<div>
				<input type='submit' value='save' name='submit'/>
			</div>";
			 
			echo"</form>";
			
		echo"</body>";

	echo"</html>";
	?>











	<!-- <html>
		<title>Sell</title>
		<head>
			<script src="jquery-1.11.0.js"></script>
			<script src="gen.js"></script>
		
			<h1>Fill the form below to sell your product</h1>
		</head>
		<body>
			<div id="divAdd">
				<table>
					<tr>
						<td class="label">Seller Name: </td>
						<td class="field"><input type="text" id="s_n" ></td>
					</tr>
					<tr>
						<td class="label">Seller Location: </td>
						<td class="field">
							<?php
								// echo "<select name='s_l' id='s_l'>";
								// if(!$obj->get_all_locations()){
								// 	echo "Unable to get categories";
								// }
								// $row = $obj->fetch();
								// while($row){
								// 	echo "<option value='$row[location_id]' selected>$row[location_name] </option>";
								// 	$row = $obj->fetch();
								// }
								// echo "</select>"; 
								?>
								</td>
					</tr>
					<tr>
						<td class="label">Seller Email: </td>
						<td class="field"><input type="email" id="s_e" ></td>
					</tr>
					<tr>
						<td class="label">Seller Phone: </td>
						<td class="field"><input type="tel" id="s_p" ></td>
					</tr>
					<tr>
						<td class="label">Product Name: </td>
						<td class="field"><input type="text" id="p_n" ></td>
					</tr>
					<tr>
						<td class="label">Product Description: </td>
						<td class="field"><input type="text" id="p_d" style="height:100px;width:300px;font-size:14pt;"></td>
					</tr>
					<tr>
						<td class="label">Product Category: </td>
						<td class="field">
							<?php
								// echo "<select name='p_c' id='p_c'>";
								// if(!$obj->get_all_categories()){
								// 	echo "Unable to get categories";
								// }
								// $row = $obj->fetch();
								// while($row){
								// 	echo "<option value='$row[category_id]' selected>$row[category_name] </option>";
								// 	$row = $obj->fetch();
								// }
								// echo "</select>"; 
								?>
								</td>
					</tr>
					<tr>
						<td class="label">Product Image: </td>
						<td>
						<input name="MAX_FILE_SIZE" value="102400" type="hidden">
						<input name="image" accept="image/jpeg" type="file">
					</tr>
					<tr>
						<td class="label">Product price: </td>
						<td class="field"><input type="text" id="p_p" ></td>
					</tr>
					<tr>
						<td class="label">Is Product price fixed or negotiable?: </td>
						<td class="field">
							<?php
								// echo "<select name='p_c' id='p_cp'>";
								// if(!$obj->get_all_price_type()){
								// 	echo "Unable to get categories";
								// }
								// $row = $obj->fetch();
								// while($row){
								// 	echo "<option value='$row[price_id]' selected>$row[price_type] </option>";
								// 	$row = $obj->fetch();
								// }
								// echo "</select>"; 
								?>
								</td>
					</tr>
					<tr>
							<td class="label"></td>
							<td class="field">
								<input type="button" value="save" name="submit" >
								<input type="button" value="cancel" onclick="cancel_add()" >
							</td>
						</tr>
			
			
			
			
				</table>
			</div>
			</body>
	</html> -->
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
	}         if(isset($_POST['sellerName'])){
				 $sellerName = $_POST['sellerName'];
		 		 $sellerLocation = $_POST['sellerLocation'];
		  		$sellerEmail = $_POST['sellerEmail'];
		    	$sellerPhone =$_POST['sellerPhone'];
		    	$productName= $_POST['productName'];
		    	// $productImage= $_GET['productImage'];
		 $productDetails = $_POST['productDetails'];
		  $productPrice = $_POST['productPrice'];
		  $productCategory = $_POST['productCategory'];
		   $priceType = $_POST['priceType'];

		   $allowedExts = array("gif", "jpeg", "jpg", "png");
			$temp = explode(".", $_FILES["file"]["name"]);
			$extension = end($temp);
//print_r($_FILES["file"]);
if 	(
		(
			($_FILES["file"]["type"] == "image/gif")
			|| ($_FILES["file"]["type"] == "image/jpeg")
			|| ($_FILES["file"]["type"] == "image/jpg")
			|| ($_FILES["file"]["type"] == "image/pjpeg")
			|| ($_FILES["file"]["type"] == "image/x-png")
			|| ($_FILES["file"]["type"] == "image/png")
		)
		//&& ($_FILES["file"]["size"] < 20000)
		&& in_array($extension, $allowedExts)
	)
{


	// echo "In parent if statement <br>";
	if ($_FILES["file"]["error"] > 0) {
		echo "In first child if statement <br>";
    	echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
  	}
  	else {
  		// echo "In first child else statement <br>";
	    // echo "Upload: " . $_FILES["file"]["name"] . "<br>";
	    // echo "Type: " . $_FILES["file"]["type"] . "<br>";
	    // echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
	    // echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";
	    if (file_exists("upload/" . $_FILES["file"]["name"])) {
	    	// echo "In second child if statement <br>";
	      	//echo $_FILES["file"]["name"] . " already exists. ";
	    }
	    else {
	    	// echo "In second child else statement <br>";
	      	move_uploaded_file($_FILES["file"]["tmp_name"],
	      	"upload/" . $_FILES["file"]["name"]);
	      	//echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
	    }
	}
}
// "upload/" .
else {
	// echo "In parent else statement <br>";
	echo "Invalid file";
}
			$productImage= $_FILES["file"]["name"];
		    if(isset($_POST['submit'])){

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

			echo"<form action='new_sales.php' method='POST' enctype='multipart/form-data'>";

				echo"<tr>";
				echo"<td class='formlabel'>Product Name:</td><td><input class='textbox1' type='text' name='productName'  id='productName'/></td>";
			echo"</tr>";

			echo"<tr>";
				echo"<td class='formlabel'>Price (in GHc):</td> <td><input class='textbox1' type='text'  name='productPrice' id='productPrice'/></td>";
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
				echo"<td class='formlabel'>Product Description:</td> <td><textarea class='textbox1' type='text' style='height:100px;width:300px; font-size:12pt' name ='productDetails' id='productDetails'></textarea></td>
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

				Product Image</td><td>
						<input type='file' name='file' id='file'><br>


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
			
		echo"</table><br><br>";
		echo "";

	echo"</html>";
	?>
			</td>
		</tr>

		<tr class="formlabel" align="center">
					<td>
				<br>
				<b> You can fill the form on the <a href="help.php">Help & Support page</a> if you want to clear your ad from our database</b>
		
				<br>
				</td>
				</tr>
		<br><br>
		<table align="center">
	</table>

	</table>
	</div>
	
		<!-- footer -->
		<div class="footer">
			popSell-Out Copyright 2014 | Powered by The A-Team.
		</div>
</body>
</html>	

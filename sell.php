
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
print_r($_FILES["file"]);
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
	      	echo $_FILES["file"]["name"] . " already exists. ";
	    }
	    else {
	    	// echo "In second child else statement <br>";
	      	move_uploaded_file($_FILES["file"]["tmp_name"],
	      	"upload/" . $_FILES["file"]["name"]);
	      	echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
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
	


			
	echo "<html>";
             
			echo"<h1>Fill the form below to sell your product</h1>";
	echo"<body>";

			echo"<form action='sell.php' method='POST' enctype='multipart/form-data'>";

				echo"<div>";
				echo"Product Name:<input type='text' name='productName'  id='productName'/>";
			echo"</div>";

			echo"<div>";
				echo"Price: <input type='text'  name='productPrice' id='productPrice'/>";
			echo"</div>";

			echo"<div>";
			
								
								
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

				Product Image

						<input type='file' name='file' id='file'><br>
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











	
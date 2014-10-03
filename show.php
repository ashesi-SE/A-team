<?php

include("seller.php");
				$obj = new seller();

	if(! $obj->connect()){
			echo"Cannot connect to database";
	   exit();

}
	   if($obj->get_sellers()){
	   $result=$obj->get_sellers();

	   $row=$obj->fetch();
		while($row){
			echo"Image:";
		echo '<img src="data:image/jpeg;base64,'.base64_encode($row['product_image'] ).'"/>';	
		echo "ProductName:";
		echo"$row[product_name]";

		echo "Price:";
		echo"$row[price]";
		echo "ProductType:";
		echo"$row[product_category]";
		echo "SellerName:";
		echo"$row[seller_name]";
		echo "Phone No:";
		echo"$row[seller_phone]";

		$row=$obj->fetch();
	   }
	}

?>
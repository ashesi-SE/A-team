<?php
	include("gen.php");
	$cmd=get_datan("cmd");
	switch($cmd){
		case 1:
			//get one seller based on id
			get_seller();
			break;
			
			case 2:
			//get all sellers
			get_all_sellers();
			break;

			case 3:
			//add seller
			add_seller();
			break;
			
		default:
			echo "{";
			echo jsonn("result",0). ",";
			echo jsons("message","unknown command");
			echo "}";
			
			
	}
	
	//returns a single seller
	function get_seller(){
		include_once("seller.php");
		
		$id=get_datan("id");
		$v=new community();
		$row=$v->get_seller($id);
		if(!$row){
			echo "{";
			echo jsonn("result",0). ",";
			echo jsons("message","seller not found");
			echo "}";
			return;
		}
		
		echo "{";
			echo jsonn("result",1) .",";
			echo '"seller":{';
			echo jsonn("id",$id).",";
			echo jsons("sellerName",$row['seller_name']).",";
			echo jsonn("sellerLocation",$row['seller_location']).",";
			echo jsonn("sellerEmail",$row['seller_email']).",";
			echo jsonn("sellerPhone",$row['seller_phone']).",";
			echo jsonn("productName",$row['product_name']).",";
			echo jsonn("productDetails",$row['product_details']).",";
			echo jsonn("productCategory",$row['product_category']).",";
			echo jsonn("productImage",$row['product_image']).",";
			echo jsonn("price",$row['price']).",";
			echo jsonn("priceType",$row['price_type']);
			echo "}";
		echo "}";
	}
	
	//returns all sellers
	function get_all_sellers(){
		include_once("seller.php");
		
		$v=new seller();
		$v->get_all_sellers();
		$row=$v->fetch();
		if (!$row){
		echo "{";
		echo jsonn("result",0) .",";
		echo jsons("Message", "seller not found");
		echo "}";
		return;
		}
		
		echo "{";
			echo jsonn("result",1) .",";
			echo '"sellers":';
			$s=Array();
			do{
			array_push($s, $row);
			$row=$v->fetch();
			}while($row);
			print_r(json_encode($s));
			echo "}";
			
	}
	
	
	
	//add a new seller
	function add_community(){
		$seller_name=get_data('sn');
		$seller_location=get_data('sl');
		$seller_email=get_data('se');
		$seller_phone=get_data('sp');
		$product_name=get_data('pn');
		$product_details=get_data('pd');
		$product_category=get_data('pc');
		$product_image=get_data('pi');
		$price=get_data('p');
		$price_type=get_data('pt');
	
		include_once("seller.php");
		$v=new seller();
		$add=$v->add_seller($seller_name,$seller_location,$seller_email,$seller_phone,$product_name,
								$product_details,$product_category,$product_image,$price,$price_type);
								
		if($add){
		echo "{";
		echo jsonn("result",1). ",";
		echo jsons("message","id not correct");
		echo "}";
		}
		else{
		echo "{";
		echo jsonn("result",0). ",";
		echo jsons("message","id not correct");
		echo "}";
		echo mysql_error();
		}
	}
	
?>
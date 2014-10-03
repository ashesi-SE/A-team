<?php
	include_once("adb.php");
	
	class seller extends adb{
		function seller(){
			adb::adb();
		}
		/**
		*query all sellers in the table and store the dataset in $this->result	
		*@return if successful true else false
		*/
		
		function get_all_seller(){
			$query="select * from seller";
			return $this->query($query);
		}
		
		//add new seller
		function add_seller($seller_name,$seller_location,$seller_email,$seller_phone,$product_name,
								$product_details,$product_category,$product_image,$price,$price_type){
			//write the SQL query and call $this->query()
			$query="insert into seller set seller_name='$seller_name',seller_location='$seller_location',seller_email='$seller_email',
			seller_phone='$seller_phone',product_name='$product_name',product_details='$product_details',
			product_category='$product_category',product_image='$product_image',price='$price',price_type='$price_type'";
			return $this->query($query);
		}
		
		//return seller
		function get_seller($id){
			$query="select * from seller where seller_id=$id";
			if(!$this->query($query)){
				return false;
			}
			return $this->fetch();
		}
		function get_sellers(){
			$query="select * FROM seller ORDER BY `seller_id` DESC";
			// if(!$this->query($query)){
			// 	return false;
			// }
			return $this->query($query);
		}

		
		function get_all_categories(){
			$query="select * from category ORDER by category_name";
			return $this->query($query);
		}
		
		function get_all_price_type(){
			$query="select * from price_type ORDER by price_type";
			return $this->query($query);
		}
		
		function get_all_locations(){
			$query="select * from location ORDER by location_name";
			return $this->query($query);
		}
	}
?>
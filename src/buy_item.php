<!DOCTYPE html>
<html>

<head>
	<title>Post Ad</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    if(!isset($_REQUEST["id"])){
        echo "Sorry, we are unable to display the details of the item you selected now";
        exit();
    }
	$vid=$_REQUEST["id"];
       echo $vid;
?>
  
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
					            <li><a href="food.php">Food</a></li>
					            <li><a href="fashion.php">Fashion</a></li>
					            <li><a href="services.php">Services</a></li>
					            <li><a href="education.php">Education</a></li>
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
                  <?php
							include("seller.php");
			$obj = new seller();
		$obj->get_details($vid);
		$row = $obj->fetch();
		

                                                           ?>
		<div align="middle" class="main">
						<table>
							<tr class="pagehead" align="right">
								<td align="left"> ~Product Information~</td>
								<td width="660"></td>
                                                        </tr>
                                                        <tr>
                                                                <td>
                                                                    <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['product_image'] ).'"/>'?>
                                                                 </td>
                                                        </tr>
                                                        <br>
                                                         <tr>       
                                                                <td>
                                                                   <strong>Product:</strong> 
								<?php echo "$row[product_name]"?>
                                                                </td>
                                                         </tr>
                                                         
                                                            <tr>
                                                                    <td>
                                                                        <tr><td>
                                                                            <strong>Product Details:</strong>
                                                                        </td></tr>
                                                                        <tr><td>
                                                                            <?php echo "$row[product_details]"?>
                                                                        </td></tr>
                                                                    </td>
                                                            </tr>
                                                            
                                                             <tr>       
                                                                <td>
                                                                <strong>Product Category:</strong>
								<?php echo "$row[product_category]"?>
                                                                </td>
                                                            </tr>
                                                         
                                                         <tr>       
                                                                <td>
								<strong>Price:</strong> 
								<?php echo "$row[price]"?>
                                                                   </td>
                                                         </tr>
                                                          
                                                           <tr>       
                                                                <td>
								<strong>Price Type:</strong> 
								<?php echo "$row[price_type]"?>
                                                                   </td>
                                                         </tr>
                                                         
                                                          <tr>       
                                                                <td>
                                                                 <strong>Seller Name:</strong>   
								<?php echo "$row[seller_name]"?>
                                                                  </td>
                                                         </tr>
                                                         
                                                          <tr>       
                                                                <td>
								<strong>Seller Location:</strong>
								<?php echo "$row[seller_location]<br></td>"?>
                                                                 </td>
                                                         </tr>
                                                         
                                                          <tr>       
                                                                <td>
								<strong>Seller Number:</strong>
								<?php echo "$row[seller_phone]"?>
                                                                </td>
                                                            </tr>
                                                            
                                                           
                                                            
                                                              <tr>       
                                                                <td>
								<strong>Seller Email:</strong>
								<?php echo "$row[seller_email]"?>
                                                                </td>
                                                     
                                                            </tr>
                                                            <br>
                                                            
                                                              <tr>       
                                                                <td>
								 <button>
	<a href="mailto:<?php echo "$row[seller_email]"?>?" target="_top">
	Click to contact seller via Email</a>
</button>
                                                                </td>
                                                     
                                                            </tr>
                                                            <br>
                                                            
                                                           
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

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
       // echo $vid;
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
                  <?php
							include("seller.php");
			$obj = new seller();
		$obj->get_details($vid);
		$row = $obj->fetch();
		

        ?>
		<div align="middle" class="main">
		<table align="center">
		<tr class="pagehead" align="right">
			<td align="left">~Product Information~</td>
        </tr>

        <tr height="30">
        </tr>
        
        <tr>
            <td>
                <?php $pic= $row['product_image']; 
                echo '<img src="upload/'.$pic.'" width="560" height="400"/></td>';?>
             </td>
	        </tr>
	        <br>
		<tr>       
            <td class='detaillabels' align="center"></br>
               <!-- <strong>Product:</strong>  -->
					<font size="6"><?php echo "$row[product_name]"?></font>
            </td>
        </tr>
         
        <tr>
            <td class='formlabel'>
                <tr><td class='formlabel'>
                   <strong>Product Description: </strong>
                	<?php echo " $row[product_details]"?>
                </td></tr>
            </td>
        </tr>
            
        <tr>       
            <td class='formlabel'>
            <strong>Product Category: </strong>
					<?php echo " $row[product_category]"?>
            </td>
        </tr>
         
        <tr>       
            <td class='formlabel'>
				<strong>Price(GHc): </strong> 
				<?php echo " $row[price]"?></td>
        </tr>
          
        <tr>       
            <td class='formlabel'>
				<strong>Price Type: </strong> 
				<?php echo " $row[price_type]"?></td>
        </tr>
         
        <tr>       
            <td class='formlabel'>
            <strong>Seller Name: </strong>
			<?php echo " $row[seller_name]"?>
            </td>
        </tr>
         
        <tr>       
            <td class='formlabel'>
				<strong>Seller Location: </strong>
				<?php echo " $row[seller_location]<br></td>"?></td>
        </tr>
         
        <tr>       
                <td class='formlabel'>
				<strong>Seller Contact Number: </strong>
				<?php echo " $row[seller_phone]"?></td>
        </tr>
            
           
            
        <tr>       
                <td class='formlabel'>
					<strong>Seller Email: </strong>
					<?php echo " $row[seller_email]"?>
                </td>
     
        </tr>
            <br>
            
        <tr>       
            <td align="center"><br>
					<!-- <button> -->
					<a href="mailto:<?php echo "$row[seller_email]"?>?" class='btn btn-mail' target="_top">
					Click to contact seller via Email</a>
				<!-- </button> -->
            </td>
        </tr>
            <br><br>
                                            
                                           
		</table>
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

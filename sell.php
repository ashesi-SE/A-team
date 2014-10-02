<html>
	<title>Sell</title>
	<head>
		<script src="jquery-1.11.0.js"></script>
		<script src="gen.js"></script>
	<?php
			include("seller.php");
			$obj = new seller();	
		?> 
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
							echo "<select name='s_l' id='s_l'>";
							if(!$obj->get_all_locations()){
								echo "Unable to get categories";
							}
							$row = $obj->fetch();
							while($row){
								echo "<option value='$row[location_id]' selected>$row[location_name] </option>";
								$row = $obj->fetch();
							}
							echo "</select>"; 
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
							echo "<select name='p_c' id='p_c'>";
							if(!$obj->get_all_categories()){
								echo "Unable to get categories";
							}
							$row = $obj->fetch();
							while($row){
								echo "<option value='$row[category_id]' selected>$row[category_name] </option>";
								$row = $obj->fetch();
							}
							echo "</select>"; 
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
							echo "<select name='p_c' id='p_c'>";
							if(!$obj->get_all_price_type()){
								echo "Unable to get categories";
							}
							$row = $obj->fetch();
							while($row){
								echo "<option value='$row[price_id]' selected>$row[price_type] </option>";
								$row = $obj->fetch();
							}
							echo "</select>"; 
							?>
							</td>
				</tr>
				<tr>
						<td class="label"></td>
						<td class="field">
							<input type="button" value="save" onclick="save_add()" >
							<input type="button" value="cancel" onclick="cancel_add()" >
						</td>
					</tr>
		

			</table>
		</div>
		</body>
</html>
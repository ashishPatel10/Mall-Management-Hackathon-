<?php 
include 'connection.php';
	session_start();
	if (!(isset($_SESSION['email']) and isset($_SESSION['password']))) 
		{
		header("location: login.php");
		}

 ?>



<!DOCTYPE html>
<html lang="en">
	<head>
		<link rel="stylesheet" type="text/css" href="ssip_theme.css"/>
		<title>Barcode_Generation</title>
			<style type="text/css">
		.title
		{
	    	margin: 20px;
		}
	</style>
	<script type="text/javascript">
	function setForm(value) {

    if(value == 'clothes'){
                document.getElementById('clothes').style='display:block;';
                document.getElementById('food').style='display:none;';
            }
            else {

                document.getElementById('food').style = 'display:block;';
                document.getElementById('clothes').style = 'display:none;';
            }
}
</script>
<script type="text/javascript">
					function funcloth(){
						var category=document.getElementById('select1').value;
						if(category=='select'){
							alert("select category name");
							return false;

						}
						var brand=document.getElementById('brand').value;
						if(brand=='select'){
							alert("select brand name");
							return false;

						}
						var type=document.getElementById('type').value;
						if(type=='select'){
							alert("select type name");
							return false;

						}
						var size=document.getElementById('size').value;
						if(size=='select'){
							alert("select size ");
							return false;

						}
						var radios = document.getElementsByName("category");
   							 				var formValid = false;

   							 				var i = 0;
   								 			while (!formValid && i < radios.length) {
      								  		if (radios[i].checked) formValid = true;
      								  		i++;        
    										}

   											 if (!formValid) alert("Must check some option!");
   											 return formValid;
						

					}
					function funfood(){
					var brand=document.getElementById('brandf').value;
						if(brand=='select'){
							alert("select brand name");
							return false;

						}
						var name=document.getElementById('name').value;
						if(name=='select'){
							alert("select type name of product");
							return false;

						}
						var weight=document.getElementById('weight').value;
						if(weight=='select'){
							alert("select weight of product");
							return false;

						}
					}

    										
											

				</script>
	</head>
<body>
	<?php include 'header.php'; ?>
		<div class="container">
	<div class="title">
		<h3 class="text-primary">Please enter the valid details below</h3>
	</div>
		<hr style="border-top:1px dotted #ccc;"/>
		
			<!-- <form method="POST">
				<div class="form-group">
					<table>
					<tr>
						<td>
					<label>Enter a text</label></td>
					<td>
					<input type="text" class="form-control" name="barcode"/>
					</td>
					</tr>
					</table>
					<br />
					<button class="btn btn-primary" name="generate">Generate</button>
					<br />
					
				</div>
			</form	> -->

				<div class="container">
		<form id='f101' method="post" action="outp.php" >
			<table>
				<tr>
					<td><label>Select the category</label></td>
					<td><select id="select1" name="selectt" onchange="setForm(this.value)">
						<option value="select">--select--</option>
						<option value="clothes">Clothes</option>
						<option value="food">Food</option>
						</select>
					</td>
				</tr>
			</table>
		</form>
		<div id="clothes">
		<form  method="post"  name="firstform" action="outp.php" target="_blank" onsubmit="return funcloth()">
		<table>
			<tr>
			<td><label>Enter the Brand</label></td>
			<td>
			<select name="select_cbname" id="brand">
			<option value="select">--select--</option>	
			<?php
				$sql=mysqli_query($conn,"select brand_name from brand where type='cloth'");
				while($row=mysqli_fetch_array($sql))
				{
					$op=$row['brand_name'];
					echo "<option>".$op."</option>";
				}  
			?>
			</select>
			</td>
			</tr>
			<tr>
				
			<td><label>Select the type name</label></td>
			<td>
			<select name="select_cname" id="type">
			<option value="select">--select--</option>
			
			<?php
				$sql=mysqli_query($conn,"select distinct type from male");
				while($row=mysqli_fetch_array($sql))
				{
					$op=$row['type'];
					echo "<option>".$op."</option>";
				} 
				$sql=mysqli_query($conn,"select distinct type from female");
				while($row=mysqli_fetch_array($sql))
				{
					$op=$row['type'];
					echo "<option>".$op."</option>";
				} 

			?>
			</select>
			</td>
			</tr>
			<tr>
			<td><label>Enter the size</label></td>
			<td>
			<select name="select_cnamep" id="size">
			<option value="select">--select--</option>	
			<?php
				$sql=mysqli_query($conn,"select distinct size from male");
				while($row=mysqli_fetch_array($sql))
				{
					$op=$row['size'];
					echo "<option>".$op."</option>";
				}  
			?>
			<?php
				$sql=mysqli_query($conn,"select distinct size from female");
				while($row=mysqli_fetch_array($sql))
				{
					$op=$row['size'];
					echo "<option>".$op."</option>";
				}  
			?>
			</select>
			</td>
			</tr>
			<div class="rdbtn">
			<tr>
				<td>
				</td>
			<td><input type="radio" name="category" value="male" >Male &nbsp&nbsp
			<input type="radio" name="category" value="female" > Female &nbsp&nbsp
			<!-- <input type="radio" name="category" value="children"> Children</td> -->
			</tr>
			</div>
		
		</table>
		<br>
			<hr>
		<button type="submit" name="submitc" class="btn btn-primary" >Submit</button><br>
		</form>
		</div>
		<div  id="food" style="display: none">
		<form method="post"  name="firstform" action="outp.php" target="_blank" onsubmit="return funfood()">
		<table>
			<tr>
			<td><label>Enter the Brand</label></td>
			<td>
			<select name="select_fbname" id="brandf">
			<option value="select">--select--</option>	
			<?php
				$sql=mysqli_query($conn,"select brand_name from brand where type='food'");
				while($row=mysqli_fetch_array($sql))
				{
					$op=$row['brand_name'];
					echo "<option>".$op."</option>";
				}  
			?>
			</select>
			</td>
			</tr>
			<tr>
			<td><label>Enter the name</label></td>
			<td>
			<select name="select_fname" id="name">
			<option value="select">--select--</option>	
			<?php
				$sql=mysqli_query($conn,"select distinct food_name from food");
				while($row=mysqli_fetch_array($sql))
				{
					$op=$row['food_name'];
					echo "<option>".$op."</option>";
				}  
			?>
			</select>
			<tr>
			<td><label>Enter the weight</label></td>
			<td>
			<select name="select_fnamep" id="weight">
			<option value="select">--select--</option>	
			<?php
				$sql=mysqli_query($conn,"select distinct weight from food");
				while($row=mysqli_fetch_array($sql))
				{
					$op=$row['weight'];
					echo "<option>".$op."</option>";
				}  
			?>
			</select>
			</td>
			</tr>
			</table>	
			<br>
			<hr>
			<button type="submit" name="submitf" class="btn btn-primary" >Submit</button><br>	
		</form>
		</div>
	</div>

			
	
		</div>
	</div>
</body>
</html>
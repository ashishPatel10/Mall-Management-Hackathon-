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
	</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<br>
		<br>
  	<a class="navbar-brand" href="#">SSS Mall</a>
  	<?php
		if($_SESSION['dept']=='AD') 
			include 'header.php'; 
	?>
    <ul class="navbar-nav ml-auto">
			<a href ='logout.php'><button style="width:auto;" class="btn btn-secondary">Log Out</button></a>
	</ul>
	</nav>
		<div class="container">
	<div class="title">
		<h3 class="text-primary">Please enter the valid details below</h3>
	</div>
		<hr style="border-top:1px dotted #ccc;"/>

				<div class="container">
		<form id='f101' method="post" action="">
			<table>
				<tr>
					<td><label>Select the category</label></td>
					<td><select id="select1" onchange="setForm(this.value)">
						<option value="clothes">Clothes</option>
						<option value="food">Food</option>
						</select>
					</td>
				</tr>
			</table>
		</form>
		<div id="clothes">
		<form  method="post"  name="firstform" action="">
		<table>
			<tr>
			<td><label>Enter the Brand</label></td>
			<td>
			<select name="select_cbname">
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
			<td><label>Select the name</label></td>
			<td>
			<select name="select_cname">
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
			<div class="rdbtn">
			<tr>
				<td>
				</td>
			<td><input type="radio" name="category" value="male" >Male &nbsp&nbsp
			<input type="radio" name="category" value="female"> Female &nbsp&nbsp
			<!-- <input type="radio" name="category" value="children"> Children</td> -->
			</tr>
			</div>
		
		</table>
		<br>
			<hr>
		<button type="submit" name=submitc class="btn btn-primary">Submit</button><br>
		</form>
		</div>
		<div  id="food" style="display: none">
		<form method="post"  name="firstform" action="">
		<table>
			<tr>
			<td><label>Enter the Brand</label></td>
			<td>
			<select name="select_fbname">
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
			<select name="select_fname">
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
			</td>
			</tr>
			</table>	
			<br>
			<hr>
			<button type="submit" name=submitf class="btn btn-primary">Submit</button><br>	
		</form>
		</div>
	</div>	
	<?php
	if (isset($_SESSION['email']) and isset($_SESSION['password'])) 
		{

				if(isset($_POST['submitc']))
				{
				//$code=$_POST['barcode'];
					//echo $_POST['select_cbname'];
					$sqll=mysqli_fetch_assoc(mysqli_query($conn,"select BRAND_ID from brand where BRAND_NAME='".$_POST['select_cbname']."'"));
					echo $sqll['BRAND_ID'];
					//echo $sqll;
					//$s=""+$sqll;
					if(isset($_POST["category"])){
						if($_POST["category"]=="male"){

							$sql=mysqli_query($conn,"select * from male where TYPE='".$_POST['select_cname']."' and BRAND_ID='".$sqll['BRAND_ID']."'");
					
						//mysql_select_db('ssip')or DIE('Database name is not available!');
				while($row=mysqli_fetch_array($sql))
				{
					// $op=$row['size'];
					//echo implode(" ", $row);
					echo "<option>".$row['M_ID'].$row['TYPE'].$row['SIZE'].$row['PRICE']."</option>";
									echo "<center><img alt='testing' src='barcode.php?codetype=code128b&size=55&text=".$row['M_ID'].$row['TYPE'].$row['SIZE'].$row['PRICE']."&print=true'/></center>";

				} 

						}else{

							$sql=mysqli_query($conn,"select * from female where TYPE='".$_POST['select_cname']."' and BRAND_ID='".$sqll['BRAND_ID']."'");
					
						//mysql_select_db('ssip')or DIE('Database name is not available!');
				while($row=mysqli_fetch_array($sql))
				{
					// $op=$row['size'];
					//echo implode(" ", $row);
					echo "<option>".$row['F_ID'].$row['TYPE'].$row['SIZE'].$row['PRICE']."</option>";
									echo "<center><img alt='testing' src='barcode.php?codetype=code128b&size=55&text=".$row['F_ID'].$row['TYPE'].$row['SIZE'].$row['PRICE']."&print=true'/></center>";
				} 
						}
					}
				}
				if(isset($_POST['submitf']))
				{
				//$code=$_POST['barcode'];
					//echo $_POST['select_cbname'];
					$sqll=mysqli_fetch_assoc(mysqli_query($conn,"select BRAND_ID from brand where BRAND_NAME='".$_POST['select_fbname']."'"));
					echo $sqll['BRAND_ID'];
				$sql=mysqli_query($conn,"select * from food where FOOD_NAME='".$_POST['select_fname']."' and BRAND_ID='".$sqll['BRAND_ID']."'");
				while($row=mysqli_fetch_array($sql))
				{
					$year = date('y', strtotime($row['EXP_DATE']));
					$month = date('M', strtotime($row['EXP_DATE']));
					echo "<option>".$row['PRODUCT_ID'].$row['FOOD_NAME'].$row['PRICE'].$row['EXP_DATE']."</option>";
									echo "<center><img alt='testing' src='barcode.php?codetype=code128b&size=55&text=".$row['PRODUCT_ID'].$row['FOOD_NAME'].$row['PRICE'].$month." ".$year."&print=true'/></center>";

				} 

				}

		}
		
	// }
	else{
 	header("location: login.php");
	 }
	
?>
		</div>
	</div>
</body>
</html>
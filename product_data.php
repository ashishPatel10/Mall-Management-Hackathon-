<?php 
	include 'connection.php';
	session_start();
	if (!(isset($_SESSION['email']) and isset($_SESSION['password']))) 
		{
		header("location: login.php");
		}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="Stylesheet" href=ssip_theme.css>
	<title>Data entery page</title>
	<style>
		.title
		{
	    	margin: 20px;
		}
		.lhidden
		{
			visibility: hidden;
		}
		.lvisible
		{
			visibility: visible;
		}
		.hidden
		{
			visibility: hidden;
		}
		.visible
		{
			visibility: visible;
		}
	</style>	
</head>
<body>
	<?php
		if($_SESSION['dept']=='AD') 
			include 'header.php'; 
	?>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<br>
		<br>
  	<a class="navbar-brand" href="#">SSS Mall</a>
    <ul class="navbar-nav ml-auto">
			<a href ='logout.php'><button style="width:auto;" class="btn btn-secondary">Log Out</button></a>
	</ul>
	</nav>
	<div class="title">
		<h4> Please enter the product details</h4>
	</div>
	<div class="container">
		<form id="f101" method="post" action="#" name="f101">
			<div class="form-group">
				<table>
					<tr>
					<td><label>Please Select the category</label></td>
					<td><!-- <select name="menu" onchange="if (this.selectedIndex==1)
								{
									//this.form['ledate'].style.visibility='visible'
									this.form['exprdate'].style.visibility='visible'
									this.form['size'].style.visibility='hidden'

									//this.form['lsize'].style.visibility='hidden'
								}
								else if(this.selectedIndex==2)
								 {
								 	this.form['exprdate'].style.visibility='hidden'
							
								 	this.form['size'].style.visibility='visible'
								 };"> -->
								 <select onchange="getvalue(this)">
						<option value="select">--select--</option>
	    				<option value="food">Food</option>
	    				<option value="cloth">Cloth</option>
					</select></td>
					</tr>
					<tr>
					<td><label>Enter the id</label></td>
					<td><input type="text" name="id" /></td>
					</tr>
					<tr>
					<td><label>Enter the Brand</label></td>
					<td><input type="text" name="brand" /></td>
					</tr>
					<tr>
					<td><label>Enter the name</label></td>
					<td><input type="text" name="name" /></td>
					</tr>
					<tr>
					<td><label>Enter the price</label></td>
					<td><input type="text" name="price" /></td>
					</tr>
					<tr>
					<td><label class="lhidden" id="lexprdate">Enter the Expiry date</label></td>
					<td><input type="text" name="exprdate" style="visibility:hidden;"/></td>
					</tr>
					<div class="visible" id="clothes">
					<tr>
						<td><input type="radio" name="category" value="male" > Male &nbsp&nbsp
						<input type="radio" name="category" value="female"> Female &nbsp&nbsp
						<input type="radio" name="category" value="children"> Children</td>
					</tr>
					<tr>
					<td><label  id="lsize">Enter the size</label></td>
					<td><input type="text" name="size" /></td>
					</tr>
					</div>
				</table>
				<button type="submit" name=submit class="btn btn-primary">Submit</button><br>
			</div>
		</form>
		<script type="text/javascript">
			function getvalue(obj)
			{
				if (obj.selectedIndex==1)
								{
									//this.form['ledate'].style.visibility='visible'
									 document.getElementById("clothes").style.visibility='visible';
									 document.getElementById("food").style.visibility='hidden';
									// document.getElementById("rdbt").style.hidden='hidden';
									//obj.form['exprdate'].style.visibility='visible';
									//obj.form['size'].style.visibility='hidden';
									//document.getElementById("lexprdate").style.lhidden='visible';
									//document.getElementById("lsize").style.lhidden='hidden';
								}
								else if(obj.selectedIndex==2)
								 {
								 	document.getElementById("clothes").style.visibility='hidden';
									 document.getElementById("food").style.visibility='visible';
								 // 	document.getElementById("lexprdate").style.lhidden='hidden';
									// document.getElementById("lsize").style.lhidden='visible';
								 // 	obj.form['exprdate'].style.visibility='hidden';
								 // 	obj.form['size'].style.visibility='visible';
								 }				
			}
		</script>
		<?php
			$id=$_POST['id'];
			$name=$_POST['name'];
			$brand=$_POST['brand'];
			$price=$_POST['price'];
			
			if(filter_has_var(INPUT_POST, 'submit')) 
			{
				if(isset($_POST['exprdate']))
				{
					
				}
				
				else if(isset($_POST['size']))
				{

				}
			} 
		?>
	</div>
</body>
</html>
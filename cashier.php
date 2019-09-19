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
	<title>Cashier</title>
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
	<form method="post" action="#">
	<div class="container">
		<br>
		
		<label>Enter the bill id:</label>
		<input type="number" name="bill_id" id="bill_id" >
		<button id="submit" name="submit" class="btn btn-primary">Submit</button>
		<br>
		<hr>
	</div>
	</form>
</body>
	<?php
	if (isset($_POST['submit'])) {
		$bill_id=$_POST['bill_id'];
		$query=mysqli_query($conn,"select customer_id from btoc_mapping where bill_id='$bill_id'");
		$row=mysqli_fetch_array($query);
		$cid=$row['customer_id'];
		//echo $cid;
		$sql=mysqli_query($conn,"select * from bill_details where bill_id='$bill_id'");
		echo "<div class='container'>";
		echo "<table style=width:80% border=2 align=center bgcolor=#D7DBDD class=table-hover>";		
		echo "<tr bgcolor=#909497>";
		echo "<th>NO.</th>";	
		echo "<th>Brand ID</th>";
		echo "<th>Item Name</th>";
		echo "<th>Price</th>";
		echo "</tr>";
		$i=1;
		while($row=mysqli_fetch_array($sql))
		{
			$table=$row['product_dept'];
			$id=$row['product_id'];
			$sql1=mysqli_query($conn,"select price,brand_id,m_id,type from $table where m_id='$id'");
			$row1=mysqli_fetch_array($sql1);
			echo "<tr>";
			echo "<td>".$i."</td>"."<td>".$row1['brand_id']."</td>"."<td>".$row1['type']."</td>"."<td>".$row1['price']."</td>";
			echo "</tr>";
			$i++;
		}
		echo "</table>";
		echo "</div>";
	}
	?>
</html>
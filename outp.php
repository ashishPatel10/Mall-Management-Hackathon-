<?php 
include 'connection.php';
//mysql_select_db($db) or die("cannot select DB");

// if(isset($_POST['login']))
// 	{
 		//$email= $_POST['email'];
 		//$pass = $_POST['pass'];
 		//if ($email == $_SESSION['email'] and $pass==$_SESSION['password']) {
		
		//echo "gd";
if (!(isset($_SESSION['email']) and isset($_SESSION['password']))) 
		{header("location: login.php");}

 ?>



<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		#data{
			
			color: blue;
			font-size: 50px;

		}


	</style>
</head>
<body>
<?php 
				if(isset($_POST['submitf']))
				{
				//$code=$_POST['barcode'];
					//echo $_POST['select_cbname'];
					$sqll=mysqli_fetch_assoc(mysqli_query($conn,"select BRAND_ID from brand where BRAND_NAME='".$_POST['select_fbname']."'"));
					//echo $sqll['BRAND_ID'];
					//echo $sqll;
					//$s=""+$sqll;
				$sql=mysqli_query($conn,"select * from food where FOOD_NAME='".$_POST['select_fname']."' and PRICE='".$_POST['select_fnamep']."' and BRAND_ID='".$sqll['BRAND_ID']."'");

					$sqlcount=mysqli_num_rows($sql);
					//echo $sqlcount;
					if($sqlcount == 0){
						//mysql_select_db('ssip')or DIE('Database name is not available!');
						echo "<h1><div id='data' class='container' align='center'>no related data found</div></h1>";
					}
					else{

						echo "<table align='center'>";
				while($row=mysqli_fetch_array($sql)){
					echo "</tr>";
					$year = date('y', strtotime($row['EXP_DATE']));

						$month = date('M', strtotime($row['EXP_DATE']));

						//echo $month;
						$food=substr($row['FOOD_NAME'], 0, 4);
						if($row==0){
											break;
										}
						echo "<td>
							<img alt='testing' src='barcode.php?codetype=code128b&size=55&text=".$row['PRODUCT_ID'].$food.$row['WEIGHT'].$month." ".$year."&print=true'/>

						</td>";
						echo "&nbsp";
						echo "&nbsp";
						echo "&nbsp";
						$row=mysqli_fetch_array($sql);
						$year = date('y', strtotime($row['EXP_DATE']));

						$month = date('M', strtotime($row['EXP_DATE']));

						//echo $month;
						$food=substr($row['FOOD_NAME'], 0, 4);
						if($row==0){
											break;
										}

						echo "<td>
							<img alt='testing' src='barcode.php?codetype=code128b&size=55&text=".$row['PRODUCT_ID'].$food.$row['WEIGHT'].$month." ".$year."&print=true'/>

						</td>";
						echo "&nbsp";
						echo "&nbsp";
						echo "&nbsp";

						$row=mysqli_fetch_array($sql);
					$year = date('y', strtotime($row['EXP_DATE']));

						$month = date('M', strtotime($row['EXP_DATE']));

						//echo $month;
						$food=substr($row['FOOD_NAME'], 0, 4);
						if($row==0){
											break;
										}

					echo "<td>
						<img alt='testing' src='barcode.php?codetype=code128b&size=55&text=".$row['PRODUCT_ID'].$food.$row['WEIGHT'].$month." ".$year."&print=true'/>

						</td>";
						echo "&nbsp";
						echo "&nbsp";
						echo "&nbsp";	

						$row=mysqli_fetch_array($sql);
					$year = date('y', strtotime($row['EXP_DATE']));

						$month = date('M', strtotime($row['EXP_DATE']));

						//echo $month;
						$food=substr($row['FOOD_NAME'], 0, 4);
						if($row==0){
											break;
										}

					echo "<td>
						<img alt='testing' src='barcode.php?codetype=code128b&size=55&text=".$row['PRODUCT_ID'].$food.$row['WEIGHT'].$month." ".$year."&print=true'/>

						</td>";
						echo "&nbsp";
						echo "&nbsp";
						echo "&nbsp";	


					
					echo "</tr>";

				}
				echo "</table>";

					}
				

				}



				if(isset($_POST['submitc']))
				{
					//$code=$_POST['barcode'];
					//echo $_POST['select_cbname'];
					$sqll=mysqli_fetch_assoc(mysqli_query($conn,"select BRAND_ID from brand where BRAND_NAME='".$_POST['select_cbname']."'"));
					//echo $sqll['BRAND_ID'];
					//echo $sqll;
					//$s=""+$sqll;
					if(isset($_POST["category"])){
							if($_POST["category"]=="male"){

								$sql=mysqli_query($conn,"select * from male where TYPE='".$_POST['select_cname']."'  and SIZE='".$_POST['select_cnamep']."' and BRAND_ID='".$sqll['BRAND_ID']."'");

									$sqlcount=mysqli_num_rows($sql);
									//echo $sqlcount;
									if($sqlcount == 0){
										//mysql_select_db('ssip')or DIE('Database name is not available!');
										echo "<h1><div id='data' class='container' align='center'>no related data found</div></h1>";
										}
										else{
											echo "<table align='center'>";
									while($row=mysqli_fetch_array($sql))
									{
										if($row==0){
											break;
										}

										echo "<tr>";
											// for($var=0;$var<3;$var++){
											// 	$sqlcount=$sqlcount-1;
											// 	if($sqlcount==0){
											// 		break;
											// 	}
										$clot=substr($row['TYPE'], 0, 4);
										if($row==0){
											break;
										}
											echo "<td>
										<img alt='testing' src='barcode.php?codetype=code128b&size=55&text=".$row['M_ID'].$clot.$row['SIZE']."&print=true'/>
											</td>";
												echo "&nbsp";
												echo "&nbsp";
												echo "&nbsp";


											$row=mysqli_fetch_array($sql);
											$clot=substr($row['TYPE'], 0, 4);
											if($row==0){
											break;
										}
											echo "<td>
											<img alt='testing' src='barcode.php?codetype=code128b&size=55&text=".$row['M_ID'].$clot.$row['SIZE']."&print=true'/>
											</td>";
												echo "&nbsp";
												echo "&nbsp";
												echo "&nbsp";
												

						$row=mysqli_fetch_array($sql);
						$clot=substr($row['TYPE'], 0, 4);
						if($row==0){
											break;
										}
					echo "<td>
						<img alt='testing' src='barcode.php?codetype=code128b&size=55&text=".$row['M_ID'].$clot.$row['SIZE']."&print=true'/>
						</td>";
						echo "&nbsp";
						echo "&nbsp";
						echo "&nbsp";	

						$row=mysqli_fetch_array($sql);
						$clot=substr($row['TYPE'], 0, 4);

						if($row==0){
											break;
										}

					echo "<td>
						<img alt='testing' src='barcode.php?codetype=code128b&size=55&text=".$row['M_ID'].$clot.$row['SIZE']."&print=true'/>
						</td>";
						echo "&nbsp";
						echo "&nbsp";
						echo "&nbsp";		

										

						echo "</tr>";
					}
				
				echo "</table>";

										}
									
									

						}else{

							$sql=mysqli_query($conn,"select * from female where TYPE='".$_POST['select_cname']."' and SIZE='".$_POST['select_cnamep']."' and BRAND_ID='".$sqll['BRAND_ID']."'");



							$sqlcount=mysqli_num_rows($sql);
									//echo $sqlcount;
									if($sqlcount == 0){
										//mysql_select_db('ssip')or DIE('Database name is not available!');
										echo "<h1><div id='data' class='container' align='center'>no related data found</div></h1>";
										}
										else{
											echo "<table align='center'>";
					
						//mysql_select_db('ssip')or DIE('Database name is not available!');
				while($row=mysqli_fetch_array($sql))
				{
					echo "<tr>";
					
					if($row==0){
											break;
										}
					$clot=substr($row['TYPE'], 0, 4);

					echo "<td>
						<img alt='testing' src='barcode.php?codetype=code128b&size=55&text=".$row['F_ID'].$clot.$row['SIZE']."&print=true'/>
						</td>";
						echo "&nbsp";
						echo "&nbsp";
						echo "&nbsp";

						$row=mysqli_fetch_array($sql);
					$clot=substr($row['TYPE'], 0, 4);
					if($row==0){
											break;
										}
					echo "<td>
						<img alt='testing' src='barcode.php?codetype=code128b&size=55&text=".$row['F_ID'].$clot.$row['SIZE']."&print=true'/>
						</td>";
						echo "&nbsp";
						echo "&nbsp";
						echo "&nbsp";

						$row=mysqli_fetch_array($sql);
					$clot=substr($row['TYPE'], 0, 4);
					if($row==0){
											break;
										}
					echo "<td>
						<img alt='testing' src='barcode.php?codetype=code128b&size=55&text=".$row['F_ID'].$clot.$row['SIZE']."&print=true'/>
						</td>";
						echo "&nbsp";
						echo "&nbsp";
						echo "&nbsp";

						$row=mysqli_fetch_array($sql);
					$clot=substr($row['TYPE'], 0, 4);
					if($row==0){
											break;
										}
					echo "<td>
						<img alt='testing' src='barcode.php?codetype=code128b&size=55&text=".$row['F_ID'].$clot.$row['SIZE']."&print=true'/>
						</td>";
						echo "&nbsp";
						echo "&nbsp";
						echo "&nbsp";	

						echo "</tr>";
					}
					

					
					
					echo "</table>";

										}
				
				} 


				}

					
				

				}



?>
</body>
</html>
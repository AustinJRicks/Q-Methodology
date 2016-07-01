<?php
$userID= $_POST["userID"];
$sql0="INSERT INTO `table_status7` (`User`, `Statement_ID`, `Status`) VALUES  ('". $userID. "', '". $_POST["list0SortOrder"]. "', '-3')";
$sql1="INSERT INTO `table_status7` (`User`, `Statement_ID`, `Status`) VALUES  ('". $userID. "', '". $_POST["list1SortOrder"]. "', '-2')";
$sql2="INSERT INTO `table_status7` (`User`, `Statement_ID`, `Status`) VALUES  ('". $userID. "', '". $_POST["list2SortOrder"]. "', '-1')";
$sql3="INSERT INTO `table_status7` (`User`, `Statement_ID`, `Status`) VALUES  ('". $userID. "', '". $_POST["list3SortOrder"]. "', '0')";
$sql4="INSERT INTO `table_status7` (`User`, `Statement_ID`, `Status`) VALUES  ('". $userID. "', '". $_POST["list4SortOrder"]. "', '1')";
$sql5="INSERT INTO `table_status7` (`User`, `Statement_ID`, `Status`) VALUES  ('". $userID. "', '". $_POST["list5SortOrder"]. "', '2')";
$sql6="INSERT INTO `table_status7` (`User`, `Statement_ID`, `Status`) VALUES  ('". $userID. "', '". $_POST["list6SortOrder"]. "', '3')";
?>
<?php 	$StronglyDisagree="Why do you strongly disagree with this statement?";
		$StronglyAgree="Why do you strongly agree with this statement?";
?>

<!DOCTYPE html>
<html>
	<head>
		<title>PaveTheGame Project</title>
		<style>
			h3.neg {color: red;}
			h3.agr {color: green;}
			TEXTAREA {	width: 60vw;
						height: 30vh;
						}
			.btn 	{
					-webkit-border-radius: 9;
					-moz-border-radius: 9;
					border-radius: 9px;
					font-family: Arial;
					color: #ffffff;
					font-size: 20px;
					background: #3498db;
					padding: 10px 20px 10px 20px;
					text-decoration: none;
					}

				.btn:hover 	{
							background: #3cb0fd;
							text-decoration: none;
							}
			
		</style>

		
		
	</head>
	<body>
	
	<h1>Now can you please answer 11 questions about typical road maintenance contracts</h1>
		<form action="step5.php" method="post" style="padding:20px; width:80%; margin:20px auto; border:solid 1px black">
		<?php
		//include db configuration file
		include_once("config.php");
		//MySQL query
		$mysqli->query($sql0);
		$mysqli->query($sql1);
		$mysqli->query($sql2);
		$mysqli->query($sql3);
		$mysqli->query($sql4);
		$mysqli->query($sql5);
		$mysqli->query($sql6);
		
$sql = "SELECT S.StatementNumber as 'id', S.Statement FROM table_statements S, table_status7 R where (S.StatementNumber=R.Statement_ID and R.User='". $userID."' and R.Status='-3' and S.Language='Eng')";
				//MySQL query
					$results = $mysqli->query($sql);
					$i=1;

					//get all records from add_delete_record table
					while($row = $results->fetch_assoc())
					{	
						echo "<div id=\"div" . $i. "\" style=\"display:";						
						if ($i =="1") {
							echo "initial\">";;
						} else {
							echo "none\">";;
							}

						echo "\r\n";						
						echo "<h3 class=\"neg\">".$StronglyDisagree. "</h3>";
						echo "\r\n";
						echo "<h2>". $row["Statement"]."</h2>";
						echo "\r\n";
						echo "<input name=\"id". $i ."\" value=\"". $row["id"]. "\" style=\"display:none\"/>";
						echo "\r\n";						
						echo "<TEXTAREA name=\"id". $i ."value\"></TEXTAREA>";
						echo "\r\n";
						echo "</br>";
						echo "\r\n";
						echo "<button type=\"button\" onclick=\"myFunction('div".$i++."','div".$i."')\" class=\"btn\">Go to next question</button>";
						echo "\r\n";
						echo "</div>";
						echo "\r\n";
						echo "\r\n";						
						
					}
				$sql = "SELECT S.StatementNumber as 'id', S.Statement FROM table_statements S, table_status7 R where (S.StatementNumber=R.Statement_ID and R.User='". $userID."' and R.Status='3' and S.Language='Eng')";
				//MySQL query
					$results = $mysqli->query($sql);


					//get all records from add_delete_record table
					while($row = $results->fetch_assoc())
					{	
						echo "<div id=\"div" . $i. "\" style=\"display:none\">";						
						echo "\r\n";						
						echo "<h3 class=\"agr\">".$StronglyAgree. "</h3>";
						echo "\r\n";
						echo "<h2>". $row["Statement"]."</h2>";
						echo "\r\n";
						echo "<input name=\"id". $i ."\" value=\"". $row["id"]. "\" style=\"display:none\"/>";
						echo "\r\n";						
						echo "<TEXTAREA name=\"id". $i ."value\"></TEXTAREA>";
						echo "\r\n";
						echo "</br>";
						echo "\r\n";
						echo "<button type=\"button\" onclick=\"myFunction('div".$i++."','div".$i."')\" class=\"btn\">Go to next question</button>";
						echo "\r\n";
						echo "</div>";
						echo "\r\n";
						echo "\r\n";						
						
					}				
						//echo "<script> myFunction(div2,div1); </script>";
			//	echo "</ul></td><td>";
			//	echo "<b>Statments that are neutral</b>";
			//	echo "<ul id=\"Neutral\">";
				
				
				
				//close db connection
				$mysqli->close();
				?>				

<div id="div11" style="display:none">
<h3 class="last">Do you have any other comments?</h3>
<input name="id11" value="0" style="display:none"/>
<TEXTAREA name="id11value"></TEXTAREA>
</br>
<input name="userID" value="<?php echo $userID;?>" style="display:none"/>
<input type="submit" name="Step1" value="Go to next page" class="btn"></center>
</div>
	</form>
	
		<script>
			function myFunction(v1, v2)
				{ 
				document.getElementById(v1).style.display = "none";
				document.getElementById(v2).style.display = "block";
				}
		</script>	
	
	
	
	</body>
</html>
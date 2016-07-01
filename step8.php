<?php $userID= $_POST["userID"];?>

<!DOCTYPE html>
<html>
	<head>
  <title>PaveTheGame Project</title>
	</head>
	<body>

		
		<?php
		//include db configuration file
		include_once("config.php");
		//MySQL query
		
		for ($i = 1; $i <= 11; $i++) 
			{
			$sql= "INSERT INTO `table_commentst` (`user`, `statement`, `comment`) VALUES ('".$userID. "', '". $_POST["id". $i] . "', '" . $_POST["id". $i. "value"]. "');";
			
			$mysqli->query($sql);

			}
		//close db connection
		$mysqli->close();
?> 

<h1>Thank you so much for your contribution!</h1>

If you have any extra comments or advices, I would be happy to hear from you! </br>
<a href="mailto:kornevs@kth.se"><i>Maksims Kornevs</i></a>

	</body>
</html>


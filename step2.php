

<!DOCTYPE html>
<html>
<head>
  <title>PaveTheGame Project</title>
<style>


h2 {width:100%; height:90px; border:solid 1px black; background-color:#E0E0E0; text-align:center; padding-top:10px;}

</style>

 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
</head>
<body>

<?php
//all text
$disagree='I disagree';
$neutral='I am neutral';
$agree='I agree';
?>



<table width="100%"><tr><td width="20%" style="vertical-align: middle">
<img src="images/main1.jpg" style="width:20vw">
</td><td width="60%" style="font-size:1vw; padding: 10px">

You will see 43 different statements in the context of <b>TYPICAL ROAD MAINTENANCE CONTRACTS</b>. That means that these statements relates to taking care of built road, for example maintenance work and repairing works. </br></br> Think about them from <b>YOUR</b> professional perspective - as you would think about them in your daily work.</br>Click on one of the buttons below based on your opinion. <i>If necessary you will be able to change answers later. </i>

</td><td width="20%" style="vertical-align: middle">
<img src="images/main2.jpg" style="width:20vw">
	



</td></tr>
</table>

<div style="font-family:Arial; font-size:12pt; padding:20px; width:80%; margin:20px auto; border:solid 1px black">


<?php
$sql = "INSERT INTO `table_users` (`Name`, `Position`, `Keywords`, `WorkYears`, `Company`, `IP`) VALUES ('". $_POST["name"]. "', '". $_POST["position"]."', '". $_POST["keywords"]."', '". $_POST["workYears"]."', '". $_POST["company"]."', '". $_SERVER['REMOTE_ADDR']. "');"; 

//include db configuration file
				include_once("config.php");
				//MySQL query
					$mysqli->query($sql); 
				
$last_id = $mysqli->insert_id;


//MySQL query
$results = $mysqli->query("SELECT StatementNumber as 'id',Statement FROM table_statements where Language='Eng'" ); //where Language='Swe'
//get all records from add_delete_record table

while($row = $results->fetch_assoc())
{	


						echo '<div id="DIV'. $row["id"] .'" style="display:';
						if ($row["id"] =="1") {
							echo "initial\">";
						} else {
							echo "none\">";
							}						

						//<div id='DIV1'>
                        echo "\r\n";
						echo '<h2>' . $row["Statement"]. '</h2>';																//<h2>statement</h2>
                        echo "\r\n";
						echo "<center>";
						echo "<button type=\"button\" onclick=\"myFunction('DIV". $row["id"]."','DIV". ((int)$row["id"]+1)."',-1)\" class=\"btn btn-danger\">". $disagree."</button>";			//<button type="button" onclick="myFunction('DIV1','DIV2',-1)">$disagree</button></br></br>
                        echo "\r\n";
						echo "<button type=\"button\" onclick=\"myFunction('DIV". $row["id"]."','DIV". ((int)$row["id"]+1)."',0)\" class=\"btn btn-default\">". $neutral."</button>";		//<button type="button" onclick="myFunction('DIV1','DIV2',0)">$neutral</button></br></br>
                        echo "\r\n";
						echo "<button type=\"button\" onclick=\"myFunction('DIV". $row["id"]."','DIV". ((int)$row["id"]+1)."',1)\" class=\"btn btn-success\">". $agree."</button>";			//<button type="button" onclick="myFunction('DIV1','DIV2',1)">$agree</button>
						echo "</center>";
                        echo "\r\n";
				        echo '</div>';
                        echo "\r\n";
                        echo "\r\n";
					
}						

				//close db connection
				$mysqli->close();
				?>

</br>
			

<div id="DIV44" style="display:none"> 
<form action="step3.php" method="post" >
<input id="userIDfield" type="textarea" name="userIDfield" style="display:none"/>
<input id="query" type="textarea" name="query" style="display:none"/>
<center><input type="submit" name="Step1" value="Go to next page" class="btn btn-info btn-lg"></center> 
</form>
</div>
 
<script>

var query ="";
var IDs = 1;
var UserID=<?php echo $last_id;?>;
document.getElementById("userIDfield").value=UserID;



function myFunction(v1, v2, v3)
{
 
document.getElementById(v1).style.display = "none";
document.getElementById(v2).style.display = "block";

query=query+"('"+UserID+"', "+IDs+", "+v3+"), ";
document.getElementById("query").value=query;
IDs=IDs+1;
}
</script>


</div>

</body>
</html>





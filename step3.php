<?php $userID=$_POST["userIDfield"];?>

<!DOCTYPE html>
<html>
<head>
  <title>PaveTheGame Project</title>
	<meta charset="utf-8" />
	 
	<style type="text/css">
		body { font-family:Arial; font-size:12pt;}
		h1 { font-size:16pt; }
		h2 { font-size:13pt; }
		ul { margin:0px; padding:0px; margin-left:20px; }
		 #list-3, #list-2, #list-1, #list0, #list1, #list2, #list3 { width:9vw; list-style-type:none; margin:0px; }
		#Agree li, #Disagree li, #Neutral li, #list-3 li, #list-2 li, #list-1 li, #list0 li, #list1 li, #list2 li, #list3 li { float:left; padding: 0.5vw; width:8.5vw; height:8.5vw;  }
		#Agree div, #Disagree div, #Neutral div, #list-3 div , #list-2 div, #list-1 div , #list0 div, #list1 div , #list2 div, #list3 div { width:8.4vw; height:8.4vw;  font-size: 0.9vw; border:solid 1px black; text-align:center;}
		
		#list-3 div {background-color:#FF0000;}
		#list-2 div {background-color:#FF8000;}
		#list-1 div {background-color:#FFBF00;}
		#list0 div {background-color:#FFFFCB;}
		#list1 div {background-color:#BFFF00;}
		#list2 div {background-color:#40FF00;}
		#list3 div {background-color:#04B404;}
		#Agree div, #Disagree div, #Neutral div {background-color:#E0E0E0;}
		
		//#list2 { float:right; }
		.placeHolder div { background-color:white !important; border:dashed 1px gray !important; }
		
		td {vertical-align: top;
}



[data-tooltip] {
    display: inline-block;
    position: relative;
    cursor: zoom-in;

}
/* Tooltip styling */
[data-tooltip]:before {
    content: attr(data-tooltip);
    display: none;
    position: absolute;
    background: #D8D8D8;
    color: #000;
    padding: 4px 8px;
    font-size: 14px;
    line-height: 1.4;
    min-width: 100px;
    text-align: center;
    border-radius: 4px;
    top: 100%;
    margin-top: 6px;
    
}


[data-tooltip]:after {
    content: '';
    display: none;
    position: absolute;
    width: 0;
    height: 0;
    border-color: transparent;
    border-style: solid;
    left: 50%;
    margin-left: -6px;
    top: 100%;
    border-width: 0 6px 6px;
    border-bottom-color: #D8D8D8;
}

/* Show the tooltip when hovering */
[data-tooltip]:hover:before,
[data-tooltip]:hover:after {
    display: block;
    z-index: 50;
}

.btn {
  -webkit-border-radius: 9;
  -moz-border-radius: 9;
  border-radius: 9px;
  font-family: Arial;
  color: #ffffff;
  font-size: 20px;
  background: #3498db;
  padding: 10px 20px 10px 20px;
  text-decoration: none;
  cursor: pointer;
}

.btn:hover {
  background: #3cb0fd;
  text-decoration: none;
}

	</style>
	
	
	
</head>
<body>
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="jquery.dragsort-0.5.2.min.js"></script>
	<script type="text/javascript" src="jquery.ui.touch-punch.min.js"></script>
	
<table width="100%"><tr><td width="25%">
<img src="images/main3.jpg" style="width:25vw">
</td><td width="60%" style="font-size:1vw">

On your left you see previous statements in 3 columns based on your opinion. Next you need to select:</br></br>
<ul>
  
<li>exactly <b>five</b> statements you most strongly disagree with</li>
<li>exactly <b>six</b> statements you disagree with</li>
<li>exactly <b>seven</b> statements you slightly disagree with</li>
<li>exactly <b>seven</b> statements you are neutral with</li>
<li>exactly <b>seven</b> statements you  slightly agree with</li>
<li>exactly <b>six</b> statements you agree with and </li>
<li>exactly <b>five</b> statements you most strongly agree with</li> </ul></br>
  and drag and drop them into columns on the right side. There is no specific order how you must do it. You can change location if you need to as long as in the end it will be right number of statements in each column.

</td><td width="20%" style="vertical-align: middle">

	<form action="step4.php" method="post" id="sumbitform" style="display:none">
	<div  style="font-size:1vw" >

	<input name="list0SortOrder" style="display:none"/>
	<input name="list1SortOrder" style="display:none"/>
	<input name="list2SortOrder" style="display:none"/>
	<input name="list3SortOrder" style="display:none"/>
	<input name="list4SortOrder" style="display:none"/>
	<input name="list5SortOrder" style="display:none"/>
	<input name="list6SortOrder" style="display:none"/>
	<input name="userID" value="<?php echo $userID;?>" style="display:none"/>
	<center>
	If this is your final opinion, please click button below </br>
	<input type="submit" name="Step1" value="Go to next page" class="btn"></center>
	</div>
	</form>



</td></tr>
</table>

	
	
<table width="100%">
	
<tr><td width="30%" style="border-right: 2px solid">
<table id="Disagree/neutral/agree statements" ><tr style="font-size:1vw">
<th style="color:#c9302c" >You disagreed</th>
<th >You were neutral</th>
<th style="color:#449d44">You agreed</th>
</tr><td>

			<ul id="Disagree">
				<?php
				
	//include db configuration file
				include_once("config.php");
				
				$query="INSERT INTO `table_status3` (`User`, `Statement_ID`, `Status`) VALUES ". chop($_POST["query"],", ");
				$mysqli->query($query);
				
				
				$userID=$_POST["userIDfield"];
				
				
				$sql = "SELECT S.StatementNumber as 'id', S.Statement FROM table_statements S, table_status3 R where (S.StatementNumber=R.Statement_ID and R.User='". $userID."' and R.Status='-1' and S.Language='Eng')";
				//MySQL query
					$results = $mysqli->query($sql); //where Language='Swe'
					
					//get all records from add_delete_record table
					while($row = $results->fetch_assoc())
					{	
						echo "<li data-itemid='" . $row["id"]. "'>";
						echo "<div data-tooltip=\"" . $row["Statement"]. "\">";
						echo $row["Statement"]. "</div>";
						echo "</li>";
						echo "\r\n";
					}
				echo "</ul></td><td>";
				echo "<ul id=\"Neutral\">";
						
				$sql = "SELECT S.StatementNumber as 'id', S.Statement FROM table_statements S, table_status3 R where (S.StatementNumber=R.Statement_ID and R.User='". $userID."' and R.Status='0' and S.Language='Eng')";

					$results = $mysqli->query($sql); //where Language='Swe'
					
					//get all records from add_delete_record table
					while($row = $results->fetch_assoc())
					{	
						echo "<li data-itemid='" . $row["id"]. "'>";
						echo "<div data-tooltip=\"" . $row["Statement"]. "\">";
						echo $row["Statement"]. "</div>";
						echo "</li>";
						echo "\r\n";
					}
				echo "</ul></td><td>";
				echo "<ul id=\"Agree\">";

				$sql = "SELECT S.StatementNumber as 'id', S.Statement FROM table_statements S, table_status3 R where (S.StatementNumber=R.Statement_ID and R.User='". $userID."' and R.Status='1' and S.Language='Eng')";
				//MySQL query
					$results = $mysqli->query($sql); //where Language='Swe'
					
					//get all records from add_delete_record table
					while($row = $results->fetch_assoc())
{	
						echo "<li data-itemid='" . $row["id"]. "'>";
						echo "<div data-tooltip=\"" . $row["Statement"]. "\">";
						echo $row["Statement"]. "</div>";
						echo "</li>";
						echo "\r\n";
}

				//close db connection
				$mysqli->close();
				?>
			</ul></td>
			</tr></table>


</td><td>  
	
<table>
<tr style="font-size:1vw">
<th style="background-color:#FF0000">Strongly disagree 	<div id="TitleList-3" style="font-style: italic; font-weight: lighter">(add 5 more)</div></th>
<th style="background-color:#FF8000">Disagree 			<div id="TitleList-2" style="font-style: italic; font-weight: lighter">(add 6 more)</div></th>
<th style="background-color:#FFBF00">Slightly disagree 	<div id="TitleList-1" style="font-style: italic; font-weight: lighter">(add 7 more)</div></th>
<th style="background-color:#FFFFCB">Neutral 			<div id="TitleList0"  style="font-style: italic; font-weight: lighter">(add 7 more)</div></th>
<th style="background-color:#BFFF00">Slightly agree 	<div id="TitleList1"  style="font-style: italic; font-weight: lighter">(add 7 more)</div></th>
<th style="background-color:#40FF00">Agree 				<div id="TitleList2"  style="font-style: italic; font-weight: lighter">(add 6 more)</div></th>
<th style="background-color:#04B404">Strongly agree 	<div id="TitleList3"  style="font-style: italic; font-weight: lighter">(add 5 more)</div></th>


</tr>

<tr><td>	
	<ul id="list-3">

	</ul>
</td><td>	
	<ul id="list-2">

	</ul>
</td><td>	
		<ul id="list-1">

	</ul>
</td><td>	
		<ul id="list0">

	</ul>
</td><td>	
		<ul id="list1">

	</ul>
</td><td>	
		<ul id="list2">


	</ul>
</td><td>	
		<ul id="list3">

	</ul>
</td></tr></table>	

</td></tr></table>
	<!-- save sort order here which can be retrieved on server on postback -->


	<script type="text/javascript">
		$("#list-3, #list-2, #list-1, #list0, #list1, #list2, #list3, #Disagree, #Neutral, #Agree").dragsort({ dragSelector: "div", dragBetween: true, dragEnd: saveOrder, placeHolderTemplate: "<li class='placeHolder'><div></div></li>" });
		
		function saveOrder() {
		
		//LIST -3
			var list0 = $("#list-3 li").map(function() { return $(this).data("itemid"); }).get();
			$("input[name=list0SortOrder]").val(list0.join("', '-3'), ('<?php echo $userID;?>', '"));
			//            statementID', 'status'), ('userID', 'statementID
			//('userID', 'statementID', 'status'), ('userID', 'statementID', 'status')
			var list0size = list0.length; //5
			switch (list0size) {
				case 0:	case 1:	case 2:	case 3:
				case 4: document.getElementById("TitleList-3").innerHTML = "(add "+ (5-list0size) +" more)";
				break;
				case 5: document.getElementById("TitleList-3").innerHTML = "(completed)";
				break;
				default: document.getElementById("TitleList-3").innerHTML = "(remove " + (list0size-5) + " more)";
			}
			
		//LIST -2
			var list1 = $("#list-2 li").map(function() { return $(this).data("itemid"); }).get();
			$("input[name=list1SortOrder]").val(list1.join("', '-2'), ('<?php echo $userID;?>', '"));
			var list1size = list1.length; //6		
		
			switch (list1size) {
				case 0:	case 1:	case 2:	case 3:	case 4:
				case 5: document.getElementById("TitleList-2").innerHTML = "(add "+ (6-list1size) +" more)";
				break;
				case 6: document.getElementById("TitleList-2").innerHTML = "(completed)";
				break;
				default: document.getElementById("TitleList-2").innerHTML = "(remove " + (list1size-6) + " more)";
			}	
			
		//LIST -1
			var list2 = $("#list-1 li").map(function() { return $(this).data("itemid"); }).get();
			$("input[name=list2SortOrder]").val(list2.join("', '-1'), ('<?php echo $userID;?>', '"));
			var list2size = list2.length; //7
			
			switch (list2size) {
				case 0:	case 1:	case 2:	case 3:	case 4:	case 5:
				case 6: document.getElementById("TitleList-1").innerHTML = "(add "+ (7-list2size) +" more)";
				break;
				case 7: document.getElementById("TitleList-1").innerHTML = "(completed)";
				break;
				default: document.getElementById("TitleList-1").innerHTML = "(remove " + (list2size-7) + " more)";
			}	
		
		//LIST  0
			var list3 = $("#list0 li").map(function() { return $(this).data("itemid"); }).get();
			$("input[name=list3SortOrder]").val(list3.join("', '0'), ('<?php echo $userID;?>', '"));
			var list3size = list3.length; //7
			
			switch (list3size) {
				case 0:	case 1:	case 2:	case 3:	case 4:	case 5:
				case 6: document.getElementById("TitleList0").innerHTML = "(add "+ (7-list3size) +" more)";
				break;
				case 7: document.getElementById("TitleList0").innerHTML = "(completed)";
				break;
				default: document.getElementById("TitleList0").innerHTML = "(remove " + (list3size-7) + " more)";
			}	
	
		//LIST +1
			var list4 = $("#list1 li").map(function() { return $(this).data("itemid"); }).get();
			$("input[name=list4SortOrder]").val(list4.join("', '1'), ('<?php echo $userID;?>', '"));
			var list4size = list4.length; //7
			
			switch (list4size) {
				case 0:	case 1:	case 2:	case 3:	case 4:	case 5:
				case 6: document.getElementById("TitleList1").innerHTML = "(add "+ (7-list4size) +" more)";
				break;
				case 7: document.getElementById("TitleList1").innerHTML = "(completed)";
				break;
				default: document.getElementById("TitleList1").innerHTML = "(remove " + (list4size-7) + " more)";
			}	
	
		//LIST +2
			var list5 = $("#list2 li").map(function() { return $(this).data("itemid"); }).get();
			$("input[name=list5SortOrder]").val(list5.join("', '2'), ('<?php echo $userID;?>', '"));
			var list5size = list5.length; //6
			
			switch (list5size) {
				case 0:	case 1:	case 2:	case 3:	case 4:
				case 5: document.getElementById("TitleList2").innerHTML = "(add "+ (6-list5size) +" more)";
				break;
				case 6: document.getElementById("TitleList2").innerHTML = "(completed)";
				break;
				default: document.getElementById("TitleList2").innerHTML = "(remove " + (list5size-6) + " more)";
			}	
			
		//LIST +3
			var list6 = $("#list3 li").map(function() { return $(this).data("itemid"); }).get();
			$("input[name=list6SortOrder]").val(list6.join("', '3'), ('<?php echo $userID;?>', '"));
			var list6size = list6.length; //5
			
			switch (list6size) {
				case 0:	case 1:	case 2:	case 3:	
				case 4: document.getElementById("TitleList3").innerHTML = "(add "+ (5-list6size) +" more)";
				break;
				case 5: document.getElementById("TitleList3").innerHTML = "(completed)";
				break;
				default: document.getElementById("TitleList3").innerHTML = "(remove " + (list6size-5) + " more)";
			}	
			
			
			//sumbit button
			if ( list0size==5 && list1size==6 && list2size==7 && list3size==7 && list4size==7 && list5size==6 && list6size==5) {
			document.getElementById("sumbitform").style.display = "block"; } else {
			document.getElementById("sumbitform").style.display = "none";
			};
		};
		



	</script>

	<div style="clear:both;"></div>


</body>
</html>


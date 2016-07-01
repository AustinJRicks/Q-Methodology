<html>
<head>
  <title>Step1: User Information</title>
  
 
  
</head>
<body>


<form action="step2.php" method="post" class="basic-grey">
    <h1>User Information
        <span>Please fill all the texts in the fields</span>
    </h1>
    <label>
        <span>What is your name?</span></br>
        <input type="text" name="name" placeholder="Your full name" />
    </label>
   
    <label>
        <span>What is current position?</span></br>
        <input type="text" name="position" placeholder="Your position" />
    </label>
	
		    <label>
        <span>What company do you work for?</span></br>
        <input type="text" name="company" placeholder="Your company" />
    </label>	
   
    <label>
        <span>How long have you worked in your current field?</span></br>
        <input type="text" name="workYears" placeholder="Years of experience" />
    </label>

    <label>
        <span>What would you consider your fields of expertises related to your work?</span></br>
        <input type="text" name="keywords" placeholder="Areas of expertises" />
    </label>
	

        <center><input type="submit" name="Step1" class="button" value="Go to next page" /></center>


</form>

</body>
</html> 

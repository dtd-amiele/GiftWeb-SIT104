<!DOCTYPE html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>FEEDBACK</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
	<!-- Use <div> to devide page to separate sections-->
  <!--Set the wrapper so the webpage is in the center of browser-->
  <div id="wrapper" style="width:900px; margin:auto; margin-top:20px; margin-bottom:20px" >
   <!--Edit Header -->
	 <div id="header" style=" margin-bottom:30px; margin-top:30px;">
   
    	<p style="color: #5D5048; text-align:center; font-size:40px; font-weight:bold; font-style:italic "> ~~~ AMIE'S HOUSE ~~~ 
        <br />
        BRING RETRO BACK TO YOUR HOME</p>
   
  </div>
  <!-- Edit Navigation-->
  <!--<ul> <li> Use unorderlist (set the list inline) to create the Navigaton -->

	<div id="nav"  style="  padding-top: 10px;padding-bottom: 10px;font-size:20px; border-radius:7px; border-color: #C0B7A6; border-bottom-style: double; border-top-style:double;  ">
    <ul style=" margin-bottom: 5px; margin-top:5px;;margin-left: 20px;">
      <li style="display:inline; margin-top:5px; margin-left:210px; margin-right:20px; margin-bottom:5px;;padding-top: 10px;padding-right: 5px; padding-bottom: 10px;padding-left: 5px"><a  class="navigation" href="HOME.html" style=" color:#867E6A; text-decoration: none;" >HOME</a> </li>
      <li style="display:inline; margin-top:5px; margin-left:20px; margin-right:20px; margin-bottom:5px;padding-top: 10px;padding-right: 5px; padding-bottom: 10px;padding-left: 5px"><a  class="navigation" href="GIFT.html" style="color:#867E6A; text-decoration: none">GIFT</a></li>
      <li style="display:inline; margin-top:5px; margin-left:20px; margin-right:20px; margin-bottom:5px;padding-top: 10px;padding-right: 5px; padding-bottom: 10px;padding-left: 5px"><a  class="navigation" href="SEARCH.html" style="color:#867E6A; text-decoration: none">SEARCH</a></li>
      <li class="present" style="display:inline; margin-top:5px; margin-left:20px; margin-right:20px; margin-bottom:5px;padding-top: 10px;padding-right: 5px; padding-bottom: 10px;padding-left: 5px"><a  class="navigation" href="CONTACT.html" style=" color:#867E6A; text-decoration: none">CONTACT</a></li>
    </ul>
	</div>
  
  <!--Edit the content-->
	<div id="content" style=" width:700px; margin:auto; min-height:590px;" >
  	<!-- use <h1> to edit the heading title -->
	<h1 style="text-align:center; color:#5E544A; margin-top:20px; margin-bottom:20px">FEEDBACK</h1>
	<p>Thank you for contact with us. Your contact has been saved</p>
	<?php
		echo "<b>Your name:</b> $firstname, $lastname";
		echo "<br>";
		echo "<b>Your mobile:</b> $phonenum";
		echo "<br>";
		echo "<b>Your email:</b> $email";
		echo "<br>";
		echo "<b>Your address:</b> $street, $SC , $country";
		echo "<br>";
		echo "<b>Your postcode:</b> $postcode";
		echo "<br>";
		echo "<b>You ordered items:</b> $gift";
		echo "<br>";
		echo "<b>Other request:</b> $comments";
		echo "<br>";
		echo "<b>You want to receive our promotion and new items through:</b> $message";
		echo "<br>";
		echo "Our store will contact to you as soon as possible";
		$connect = ocilogon('leduo','deakin','SSID');
		$sql="insert into contact values ('$firstname','$lastname','$phonenum','$email','$street','$SC','$country','$postcode','$gift','$comments','$message')";
		$stmt = OCIPARSE($connect, $sql);
		ociexecute($stmt);	

				
	?>
	
	</div>
  
   <div id="footer"  style="border-color: #C0B7A6; border-top-style:double; margin-top: 15px; border-radius:7px;">
  <p style="padding-top: 15px;padding-right: 10px;padding-bottom: 15px;padding-left: 35px; color:#867E6A">©Deakin College. This web page has been developed as a student assignment for the unit SIT104: Introduction to Web Development.</p>
  </div>
</div>
</body>
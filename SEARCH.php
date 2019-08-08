<!DOCTYPE html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>RESULT</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body >
  <!--Set the wrapper so the webpage is in the center of browser-->
  <div id="wrapper" style="width:900px; margin:auto; margin-top:20px; margin-bottom:20px" >
   <!--Edit Header -->
  <div id="header" style=" margin-bottom:30px; margin-top:30px;">
   
    	<p style="color: #5D5048; text-align:center; font-size:40px; font-weight:bold; font-style:italic "> ~~~ AMIE'S HOUSE ~~~ 
        <br />
        BRING RETRO BACK TO YOUR HOME</p>
   
  </div>
  <!-- Edit Navigation-->
  <!--Use unorderlist (set the list inline) to create the Navigaton -->
    <!--Use <a> tag to make link to other pages-->
  <div id="nav"  style="  padding-top: 10px;padding-bottom: 10px;font-size:20px; border-radius:7px; border-color: #C0B7A6; border-bottom-style: double; border-top-style:double;  ">
    <ul style=" margin-bottom: 5px; margin-top:5px;;margin-left: 20px;">
      <li style="display:inline; margin-top:5px; margin-left:210px; margin-right:20px; margin-bottom:5px;;padding-top: 10px;padding-right: 5px; padding-bottom: 10px;padding-left: 5px"><a class="navigation" href="HOME.html" style=" color:#867E6A; text-decoration: none;" >HOME</a> </li>
      <li  style="display:inline; margin-top:5px; margin-left:20px; margin-right:20px; margin-bottom:5px;padding-top: 15px;padding-right: 5px; padding-bottom: 10px;padding-left: 5px" ><a class="navigation" href="GIFT.html" style="color:#867E6A; text-decoration: none" >GIFT</a></li>
      <li class="present" style="display:inline; margin-top:5px; margin-left:20px; margin-right:20px; margin-bottom:5px;padding-top: 10px;padding-right: 5px; padding-bottom: 10px;padding-left: 5px"><a class="navigation" href="SEARCH.html" style="color:#867E6A; text-decoration: none">SEARCH</a></li>
      <li style="display:inline; margin-top:5px; margin-left:20px; margin-right:20px; margin-bottom:5px;padding-top: 10px;padding-right: 5px; padding-bottom: 10px;padding-left: 5px"><a class="navigation" href="CONTACT.html" style=" color:#867E6A; text-decoration: none">CONTACT</a></li>
    </ul>
  </div>
  
	<!--Edit the content-->
  <div id="content" style=" width:900px; margin:auto;  min-height:590px;" >	
	<h1 style="text-align:center; color:#5E544A; margin-top:20px; margin-bottom:5px">RESULT</h1>
  <?php
		//echo $price;
		//echo "<br>";
		//echo $item;
		//echo "<br>";
		//echo $material;
		switch ($price){
			case "2":
				if ($item=="all" && $material=="all" ){
					$sql="select * from gift WHERE price<50";
				}
				elseif ($item!="all" && $material=="all"){
					$sql="select * from gift WHERE (item LIKE '%$item%' AND price<50)";
				}
				elseif ($item=="all" && $material!="all") {
					$sql="select * from gift WHERE (material LIKE '%$material%' AND price<50) ";
				}
				else {
					$sql="select * from gift WHERE (item LIKE '%$item%' AND material LIKE '%$material%' AND price<50) ";
				}
				break;	
			case "3":
				if ($item=="all" && $material=="all" ){
					$sql="select * from gift WHERE price>=50 AND price<100";
				}
				elseif ($item!="all" && $material=="all"){
					$sql="select * from gift WHERE (item LIKE '%$item%' AND price>=50 AND price<100)";
				}
				elseif ($item=="all" && $material!="all") {
					$sql="select * from gift WHERE (material LIKE '%$material%' AND price>=50 AND price<100) ";
				}
				else {
					$sql="select * from gift WHERE (item LIKE '%$item%' AND material LIKE '%$material%' AND price>=50 AND price<100) ";
				}
				break;	
			case "4":
				if ($item=="all" && $material=="all" ){
					$sql="select * from gift WHERE price>100";
				}
				elseif ($item!="all" && $material=="all"){
					$sql="select * from gift WHERE (item LIKE '%$item%' AND price>100)";
				}
				elseif ($item=="all" && $material!="all") {
					$sql="select * from gift WHERE (material LIKE '%$material%' AND price>100) ";
				}
				else {
					$sql="select * from gift WHERE (item LIKE '%$item%' AND material LIKE '%$material%' AND price>100) ";
				}
				break;	
			default:

				if ($item=="all" && $material=="all" ){
					$sql="select * from gift";
				}
				elseif ($item=="all"){
				$sql="select * from gift WHERE material LIKE '%$material%'";
				}
				elseif ($material=="all"){
					$sql="select * from gift WHERE item LIKE '%$item%'";
				}
				else {
					$sql="select * from gift WHERE (material LIKE '%$material%' AND item LIKE '%$item%') ";
				}
				break;
		}
		
		
		
		$countresult=0;
	
		$connect = ocilogon('leduo','deakin','SSID');
		$stmt = OCIPARSE($connect, $sql);
		ociexecute($stmt);
		echo "<br>";
		echo "<table style=' width:800px; border: double ;border-color:#D5C4B3; margin:auto'>";
		echo "<tr><th style='font-size:24px; border: double ;border-color:#D5C4B3; text-align:center; vertical-align:middle;'>Product Name</th>
		<th style='font-size:24px;border: double ;border-color:#D5C4B3; text-align:center; vertical-align:middle;'>Price</th>
		<th style='font-size:24px;border: double ;border-color:#D5C4B3; text-align:center; vertical-align:middle;'>Material</th></tr>";
		while (ocifetch($stmt)){
			$countresult= $countresult+1;
			echo"<tr><td style='border: double ;border-color:#D5C4B3; text-align:center; vertical-align:middle;'>";
			echo ociresult($stmt, 1);// 1: item
			$link=ociresult($stmt, 4); //attach link to GIFT.html
			echo "<br>";
			echo "<a href=GIFT.html#$link>Detail</a>";
			echo "</td><td style='border: double ;border-color:#D5C4B3; text-align:center; vertical-align:middle;'>";
			//echo " ";
			echo ociresult($stmt, 2);// 2:price
			echo "</td><td style='border: double ;border-color:#D5C4B3; text-align:center; vertical-align:middle;'>";
			echo ociresult($stmt, 3);// 3:material
			echo "</td></tr>";
			//echo "<br>";

		
		}
		echo "</table>";
		if ($countresult!=0) {
		echo"<p style=margin-top:20px; margin-left:30px>";
		echo "We found $countresult gifts for this search";
		}
		else
		{
			echo "Sorry we don't have any item suitable";
		}
		echo"</p>";
		
  ?>
  <!-- use <h1> to edit headig title -->
    <!-- use table to display to gifts-->
    <!-- <dl> <dt> <dd>use description list for the descriptions of the gifts -->
     <!-- use <a> to make link -->
   
    </table>
	<p style="font-weight:bold; padding-top:30px; padding-bottom:30px; font-size:20px ">
	<a class="top" href="SEARCH.html" style="color:#94887C; text-decoration:none" >Back to search form</a>	
	</p>
	

</div>
  <!--Edit the footer-->
  <div id="footer"  style="border-color: #C0B7A6; border-top-style:double; margin-top: 15px; border-radius:7px;">
  <p style="padding-top: 15px;padding-right: 10px;padding-bottom: 15px;padding-left: 35px; color:#867E6A">©Deakin College. This web page has been developed as a student assignment for the unit SIT104: Introduction to Web Development.</p>
  </div>
</div>
</body>
</html>

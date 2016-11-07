<?php

	 // starting the session
	session_start();
?>



<html>
<head>
<title>Process</title>
<link href="images/favicon.ico" rel="icon" type="image/x-icon" />
<link rel="stylesheet" type="text/css" href="css/theme.css">
<style>

table {
  width:500px;
  margin: 10px auto;
  height:auto;
  width:auto;
 
	background-color:white;

}


#list, .show {display: none; }
.hide:focus + .show {display: inline; }
.hide:focus { display: none; }
.hide:focus ~ #list { display:block; }

img
{
	width:150px;
	height:150px;
}


ul {
  list-style-type: none;
}
</style>
</head>

<body>


<?php
	
	include('functions.php');
	$dbConn = connectToDatabase();
	

	$songs = $_SESSION['shoppingCart'];
	if(count($songs) == 0)
		echo "<center><h1>Nothing selected</h1></center>";
	
	else
	{
		
		$placeholders  = implode(",",$songs);
	
		$sql = "SELECT Songs.name,
				Songs.artist,
				Genres.genre,
				Catalog.price,
				Catalog.songID,
				Catalog.pictureLink,
				Songs.length
				FROM Songs
				INNER JOIN Genres ON Genres.genreID = Songs.genreID
				INNER JOIN Catalog ON Catalog.songID = Songs.songID
				WHERE Catalog.songID IN ($placeholders)";

		
		echo "<center><h3>Here is your shopping cart</h3></center>";
		$total = displayShoppingCart($dbConn,$sql);
		echo "<center><h3>Total:$$total</h3></center>";
	
	}
?>

</div>
</body>

</html>

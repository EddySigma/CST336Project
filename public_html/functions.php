<?php
// LINK TO GITHUB: https://github.com/EddySigma/ShoppingCarProject
// LINK TO TRELLO: https://trello.com/b/ISB224wM/team-project
// LINK TO SCHEME, STORY, AND MOCKUP: https://docs.google.com/document/d/1bLvSXYz2f04fX__txUaq6gRwudEKtYop4M7HvVejhRk/edit?usp=sharing



// Used to connect to database.
// Edit as needed
function connectToDatabase()
{
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbName = "MusicStore";

	$dbConn = new PDO("mysql:host=$servername;dbname=$dbName",
						$username, $password);

	// set the PDO error mode to exception
	$dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	return $dbConn;
}

function displayData($dbConn,$sql)
{

	$stmt = $dbConn -> prepare ($sql);
	$stmt -> execute ();

	echo "<table border=1px;>";

	if( !($stmt -> fetch()) )
		echo "<center><h1>Nothing found</h1></center>";

	else
	{
		// need a work around for this
		$stmt = $dbConn -> prepare ($sql);
		$stmt -> execute ();
		printTable($stmt);
		//otherFunction($stmt);
	}
}

function displayShoppingCart($dbConn,$sql)
{

	$stmt = $dbConn -> prepare ($sql);
	$stmt -> execute ();
	echo "<div class='inner-table'>";
	//    <div class="inner_table">

	echo "<table>";

echo "
<div class='wrap'>
    <table class='head'>
		<tr> <td style='width:400px'><center>Song</center></td>
		
		
		<td style='width:420px'><center>Artist</center></td>
		
		<td>Price</td>
		</tr>
        
		
    </table>
                <div class='inner_table'>

        <table>

";

	$i = 1;
	$total = 0;
	while ( $row = $stmt -> fetch() )
	{
		$name =  $row['name'];
		$artist = $row['artist'];
		$genre = $row['genre'];
		$price = $row['price'];
		$songID = $row['songID'];
		$picLink = $row['pictureLink'];
		$length = $row['length'];

		echo "<tr>

		<td>

		<div class='songInfo'>
		<label class='collapse' for='_$i'>$name </label>
		<input id='_$i' type='checkbox'>
		<div class='detailedInfo'>
			<center><img src='$picLink'></center>
			&emsp;Length:&nbsp;$length&nbsp; <br />
			&emsp;Genre:&nbsp;$genre <br />

		</div>
		</div>
		</td>

		<td><center>$artist</center></td>
		<td>$$price</td>
		</tr>";
		$i++;
		$total = $total + floatval($price);
	}

	echo "   </table>
    </div>
</div>";

return $total;
}

function printTable($stmt)
{
			echo "<div class='songDisplay'>";

	echo "<div class='inner-table'>";
	//    <div class="inner_table">

	echo "<table>";

echo "
<div class='wrap'>
    <table class='head'>
		<tr> <td style='width:283px'><center>Song</center></td> <td
		style='width:296px'><center>Artist</center></td> <td
		style='width:262px'><center>Add to Shopping Cart</center></td>
        </tr>
    </table>
                <div class='inner_table'>

        <table>

";

	$i = 1;
	while ( $row = $stmt -> fetch() )
	{
		$name =  $row['name'];
		$artist = $row['artist'];
		$genre = $row['genre'];
		$price = $row['price'];
		$songID = $row['songID'];
		$picLink = $row['pictureLink'];
		$length = $row['length'];

		echo "<tr>

		<td>

		<div class='songInfo'>
		<label class='collapse' for='_$i'>$name </label>
		<input id='_$i' type='checkbox'>
		<div class='detailedInfo'>
			<center><img src='$picLink'></center>
			&emsp;Length:&nbsp;$length&nbsp; <br />
			&emsp;Genre:&nbsp;$genre <br />
			&emsp;Price:&nbsp;$$price <br />

		</div>
		</div>
		</td>

		<td><center>$artist</center></td>
		<td><center><input type='checkbox' name='songs[]' value=$songID><center></td>
		</tr>";
		$i++;
	}

	echo "   </table>
    </div>
</div></div>";

}

// functio otherFunction($stmt) {
// 	while ( $row = $stmt -> fetch() )
// 	{
// 		$name =  $row['name'];
// 		$artist = $row['artist'];
// 		$genre = $row['genre'];
// 		$price = $row['price'];
// 		$songID = $row['songID'];
// 		$picLink = $row['pictureLink'];
// 		$length = $row['length'];

// 		echo "<div class='songContainer'>";

// 		echo "</div>";
// 	}
//}

function printHeading()
{
	return "<th>Song</th>
		    <th>Artist</th>
		    "//<th>Genre</th>
		    //<th>Price</th>
		    ."<th>Add to shopping cart</th>";
}
?>



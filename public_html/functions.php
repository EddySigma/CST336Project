<?php

// Used to connect to database.
// Edit as needed
function connectToDatabase()
{
	$servername = "localhost";
	$username = "vega3229";
	$password = "02b85dfa63430d3";
	$dbName = "vega3229";

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

	echo "<table border=2px;>";

	if( !($stmt -> fetch()) )
		echo "<center><h1>Nothing found</h1></center>";

	else
	{

		// need a work around for this
		$stmt = $dbConn -> prepare ($sql);
		$stmt -> execute ();

		printTable($stmt);
	}
}

function displayShoppingCart($dbConn,$sql)
{

	$stmt = $dbConn -> prepare ($sql);
	$stmt -> execute ();

	echo "<table border=2px;>";

	echo "<th>Song</th>
		    <th>Artist</th>
		    <th>Genre</th>
		    <th>Price</th>";

	if( !($stmt -> fetch()) )
		echo "<center><h1>Nothing found</h1></center>";

	else
	{

	// need a work around for this
	$stmt = $dbConn -> prepare ($sql);
	$stmt -> execute ();
	$total = 0;
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
		$total += floatval($price);
		echo "<tr>
		

		<td>


			
			<a id='showhide$i' href>$name</a>
			<div id='trace-form$i' class='hidden'>
				<center><img src='$picLink'></center>
				Length: $length
			</div>
			<script>
			$(\"#showhide$i\").click(function (event) {
			    event.preventDefault();
			    $(\"#trace-form$i\").toggle();
			});
			</script>

		</td>

		<td>$artist</td>
		<td>$genre</td>
		<td>$$price</td>
		</tr>";
		
		$i++;
	}

	echo "</table>";

	}

	return $total;
}

function printTable($stmt)
{

	echo "<table border=2px;>";

	echo printHeading();
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
		


			
			<a id='showhide$i' href>$name</a>
			<div id='trace-form$i' class='hidden'>
				<center><img src='$picLink'></center>
				Length: $length
			</div>
			<script>
			$(\"#showhide$i\").click(function (event) {
			    event.preventDefault();
			    $(\"#trace-form$i\").toggle();
			});
			</script>
		

		</td>

		<td>$artist</td>
		<td>$genre</td>
		<td>$$price</td>
		<td><input type='checkbox' name='songs[]' value=$songID></td>
		</tr>";
		$i++;
	}

	echo "</table>";

}

function printHeading()
{
	return "<th>Song</th>
		    <th>Artist</th>
		    <th>Genre</th>
		    <th>Price</th>
		    <th>Add to shopping cart</th>";
}
?>

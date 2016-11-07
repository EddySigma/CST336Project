

<?php


// Used to connect to database.
// Edit as needed
function connectToDatabase()
{
	
	// edit this as needed
	
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
		<div>

		<td>
		<a href='#' class='hide'>$name</a>
		<a href='#' class='show'>$name</a>
		<ul id='list'>
		
	
    <li><center><img src='$picLink'></center></li>
    <li>Length: $length </li>

		</ul>

		</div>
		
		</td>
	
		
		<td>$artist</td>
		<td>$genre</td>
		<td>$$price</td>
		</tr>";
	}
	


	echo "</table></div>";
	   
	}
	
	return $total;
}

function printTable($stmt)
{

	echo "<table border=2px;>";
	
	echo printHeading();
	
	
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
		<div>

		<td>
		<a href='#' class='hide'>$name</a>
		<a href='#' class='show'>$name</a>
		<ul id='list'>
		
	
    <li><center><img src='$picLink'></center></li>
    <li>Length: $length </li>

		</ul>

		</div>
		
		</td>
	
		
		<td>$artist</td>
		<td>$genre</td>
		<td>$$price</td>
		<td><input type='checkbox' name='songs[]' value=$songID></td>
		</tr>";
	}

	echo "</table></div>";
	   

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



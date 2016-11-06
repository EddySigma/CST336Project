<html>
<title>Music Store</title>
<style>
	img {
		width: 100px;
		height: 100px;
	}
	
	table {
		width: 500px;
		margin: 10px auto;
		height: auto;
		width: auto;
		background-color: white;
	}
	
	.centerIt {
		text-align: center;
	}
	
	.myButton {
		text-align: center;
	}
	
	body {
		background-image: url("http://media.gettyimages.com/videos/grunge-music-background-blue-video-id473008825?s=640x640");
	}
	
	.heading {
		text-align: center;
		background-color: green;
	}
	
	.formBox {
		text-align: center;
		background-color: white;
	}
</style>

<?php


	$servername = "localhost";
	$username = "root";
	$password = "";
	
	// dbName = songDB
	
	$dbConn = new PDO("mysql:host=$servername;dbname=Group_Project", $username, $password);
	// set the PDO error mode to exception
	$dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	    if (empty($_GET['sort']))   
        $sort = "order by artistName";
    else if($_GET['sort'] == 'song'){
        $sort = "order by songName";
    }
    

?>
</head>

<body>
	<div class='heading'>
		<h1>Top Singles - Shopping Cart</h1>
	</div>
	<div class="centerIt">
		<form>
			<div>

				Search Name: <input type="text" name="s_name" value=""><br> 
				Search Artist: <input type="text" name="LastName" value=" "><br>
				Max Length (in minutes): <input type="text" name="LastName" value=""><br>
				<input type="submit" value="Submit">
			</div>
			
		</form>				
		<table border=2px>
			<thead>
				<tr></tr>
					<th>Album Art</th>
					<th><a href=index.php?sort=artist>Artist</a></th>
					<th><a href=index.php?sort=song>Song Name</a></th>
					<th>Price</th>
					<th>Add to Shopping Cart</th>
			</thead>
			<tbody>
			<?php

				$sql = "SELECT albumLink, artistName, songName 
				FROM songs " . $sort;
				
				$stmt = $dbConn -> prepare ($sql);
				$stmt -> execute ();
	
				while ($row = $stmt -> fetch()) {
			
					echo "<tr>";
					echo "<td><img src='" . $row['albumLink']. "'></td>";
					echo "<td>" . $row['artistName'] . "</td>";
					echo "<td>" . $row['songName'] . "</td>";
					echo "<td>$" . rand(1,3) . ".99</td>"; 
					echo "<td><input type='button' value='Add to Shopping Cart'></td>";
				}

			?>
			</tbody>
		</table>
	</div>

</body>

</html>

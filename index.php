

<html>
<title>Music Store</title>
<style>
img {
width:100px;
height:100px;

}
table {
  width:500px;
  margin: 10px auto;
  height:auto;
  width:auto;
 
	background-color:white;

}


.centerIt

{
	text-align:center;

}

.myButton {
	text-align:center;
	
}


 body{

    background-image: url("http://media.gettyimages.com/videos/grunge-music-background-blue-video-id473008825?s=640x640");

   }
   
 .heading
 {
	 text-align:center;
	 background-color:green;
 }

.formBox 
{
	text-align:center;
	background-color:white;
}

</style>

</head>

<body>
<div class='heading'><h1>Top Singles - Shopping Cart</h1></div>
<div class="centerIt"><form><table border=1px;>

<div class='formBox'>

Search Name: <input type="text" name="FirstName" value=""><br>
Search Artist: <input type="text" name="LastName" value=" "><br>





Max Length (in minutes): <input type="text" name="LastName" value=""><br>
<input type="submit" value="Submit">
</div>	

<?php


	$servername = "localhost";
	$username = "root";
	$password = "yourPassWordHere";
	
	
	// dbName = songDB
	
	$dbConn = new PDO("mysql:host=$servername;dbname=songDB", $username, $password);
	// set the PDO error mode to exception
	$dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "SELECT * FROM songs ORDER BY artistName";
	$stmt = $dbConn -> prepare ($sql);
	$stmt -> execute ();
	


	    echo "<table border=2px;>";
	    $i = 1;
	    
		$labels = array('Album Art','Artist','Song Name','Genre','Length','Price','Add to Shopping Cart');
		
		for($i = 0; $i < count($labels); $i++)
			echo "<th>".$labels[$i]."</th>";

        while ($row = $stmt -> fetch()) {
			
			echo "<tr>";
			
			if($i % count($labels) == 0)
			{
				echo "</tr><tr>";
			}
			//` (`albumLink` `artistName`  `songName`  `genre`  `songLength`  );
			//var_dump($row);
			echo "<td><img src='". $row['albumLink']. "'></td>";
			echo "<td>". $row['artistName'] . "</td>";
			echo "<td>".$row['songName']."</td>";
			echo "<td>".$row['genre']."</td>";
			echo "<td>".$row['songLength']."</td>";
			echo "<td>$".rand(1,3). ".99</td>";
			
			$i++;
			echo "<td><input type='checkbox'></td>";
		}
       echo "</table>";

/*

for i in range(40):
    print('<tr>')

    if((i + 1) % 3 == 0):
        print('</tr><tr>')

    openAndClose('<img src="' + pictureLinks[i] + '">')
    openAndClose(artists[i])
    openAndClose(songNames[i])
    openAndClose(genres[randint(0,len(genres) - 1)])
    openAndClose(str(randint(2,5)) + ":" + str(randint(10,59)))
    openAndClose('<input type="checkbox">')


print('</table></form></div></html>')
*/


?>
<div class='myButton'><button type="submit" form="nameform" value="Submit"  style="height:80px;width:180px">Buy Now </button></div>
</form>
</body>

</html>



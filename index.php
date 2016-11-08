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
	.box {
   		position: relative;
    	
	}
	
	.box .text {
    visibility: hidden;
    background-color: black;
    color: #fff;
    text-align: center;
    padding: 5px 0;
    border-radius: 6px;
 
    position: absolute;
    z-index: 1;
    width: 120px;
    top: 100%;
    left: 50%; 
    margin-left: -60px;
	}
	
	.box:hover .text{
	visibility: visible;	
	}

</style>

<?php

	session_start();

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

<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

</head>

<body>
	<div class="navbar-header">
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li <?php echo $page_title=="Products" ? "class='active'" : ""; ?> >
                    <a href="index.php">Products</a>
                </li>
                <li <?php echo $page_title=="Cart" ? "class='active'" : ""; ?> >
                    <a href="cart.php">
                        <?php
                        // count products in cart
                        $cart_count=count($_SESSION['cart_items']);
                        ?>
                        Cart <span class="badge" id="comparison-count"><?php echo $cart_count; ?></span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
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

				$sql = "SELECT * 
				FROM songs " . $sort;
				
				$stmt = $dbConn -> prepare ($sql);
				$stmt -> execute ();
	
				while ($row = $stmt -> fetch()) {
			
					echo "<tr>";
					echo "<td><img src='" . $row['albumLink']. "'></td>";
					echo "<td>" . $row['artistName'] . "</td>";
					echo "<td class='box'>" . $row['songName'] . "<span class='text'> <div>genre: " . $row['genre'] . "</div><div>length: " . $row['songLength'] . "</div></td>";
					echo "<td>$" . rand(1,3) . ".99</td>"; 
					echo "<td><input type='button' value='Add to Shopping Cart'></td>";
				}

			?>
			</tbody>
		</table>
	</div>

</body>

</html>

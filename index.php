<?php
	session_start();
	include ('./account_management/connect.php');
	include('./data_management/connectdb.php');
	include ('./populate/populate.php');
?>

<html>
<head>
	<link href='//fonts.googleapis.com/css?family=Lato' rel='stylesheet'>
	<meta charset="UTF-8">
	<title>TechSwag - 
		<?php
			if (isset($_GET['cat'])) echo $_GET['cat'];
			else echo "Home"; 
		?>					
	</title>
	<link rel="stylesheet" type="text/css" href="index.css">
</head>

<body>

<div class="general">


	<div class="topbar">
		<div class="connect">
			<?php login_main()?>
			<?php connect_main()?>
		</div>
		<div class="containertop">
			<form method="GET" action=".">
				<input type="submit" class="searchsubm" name="submitsearch" value="Search">
				<input type="text" class="searchtext" name="searchtext" placeholder="Search for item name...">
			</form>
			<form method="GET" action=".">
				<input type="submit" class="logocart" name="cart" value="My Cart">
			</form>
		</div>
		<form method="GET" action=".">
			<input type="submit" class="logotech" name="return" value="TechSwag"/>
		</form>
	</div>

	<div class="leftbar">
		<form method="GET" action=".">
			<br/>
			<input type="submit" class="catlist" name="cat" value="Home" />
			<input type="submit" class="catlist" name="cat" value="Info" />
			<?php
				$query = 'SELECT * FROM admin WHERE login="'.$_SESSION['logged_in_user'].'"';
				if (isset($_SESSION['logged_in_user']) && mysqli_fetch_row(mysqli_query($link, $query)) != NULL)
					echo '<input type="submit" class="catlist" name="cat" value="Admin" />';
			?>
			<input type="submit" class="catlist" name="cat" value="Subject" />
			<hr/>
			<input type="submit" class="catlist" name="cat" value="All Products" />
			<hr/>
			<?php populate_catlist()?>
			<hr/>
			<input type="submit" class="catlist" name="cat" value="Uncategorized" />
			<hr/>
		</form>
		

	</div>

	<div class="mainpage">
		<?php
			populate_main();
		?>
		<br/>
	</div>

</div>

</body>
</html>

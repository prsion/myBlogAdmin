<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">

	<title>My blog </title>
</head>
<body>


<a href="Admin/auth.php">Admin</a>


<?php
session_start();
require_once 'Dbh.php' ;
$dbh= new Dbh;
?>


<div class="wrapper">
		<h1>My blog</h1>

			<div class="left">

						<?php
							echo '<pre>';
								$sql='SELECT * FROM articles';
								$stmt=$dbh->query($sql);
								foreach ($stmt as $key=>$val)
								echo $val['publicationDate']."<br><br><br>";
								echo '</pre>';
						?>

			</div>




				<div class="right">
						<?php
							$sql='SELECT * FROM articles';
							$stmt=$dbh->query($sql);
							foreach ($stmt as $key=>$val){
							echo $val['title'].'<br>';
							echo"<a href='sum.php/?id=".($val['id'])."'".">".($val['summary'])."<br><br><br>"."</a>";
							
							}
						?>
				</div>

</div>


</body>
</html>
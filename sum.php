<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css"> 	

	<title>Full article</title>
</head>
<body>

<?php 
session_start();
$id=$_GET['id'];
//print_r($id);
 ?>

 <h1>Full article <?php print_r($id);?> </h1>
 <div class="sum">
 
<?php 
			$id=$_GET['id'];
			print_r($id);
			include_once 'Dbh.php' ;
			$dbh= new Dbh;

			
		$sql='SELECT * FROM articles WHERE id='.$id;
		$stmt = $dbh->query($sql);
		foreach ($stmt as $key=>$val);
		print_r($val['content']);
		# alternative path = change line above
		//$sql='SELECT * FROM articles WHERE id=:id;
		//$stmt = $dbh->prepare($sql);
		//$stmt->execute(['id' => $id]);
		

?>

</div>
</body>
</html>
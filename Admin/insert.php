<?php 
session_start();
require_once '../Dbh.php';
$dbh=new Dbh;
$id=$_GET['id'];
print_r($id);

/** if yes   */
//if(isset($_POST['id']))
//{   
		
		$taValues = array(
			'id' => ''.$id,
			'publicationDate' => '',
			'title' => 'title'.$id,
			'summary' => 'newsummary'.$id,
			'content' => 'content'.$id,

			); // array

		$sql="INSERT INTO articles(id, publicationDate, title, summary, content)VALUES(:id, :publicationDate, :title, :summary, :content)";
		$stmt = $dbh->insert($sql, $taValues);
	

var_dump($stmt);

//}




?>

<h1>Add new post</h1>

<form method="POST" actions="insert.php">

			<textarea name="data" rows="2" cols="25">
			
			</textarea> <br><br>


			<textarea name="title" rows="2" cols="25">
			
			</textarea><br><br>



			<textarea  name="summary" rows="2" cols="40">
			
			</textarea><br><br>


			<textarea name="content" maxlength="10000" form="content" rows="20" cols="40">
			
			</textarea>
			<br/> <br/>
			<input type="submit" name="button" value="Add new post" style="cursor:pointer"> <br/>

	</form>

	<br><br>
	<br>
	<a href="../../index.php">на главную</a><br>
	<a href="../admin.php">на админку выбрать статью </a>
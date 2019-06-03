<?php
session_start();
require_once '../Dbh.php';
$dbh=new Dbh;
$id=$_GET['id'];
$i=intval($id);

echo "id ==".$id.'<br>';


$title;
$summary;
$content;
$publicationDate;


		$sql= 'SELECT * FROM articles WHERE id='.$i;
		$stmt=$dbh->query($sql);
		//echo "I=".$i.'<br>';
		foreach ($stmt as $key=>$val){
			
			$title=$val['title'];
			$summary=$val['summary'];
			$content=$val['content'];
			$publicationDate=$val['publicationDate'];
		
		}
?>


<?php 

if(isset($_POST['delete'])) {
	echo 'button was pressed=article is deleted';
	$sql= 'DELETE FROM articles WHERE id ='.$i;
	$stmt=$dbh->query($sql);
	//$i=$i+1;

}
else {echo 'button not pressed';
}

?>



<h1> Hello   i`m editing page</h1>


<form method="POST" actions="action" name="edit">

	<textarea name="data" rows="2" cols="25">
	<?php print_r($publicationDate);	 ?>	
	</textarea> <br><br>


	<textarea name="title" rows="2" cols="25">
		<?php print_r($title);	 ?>	
	</textarea><br><br>



	<textarea  name="summary" rows="2" cols="40">
		<?php print_r($summary); ?>
	</textarea><br><br>


	<textarea name="content" maxlength="10000" form="content" rows="20" cols="40">
	<?php print_r($content); ?>	
	</textarea><br/><br/>
	
		<input type="submit" name="delete" value="Delete this Post">

	</form>





	<br><br>
	<br>


	<a href="../../index.php">на главную</a><br>
	<a href="../admin.php">на админку выбрать статью </a>

<?php
session_start();
require_once '../Dbh.php';
$dbh=new Dbh;
$id=$_GET['id'];
$id=intval($id);

echo "id ==".$id.'<br>';


$title;
$summary;
$content;
$publicationDate;


		$sql= 'SELECT * FROM articles WHERE id='.$id;
		$stmt=$dbh->query($sql);
		foreach ($stmt as $key=>$val){
			$id=$val['id'];
			$title=$val['title'];
			$summary=$val['summary'];
			$content=$val['content'];
			$publicationDate=$val['publicationDate'];
		
		}
?>


<?php 
/**
 * Delete record
 */
if(isset($_POST['delete'])) {
	echo 'Delete was pressed=article is deleted'.'<br>';
	$sql= 'DELETE FROM articles WHERE id ='.$id;
	$stmt=$dbh->query($sql);
	//$i=$i+1;

}
else {echo 'Delete not pressed';
}

 /**
	* Editing records and update
	*/


if(isset($_POST['update'])) {
	echo '<br>'.'Data was saved';

$publicationDate=trim($_POST['data']);
$title=trim($_POST['title']);
$summary=trim($_POST['summary']);
$content=trim($_POST['content']);

$sql ='UPDATE articles SET publicationDate=:publicationDate, title=:title, summary=:summary, content=:content WHERE id=:id';
$stmt=$dbh->prepare($sql);
$stmt->execute(['publicationDate' => $publicationDate, 'title' => $title, 'summary'=> $summary, 'content' => $content, 'id'=> $id]);


}
else {echo 'button not pressed';
}



?>



<h1> Hello   i`m editing page</h1>


<form method="POST" actions="action.php" >

	<input name="data" value="<?php print_r($publicationDate);?>"  type="text">

	<br><br>


	<input name="title" value="<?php print_r($title);?>"  type="text">

	<br><br>



	<input  name="summary" value="<?php print_r($summary); ?>"  type="text">

	<br><br>


	<input name="content" value="<?php print_r($content); ?>"  type="text">

	<br/><br/>
	
		<input type="submit" name="delete" value="Delete this Post">
		<input type="submit" name="update" value="Update Post">
	</form>





	<br><br>
	<br>


	<a href="../../index.php">на главную</a><br>
	<a href="../admin.php">на админку выбрать статью </a>

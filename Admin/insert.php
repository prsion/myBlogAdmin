<?php 
session_start();
require_once '../Dbh.php';
$dbh=new Dbh;
$id=$_GET['id'];
print_r($id);

/** if yes   */
if(isset($_GET['id']))
{
		
		$taValues = array(
			'id' => ''.$id,
			'publicationDate' => '',
			'title' => 'newTitle'.$id,
			'summary' => 'newBriefSummary'.$id,
			'content' => 'newBasicContent'.$id,

			); // array

		$sql="INSERT INTO articles(id, publicationDate, title, summary, content)VALUES(:id, :publicationDate, :title, :summary, :content)";
		$stmt = $dbh->insert($sql, $taValues);
	

		/**
		 * choose  all records
		 */
		$sql= 'SELECT * FROM articles WHERE id='.$id;
		$stmt=$dbh->query($sql);
		foreach ($stmt as $key=>$val){
			$id=$val['id'];
			$title=$val['title'];
			$summary=$val['summary'];
			$content=$val['content'];
			$publicationDate=$val['publicationDate'];

		}


var_dump($stmt);

}

?>

<?php 
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


<h1>Add new post</h1>

<form method="POST" actions="insert.php" >

	<input name="data" value="<?php print_r($publicationDate);?>"  type="text">

	<br><br>


	<input name="title" value="<?php print_r($title);?>"  type="text">

	<br><br>



	<input  name="summary" value="<?php print_r($summary); ?>"  type="text">

	<br><br>


	<input name="content" value="<?php print_r($content); ?>"  type="text">

	<br/><br/>
			
		<input type="submit" name="update" value="Add New Post">
	</form>

	<br><br>
	<br>
	<a href="../../index.php">на главную</a><br>
	<a href="../admin.php">на админку выбрать статью </a>
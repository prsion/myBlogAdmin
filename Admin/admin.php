<?php
session_start();
require_once '../Dbh.php' ;
$dbh=new Dbh;


$id= [];
$title=[];
$summary=[];
$content=[];
$publicationDate=[];


?>




<h1>Admin`s Panel</h1>
<?php

		$sql= 'SELECT * FROM articles';
		$count=$dbh->count($sql);
		
	 $ins=$count+1;
	 echo 'next NEW record='.$ins;

		#echo'<pre>';
		#print_r($count);
		#echo'</pre>';

			for($i=1; $i<=$count; $i++){
			$sql='SELECT * FROM articles WHERE id='.$i;
			$stmt=$dbh->query($sql);
			foreach ($stmt as $key=>$val){
			$id[]=$val['id'];
			$title[]=$val['title'];
			$summary[]=$val['summary'];
			$content[]=$val['content'];
			$publicationDate[]=$val['publicationDate'];
		}

}

		#echo'<pre>';
		#print_r($mass);
		#echo'</pre>';

?>


<form method="post" action="admin.php">
<select name="opt">
	<?php

	for ($i =0 ; $i < $count; $i++) {
		echo "<option value=\"$id[$i]\">$summary[$i]</option>";
	}
	?>

	<input type="submit" value="Submit the form"/>
</select>


</form>


<?php
$option = isset($_POST['opt']) ? $_POST['opt'] : false;
   if ($option) {
     $option = $_POST['opt'];
     

   } else {
     echo "option is required";
     exit;
   }

echo '<pre>';
var_dump($option);
echo '</pre>';
?>




<?php
echo'<br>';
echo'<br>';

echo "<a href='action.php/?id="."$option"."'".">"."Edit post</a>";
echo'<br>';
echo'<br>';
echo "<a href='insert.php/?id="."$ins"."'".">"."Add new post</a>";
?>





<?php
echo'<br>';
echo'<br>';
?>

<a href="../index.php">на главную</a>








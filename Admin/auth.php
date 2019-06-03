<?php 
session_start();
include_once '../Dbh.php' ;
$conn=new Dbh;

$sql='SELECT * FROM users WHERE id=1';
$stmt=$conn->query($sql);
//print_r($stmt);
echo '<pre>';
foreach ($stmt as $key=>$val)
$dblog=$val['log'];
$dbpass=$val['pass'];
print_r($dblog); echo'<br>';
print_r($dbpass);
echo '</pre>';

?>
	
<h1>Authorisation Panel</h1>
<form method="post">
login: <br />
<input type="text" name="log"> <br/>
password: <br />
<input type="text" name="pass"> <br/>
<input type="submit" name="button" value="Input" style="cursor:pointer"> <br/>

</form>
<?php 
if(!empty($_POST)){
		$log=$_POST['log'];
		$pass=$_POST['pass'];
		if(($log===$dblog) and ($pass===$dbpass)){

			$_SESSION['auth'] = $log;
			echo "Enter to admin -> <a href='admin.php'>Admin</a>";
		}else{
			return exit ('not correct');
		}



}

?>


</body>
</html>


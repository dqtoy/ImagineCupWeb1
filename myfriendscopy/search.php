<html>
	<head>
		<title>PHP Search</title>
	</head>
	<body>
<?php
  $con=mysqli_connect("localhost","root","","my friend") or die('Error connection');
  $data = '';
  if(isset($_POST['search']))
  {
	$str = $_POST['search'];
	$str = preg_replace("#[^0-9a-z]#i","",$str);
	$query = "SELECT username FROM users WHERE username LIKE '%$str%'";
	$result = mysqli_query($con,$query);
	var_dump($result);
	$count = mysqli_num_rows($result);
	if($count>0)
	while($row = mysqli_fetch_array($result))
	  {
		$data = $data."<div>".$row['username']."</div>";
	  }
  }  
?>
		<form action="search.php" method="post">
			<input type="text" name="search" />
			<input type="submit" value="search"/>
		</form>
		<a href=<?php echo $data; ?>></a>
	</body>
</html>
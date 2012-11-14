	<?php
			$server = 'localhost';
			$username = 'root';
			$password = '';
			$database_name = 'first';
			
			$connection = mysql_connect($server, $username, $password);
			
			if (!$connection){
				exit('cant connect to the db: ' . mysql_error());
			}
			
			$db = mysql_select_db($database_name , $connection);
			if (!$db){
				exit('db connection failed: ' . mysql_error());
			}
			
			?>


<html>

	<head>
		<title>exit \ die</title>
		
		<body>
			
<?php 
$result = mysql_query(
"select * FROM mytable" , $connection);

if(!$result){
	exit('db query failed: ' . mysql_error());
}

while ($row = mysql_fetch_array($result)){
	echo 'id:'. $row["id"]. '<br />';
	echo 'name:'. $row["name"]. '<br />';
	echo 'family:'. $row["family"]. '<br />';
	echo 'phone:'. $row["phone"]. '<br />';
	echo 'status:'. $row["status"]. '<br />';
	echo '<br />';
}
?>
		</body>
	</head>
</html>
<?php
mysql_close($connection);
?>
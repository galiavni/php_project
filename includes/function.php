<?php 

// 1 - database connection
function database_connect(){
$connection = mysql_connect(SERVER, USERNAME, PASSWORD);

# for developemnt use
//var_dump($connection);
if (!$connection) {
	die('cant connecto to the database' . mysql_error());
}
// Hebrew need this:
mysql_query("SET NAMES 'utf8'");
// 2 Select the database to use
$db = mysql_select_db(DATABASENAME, $connection);
if (!$db) {
	die('database connction failed' . mysql_error());
 }
	# We return connection resource because we use it later
	return $connection;
}

 

function n_query($query, $connection) {


	$result = mysql_query($query, $connection);

	if (!$result) {
		die("Query did not work " . mysql_error());
	}
	return $result;
}

# this function includes all the validation actions before getting user input 
function input_validation(){
	
	
	# if we have post data than we validate it
	if($_POST){
			
		# since post is array we are looping through all the value
		# in the array
		
		$validated_post = array();
			
		foreach($_POST as $key => $value){
			
			# Lets make sure that there no more than 20 characters
			if(strlen($value) > 40){
				echo "Too many characters";
				return FALSE;
			}
			
			# make sure we have no capital letters
			$strTolower = strtolower($value);
			
			# $validated_post[$key] 
			# make sure we have no html tags
			$stripTags = strip_tags($strTolower);
				
			# make sure that there is no white space in the beginning
			$trimmed  = trim($stripTags);
			
		//?????????	
		$validated_post = $validated_post[$key] ;
	
	# We returned array with the validated values
	return $validated_post;
	} 
} # END OF FUCNTION




?>
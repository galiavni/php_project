<?php
	  class db{
	  	#  משתנים
		public $server = 'localhost';
 		public $username =  'root';
		public $password = '';
		public $db = 'communities';
	# הכרזה על משתנה connection
		public $connection;
		public $last_query;
		
	public function __constuct(){
		# קריאה לפונקציית החיבור
		$this->open_connection_db();
	}				
		
	# פונקציית החיבור	
		public function open_connection_db($value = ''){
				
			
			$this->connection = mysql_connect($this->server,$this->username,$this->password);
			# אם אין קשר אז להפסיק את הריצה 
			if (!$this->connection){
				exit('cant connecto to the database' . mysql_error());
			}
			$db = mysql_select_db($this->db, $this->connection);	
			if (!$this->db){
				exit('cant connecto to the database' . mysql_error());
			}	
		}
		
		public function close_connection_db(){
			if($this->connection){
				mysql_close($this->connection);
				unset($this->connection);
		}
		}
			
		public function query($sql)	{
			$this->last_query = $sql;
			$result = mysql_query($sql);
			if (!$result){
				exit('the query failed' . mysql_error());
			}
			return $result;
		}
	  }		
		
$db = new db();
$db = $db->open_connection_db();
echo $db->last_query;
?>
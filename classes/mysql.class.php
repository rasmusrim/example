<?PHP
class mysql extends mysqli {
	function mysql($host, $username, $password, $dbname = '') {
		
       
       $this->connectionObj = new mysqli($host, $username, $password, $dbname);
		
		if ($this->connectionObj->connect_error) {
			throw new Exception('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error . ' ' . $mysqli->error);
          
		}
      
      
	}
	
	function query($query, $displayQuery = 0) {
		if($displayQuery) {
			print('<hr>' . $query . '<hr>');
		}
		
		$resultObj = $this->connectionObj->query($query);
		
		if($this->connectionObj->errno) {
			throw new Exception($this->connectionObj->error . ':<br>' . $query);
			
		}
		
		return $resultObj;
	}
	
	function clean($input) {
		return $this->connectionObj->real_escape_string($input);
	}
	
	function getID() {
		return $this->connectionObj->insert_id;
	}
}

<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../config/config.php');
 ?>

<?php
/**
 * 
 */
class Database{
	public $host   = DB_HOST;
	public $user   = DB_USER;
    public $pass   = DB_PSS;
    public $dbname = DB_NAME;

    public $link;
    public $error;

public function __construct(){
    	$this->connectDB();
    }

private function connectDB(){
	$this->link = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
	if (!$this->link) {
		$this->error = "Connection failed".$this->link->connect_error;
		return false;
	}	
    }

    //Select Data
public function select($query){
	$result = $this->link->query($query) or die($this->link->error.__LINE__);
    	if ($result->num_rows > 0) {
    		return $result;
    	}else{
    		return false;
    	}
        }

    //Insert Data 
public function insert($query){
	$insert_row = $this->link->query($query) or die($this->link->error.__LINE__);
    	if ($insert_row) {
    		return $insert_row;
    	}else{
    		return false;
    	}
        }

    //Update Data
public function update($query){
	$update_row = $this->link->query($query) or die($this->link->error.__LINE__);
    	if ($update_row) {
    		return $update_row;
    	}else{
    		return false;
    	}
        }

    //Delete Data
public function delete($query){
	$result = $this->link->query($query) or die($this->link->error.__LINE__);
    	if ($result) {
    		return $result;
    	}else{
    		return false;
    	}
        }                


}
?>
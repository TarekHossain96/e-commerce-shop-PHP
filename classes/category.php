<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/format.php');
?>
<?php

class category{
	
	private $db;
	private $fm;
	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}
	 public function catInsert($catName){
		$catName = $this->fm->validation($catName);
		$catName = mysqli_real_escape_string($this->db->link,$catName);
		if (empty($catName)) {
			$msg = "<span class='error'>Category name must not be empty !</span>";
			return $msg;
		}else{
			$query = "INSERT INTO tbl_category(catName) VALUES('$catName')";
            $catinsert = $this->db->insert($query);
            if ($catinsert){
            	$msg = "<span class='success'>Category inserted Successfully !</span>";
            	return $msg;
            }else{
            	$msg = "<span class='error'>Category not inserted !</span>";
            	return $msg;
            }
		}
	}
	public function getAllCat(){
		$query = "SELECT* FROM tbl_category ORDER BY catId DESC";
		$result = $this->db->select($query);
		return $result;
	}
	public function getCatById($catid){
		$query = "SELECT* FROM tbl_category WHERE catId = '$catid'";
		$result = $this->db->select($query);
		return $result;
	}
	public function catUpdate($catName, $catid){
		$catName = $this->fm->validation($catName);
		$catName = mysqli_real_escape_string($this->db->link,$catName);
		$catid = mysqli_real_escape_string($this->db->link,$catid);
		if (empty($catName)) {
			$msg = "<span class='error'>Category name must not be empty !</span>";
			return $msg;
		}else{
			$query = "UPDATE tbl_category SET catName = '$catName' WHERE  	catId = '$catid' ";
            $catUpdate = $this->db->update($query);
            if ($catUpdate){
            	$msg = "<span class='success'>Category Updated Successfully !</span>";
            	return $msg;
            }else{
            	$msg = "<span class='error'>Category not Updated !</span>";
            	return $msg;
            }
		}
	}
	public function delCatById($delcatId ){
		$query = "DELETE FROM tbl_category  WHERE catId = '$delcatId'";
		$delData = $this->db->delete($query);
		if ($delData){
            	$msg = "<span class='success'>Category Deleted Successfully !</span>";
            	return $msg;
            }else{
            	$msg = "<span class='error'>Category not Delete !</span>";
            	return $msg;
            }
	}
}
?>
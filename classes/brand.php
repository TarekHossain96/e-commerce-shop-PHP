<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/format.php');
?>
<?php

class brand{
	
	private $db;
	private $fm;

	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}
	public function brandInsert($brandName){
		$brandName = $this->fm->validation($brandName);
		$brandName = mysqli_real_escape_string($this->db->link,$brandName);
		if (empty($brandName)) {
			$msg = "<span class='error'>Brand name must not be empty !</span>";
			return $msg;
		}else{
			$query = "INSERT INTO tbl_brand(brandName) VALUES('$brandName')";
            $brandinsert = $this->db->insert($query);
            if ($brandinsert){
            	$msg = "<span class='success'>Brand inserted Successfully !</span>";
            	return $msg;
            }else{
            	$msg = "<span class='error'>Brand not inserted !</span>";
            	return $msg;
            }
		}
	}
	public function getAllBrand(){
		$query = "SELECT* FROM tbl_brand ORDER BY brandId DESC";
		$result = $this->db->select($query);
		return $result;
	}
	public function getBrandById($brandid){
		$query = "SELECT* FROM tbl_brand WHERE brandId = '$brandid'";
		$result = $this->db->select($query);
		return $result;
	}
	public function brandUpdate($brandName, $brandid){
		$brandName = $this->fm->validation($brandName);
		$brandName = mysqli_real_escape_string($this->db->link,$brandName);
		$brandid = mysqli_real_escape_string($this->db->link,$brandid);
		if (empty($brandName)) {
			$msg = "<span class='error'>Brand name must not be empty !</span>";
			return $msg;
		}else{
			$query = "UPDATE tbl_brand SET brandName = '$brandName' WHERE  	brandid = '$brandid' ";
            $brandUpdate = $this->db->update($query);
            if ($brandUpdate){
            	$msg = "<span class='success'>Brand Name Updated Successfully !</span>";
            	return $msg;
            }else{
            	$msg = "<span class='error'>Brand Name not Updated !</span>";
            	return $msg;
            }
		}
	}
	public function delBrandById($delbrandId ){
		$query = "DELETE FROM tbl_brand  WHERE brandId = '$delbrandId'";
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
<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/format.php');
?>
<?php
class product{
	
private $db;
private $fm;
public function __construct(){
$this->db = new Database();
$this->fm = new Format();
}
public function productInsert($data,$file){

$productName = mysqli_real_escape_string($this->db->link,$data['productName']);
$catId       = mysqli_real_escape_string($this->db->link,$data['catId']);
$brandId     = mysqli_real_escape_string($this->db->link,$data['brandId']);
$body        = mysqli_real_escape_string($this->db->link,$data['body']);
$price       = mysqli_real_escape_string($this->db->link,$data['price']);
$type        = mysqli_real_escape_string($this->db->link,$data['type']);

	$permited  = array('jpg','png','jpeg','gif');
	$file_name = $file['image']['name'];
	$file_size = $file['image']['size'];
	$file_temp = $file['image']['tmp_name'];

$div = explode('.', $file_name);
$file_ext = strtolower(end($div));
$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
$uploaded_image = "uploads/".$unique_image;
if (empty($productName) || empty($catId) || empty($brandId) || empty($body)|| empty($price) || empty($file_name) || empty($type)) {
	$msg = "<span class='error'>Field name must not be empty!</span>";
	return $msg;
}elseif ($file_size >1048567) {
  echo "<span class='error'>Image Size should be less then 1MB! </span>";
} elseif (in_array($file_ext, $permited) === false) {
  echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
}else{
	move_uploaded_file($file_temp,  $uploaded_image);
	$query = "INSERT INTO tbl_product(productName, catId, brandId, body, price, image, type ) VALUES('$productName', '$catId', '$brandId', '$body', '$price', '$uploaded_image', '$type')";
	$productInsert =$this->db->insert($query);
	if ($productInsert){
    	$msg = "<span class='success'>Product inserted Successfully !</span>";
    	return $msg;
    }else{
    	$msg = "<span class='error'>Product not inserted !</span>";
    	return $msg;
    }
}


}
public function getAllProduct(){
$query = "SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName
FROM tbl_product
INNER JOIN tbl_category ON tbl_product.catId = tbl_category.catId
INNER JOIN tbl_brand ON tbl_product.brandId = tbl_brand.brandId 
ORDER BY tbl_product.ProductId DESC";
$result = $this->db->select($query);
return $result; 
}
public function getProById($proid){
$query = "SELECT* FROM tbl_product WHERE productId = '$proid'";
$result = $this->db->select($query);
return $result;
}
public function productUpdate($value,$file,$proid){

    $productName = mysqli_real_escape_string($this->db->link,$value['productName']);
	$catId       = mysqli_real_escape_string($this->db->link,$value['catId']);
	$brandId     = mysqli_real_escape_string($this->db->link,$value['brandId']);
	$body        = mysqli_real_escape_string($this->db->link,$value['body']);
	$price       = mysqli_real_escape_string($this->db->link,$value['price']);
	$type        = mysqli_real_escape_string($this->db->link,$value['type']);

	$permited  = array('jpg','png','jpeg','gif');
	$file_name = $file['image']['name'];
	$file_size = $file['image']['size'];
	$file_temp = $file['image']['tmp_name'];

	$div = explode('.', $file_name);
    $file_ext = strtolower(end($div));
    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
    $uploaded_image = "uploads/".$unique_image;

    if (empty($productName) || empty($catId) || empty($brandId) || empty($body)|| empty($price) || empty($type)) {
	$msg = "<span class='error'>Field name must not be empty!</span>";
	return $msg;
}else{
	if (!empty($file_name)) {
		if ($file_size >1048567) {
		  echo "<span class='error'>Image Size should be less then 1MB! </span>";
		} elseif (in_array($file_ext, $permited) === false) {
		  echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
		}else{
			move_uploaded_file($file_temp,  $uploaded_image);
			$query = "UPDATE tbl_product
			          SET
			          productName = '$productName',
			          catId       = '$catId',
			          brandId     = '$brandId',
			          body        = '$body',
			          price       = '$price',
			          image       = '$uploaded_image',
			          type        = '$type'
			          WHERE productId = '$proid'";
			$productUpdate =$this->db->update($query);
			if ($productUpdate){
		    	$msg = "<span class='success'>Product Updated Successfully !</span>";
		    	return $msg;
		    }else{
		    	$msg = "<span class='error'>Product not Update!</span>";
		    	return $msg;
		    }
		   }
		}else{
				$query = "UPDATE tbl_product
			          SET
			          productName = '$productName',
			          catId       = '$catId',
			          brandId     = '$brandId',
			          body        = '$body',
			          price       = '$price',
			          type        = '$type'
			          WHERE productId = '$proid'";
			$productUpdate =$this->db->update($query);
			if ($productUpdate){
		    	$msg = "<span class='success'>Product Updated Successfully !</span>";
		    	return $msg;
		    }else{
		    	$msg = "<span class='error'>Product not Update!</span>";
		    	return $msg;
		    }

	}
  }
 }
 public function delProId($id){
 	$imgQuery = "SELECT * FROM tbl_product WHERE productId ='$id'";
 	$getImgLink = $this->db->select($imgQuery);

 	if ($getImgLink) {
 		while ($delImg = $getImgLink->fetch_assoc()) {
 			$delImglink = $delImg['image'];
 			unlink($delImglink);
 		}
 	}
 	$query = "DELETE FROM tbl_product WHERE productId ='$id'";
 	$delData = $this->db->delete($query);
		if ($delData){
            	$msg = "<span class='success'>Category Deleted Successfully !</span>";
            	return $msg;
            }else{
            	$msg = "<span class='error'>Category not Delete !</span>";
            	return $msg;
            }
 }
 public function getFeaturedProduct(){
 	$query = "SELECT* FROM tbl_product WHERE type = '1' ORDER BY productId DESC LIMIT 4";
	$result = $this->db->select($query);
	return $result;
 }
  public function getNewProduct(){
 	$query = "SELECT* FROM tbl_product ORDER BY productId DESC LIMIT 4";
	$result = $this->db->select($query);
	return $result;
 }
 public function getSingleProduct($proid){
 	$query = "SELECT p.*, c.catName, b.brandName
 	          FROM tbl_product as p, tbl_category as c, tbl_brand as b
 	          WHERE p.catId = c.catId AND p.brandId = b.brandId AND p.productId = '$proid'";
 	          $result = $this->db->select($query);
 	          return $result;

 }
}
?>
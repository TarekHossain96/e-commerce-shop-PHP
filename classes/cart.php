<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/format.php');
?>
<?php
class cart{
	
	private $db;
private $fm;
public function __construct(){
$this->db = new Database();
$this->fm = new Format();
 }

 public function addToCart($quantity, $proid){
 	$quantity  = $this->fm->validation($quantity);
	$quantity  = mysqli_real_escape_string($this->db->link,$quantity);
	$productId = mysqli_real_escape_string($this->db->link,$proid);
	$sId       = session_id();

    $query  = "SELECT* FROM tbl_product WHERE productId ='$productId'";
    $result = $this->db->select($query)->fetch_assoc();
    
    $productName = $result['productName'];
    $price       = $result['price'];
    $image       = $result['image'];

    $query  = "SELECT* FROM tbl_cart WHERE productId ='$productId' AND sId = '$sId'";
    $getPro = $this->db->select($query);
    if ($getPro) {
        $msg = "Product already added !";
        return $msg;
    }else{ 
 
    $query = "INSERT INTO tbl_cart(productId, productName, sId, price, quantity,image) VALUES('$productId', '$productName', '$sId', '$price', '$quantity','$image')";
	$cartInsert =$this->db->insert($query);
	if ($cartInsert){
    	header("Location:cart.php");
    }else{
    	header("Location:details.php");
    }
}

 }

 public function getCartProduct(){
    $sId = session_id();
        $query = "SELECT * FROM tbl_cart WHERE sId ='$sId'";
        $result = $this->db->select($query);
        return $result;
 }
 public function UpdateQuantity($cartId, $quantity){
    $cartId  = mysqli_real_escape_string($this->db->link,$cartId);
    $quantity = mysqli_real_escape_string($this->db->link,$quantity);

    $query = "UPDATE tbl_cart
                      SET
                      quantity = '$quantity'
                      WHERE cartId = '$cartId'";
            $quantityUpdate =$this->db->update($query);
 }
 public function deltProByCurt($delPro){
    $delPro  = mysqli_real_escape_string($this->db->link,$delPro);
    $query = "DELETE FROM tbl_cart WHERE cartId = '$delPro'";
    $dltPro =$this->db->delete($query);
 }
 public function chkCartData(){
    $sId = session_id();
    $query = "SELECT * FROM tbl_cart WHERE sId ='$sId'";
    $result = $this->db->select($query);
    return $result;
 }
 public function delCustomerCart(){
    $sId = session_id();
    $query = "DELETE FROM tbl_cart WHERE sId ='$sId'";
         $this->db->select($query);
    
}
public function orderProduct($custId){
     $sId = session_id();
    $query = "SELECT * FROM tbl_cart WHERE sId ='$sId'";
    $getPro = $this->db->select($query);
    if ($getPro) {
       while ($result = $getPro->fetch_assoc()) {
           $productId = $result['productId'];
           $productName = $result['productName'];
           $quantity = $result['quantity'];
           $price = $result['price'] * $quantity;
           $image = $result['image'];
            $query = "INSERT INTO tbl_order(cmrid,productId,productName,quantity,price,image) VALUES('$custId','$productId', '$productName', '$quantity', '$price','$image')";
            $productInsert =$this->db->insert($query);
       }
    }
}
public function payableAmount($custId){
        $query = "SELECT price FROM tbl_order WHERE cmrid ='$custId' AND date= now()";
        $result = $this->db->select($query);
        return $result;
}

 
}
?>
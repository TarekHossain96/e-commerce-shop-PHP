<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/format.php');
?>
<?php
class customer{
	
	private $db;
private $fm;
public function __construct(){
$this->db = new Database();
$this->fm = new Format();
 }
public function customersRegistration($data){

$name     = mysqli_real_escape_string($this->db->link,$data['name']);
$city     = mysqli_real_escape_string($this->db->link,$data['city']);
$zip      = mysqli_real_escape_string($this->db->link,$data['zip']);
$email    = mysqli_real_escape_string($this->db->link,$data['email']);
$address  = mysqli_real_escape_string($this->db->link,$data['address']);
$country  = mysqli_real_escape_string($this->db->link,$data['country']);
$phone    = mysqli_real_escape_string($this->db->link,$data['phone']);
$password = mysqli_real_escape_string($this->db->link,md5($data['password']));

if (empty($name) || empty($city) || empty($zip) || empty($email)|| empty($address) || empty($country) || empty($phone) || empty($password)) {
	$msg = "<span class='error'>Field name must not be empty!</span>";
	return $msg;
}
$mailQuery = "SELECT * FROM tbl_customer WHERE email = '$email' LIMIT 1";
$mailChk   = $this->db->select($mailQuery);

if ($mailChk !=false) {
	$msg = "<span class='error'>Email already exit !</span>";
	return $msg;
}else{
 $query = "INSERT INTO tbl_customer(name, city, zip, email, address,country,phone,password) 
               VALUES('$name', '$city', '$zip', '$email', '$address','$country','$phone','$password')";
       $customerDataInsert =$this->db->insert($query);
	if ($customerDataInsert){
    	$msg = "<span class='success'>Registration Successfully !</span>";
    	return $msg;
    }else{
    	$msg = "<span class='error'>Product not inserted !</span>";
    	return $msg;
    }
}

}

public function customersLogin($data){

$email    = mysqli_real_escape_string($this->db->link,$data['email']);
$password = mysqli_real_escape_string($this->db->link,md5($data['password']));

  if (empty($email)|| empty($password)) {
	$msg = "<span class='error'>Field name must not be empty!</span>";
	return $msg;
}

$Query = "SELECT * FROM tbl_customer WHERE email = '$email' AND password ='$password'";
$result = $this->db->select($Query);
if ($result != false) {
	$value = $result->fetch_assoc();
	Session::set("cuslogin", True);
	Session::set("custId", $value['id']);
	Session::set("custName", $value['name']);
	header("Location:cart.php");
}else{
	$msg = "<span class='error'>Email or Password not mached!</span>";
	return $msg;
}
}
public function getCsInfo($id){

	$Query = "SELECT * FROM tbl_customer WHERE id = '$id' LIMIT 1";
    $result   = $this->db->select($Query);
    return $result;


}
public function updateCmrProfile($data,$custId){
$name     = mysqli_real_escape_string($this->db->link,$data['name']);
$city     = mysqli_real_escape_string($this->db->link,$data['city']);
$zip      = mysqli_real_escape_string($this->db->link,$data['zip']);
$email    = mysqli_real_escape_string($this->db->link,$data['email']);
$address  = mysqli_real_escape_string($this->db->link,$data['address']);
$country  = mysqli_real_escape_string($this->db->link,$data['country']);
$phone    = mysqli_real_escape_string($this->db->link,$data['phone']);


if (empty($name) || empty($city) || empty($zip) || empty($email)|| empty($address) || empty($country) || empty($phone)) {
	$msg = "<span class='error'>Field name must not be empty!</span>";
	return $msg;
}else{
 
      $query = "UPDATE tbl_customer 
                SET 
                name    = '$name',
                city    = '$city',
                zip     = '$zip',
                email   = '$email',
                country = '$country',
                phone   = '$phone',
                address = '$address'
          WHERE id      = '$custId' ";
            $castUpdate = $this->db->update($query);
            if ($castUpdate){
            	$msg = "<span class='success'>Updated Successfully !</span>";
            	return $msg;
            }else{
            	$msg = "<span class='error'>Not Updated !</span>";
            	return $msg;
            }
}

}


}
 

?>
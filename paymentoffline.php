<?php include 'inc/header.php';?>
<?php
   $login = Session::get("cuslogin");
   if ($login == false) {
   	header("Location:login.php");
   }
?>
<?php
if (isset($_GET['orderid']) && $_GET['orderid']=='order') {
  $custId = Session::get("custId");
  $insertPro = $ct->orderProduct($custId);
  $delData = $ct->delCustomerCart();
  header("Location:paymentSuccess.php");
}
?>
<style type="text/css">
.payment{width: 50%;float: left;}
.tblone{width: 430px;margin: 0 auto;border: 2px solid #ddd}
.tblone tr td{text-align: justify;}
.tbltwo{float: right;text-align: left;width: 70%;border: 2px solid #ddd;margin-right: 3px;margin-top: 12px;line-height: 15px;}
.tbltwo tr td{text-align: justify; padding: 5px 10px;}
.order{padding-bottom: 30px}
.order a {
  width: 120px;
  margin: 20px auto 0;
  text-align: center;
  padding: 5px;
  font-size: 30px;
  display: block;
  background: #029D02;
  color: #fff;
  border-radius: 5px;
}

</style>

 <div class="main">
    <div class="content">
    	<div class="section group">
        <div class="payment">
  <table class="tblone">
      <tr>
        <th>No</th>
        <th>Product</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Total</th>
      </tr>
    <?php
             $getPro = $ct->getCartProduct();
             if ($getPro) {
              $i=0;
              $sum=0;
              while ($result = $getPro->fetch_assoc()) {
                $i++;
      ?>
      <tr>
        <td><?php echo $i;?></td>
        <td><?php echo $result['productName'];?></td>
        <td>$<?php echo $result['price'];?></td>
        <td>$<?php echo $result['quantity'];?></td>
        <td>$<?php 
            $totalPrice = $result['price'] * $result['quantity'];
        echo $totalPrice;
        ?></td>
      </tr>
      <?php
                      $sum = $sum + $totalPrice;
      ?>
    <?php }}?>
      
    </table>
    <?php
                  $getData = $ct->chkCartData();
      if ($getData) {
    ?>
    <table class="tbltwo">
      <tr>
        <td>Sub Total</td>
        <td>:</td>
        <td>$<?php 
        if (isset($sum)) {
          echo $sum;
        }
        ?>
          
        </td>
      </tr>
      <tr>
        <td>VAT</td>
        <td>:</td>
        <td>10%($<?php echo $vat = $sum*0.1;?>)</td>
      </tr>
      <tr>
        <td>Grand Total</td>
        <td>:</td>
        <td>$<?php
        if (isset($sum)) {
          $vat = $sum*0.1;
        $gTotal = $sum + $vat;
        echo "$gTotal";
        /*Session::set("gTotal", $gTotal);*/
        }
        
        ?></td>
      </tr>
     </table>
   <?php }?>
        </div>




        <div class="payment">
          <?php
        $id = Session::get("custId");
        $getCsInfo = $cmr->getCsInfo($id);
        if ($getCsInfo){ 
          while ($result = $getCsInfo->fetch_assoc()) {
          ?>
        <table class="tblone">
          <tr><td colspan="3">Profile</td></tr>
        <tr>
          <td width="20%">User Name</td>
          <td width="5%">:</td>
          <td><?php echo $result['name'];?></td>
        </tr>  
         <tr>
          <td>Email</td>
          <td>:</td>
          <td><?php echo $result['email'];?></td>
        </tr> 
         <tr>
          <td>Address</td>
          <td>:</td>
          <td><?php echo $result['address'];?></td>
        </tr> 
         <tr>
          <td>City</td>
          <td>:</td>
          <td><?php echo $result['city'];?></td>
        </tr> 
         <tr>
          <td>Zip-Code</td>
          <td>:</td>
          <td><?php echo $result['zip'];?></td>
        </tr> 

         <tr>
          <td>Country</td>
          <td>:</td>
          <td><?php echo $result['country'];?></td>
        </tr> 
         <tr>
          <td>Phone</td>
          <td>:</td>
          <td><?php echo $result['phone'];?></td>
        </tr> 
        <tr>
          <td></td>
          <td></td>
          <td><a href="editProfile.php">Edit</a></td>
        </tr>
        </table>
      <?php }} ?>
        </div>
       
    	</div>  	
    </div>
    <div class="order"><a href="?orderid=order">Order</a></div>
 </div>
 
<?php include 'inc/footer.php';?>
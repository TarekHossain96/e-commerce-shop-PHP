<?php include 'inc/header.php';?>
<?php
   $login = Session::get("cuslogin");
   if ($login == true) {
   	header("Location:order.php");
   }
?>

 <div class="main">
    <div class="content">

<?php
   if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])){
   	$CustomersLogin = $cmr->customersLogin($_POST);
   }
?>
    	 <div class="login_panel">
    	 	<?php
                 if (isset($CustomersLogin)) {
                 	echo $CustomersLogin;
                 }
    		?>
        	<h3>Existing Customers</h3>
        	<p>Sign in with the form below.</p>
        	<form action="" method="post">
	        	<input name="email" type="text" placeholder="Email">
	            <input name="password" type="password" placeholder="Password" >
	             <div class="buttons"><div><button class="grey" name="login">Sign In</button></div></div>
	            </div>
            </form>
                   

<?php
   if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])){
   	$CustomersReg = $cmr->customersRegistration($_POST);
   }
?>
    	<div class="register_account">
    		<?php
                 if (isset($CustomersReg)) {
                 	echo $CustomersReg;
                 }
    		?>
    		<h3>Register New Account</h3>
    		<form action="" method="post">
		   			 <table>
		   				<tbody>
						<tr>
						<td>
							<div>
							<input type="text" name="name" placeholder="Name">
							</div>
							
							<div>
							   <input type="text" name="city" placeholder="City">
							</div>
							
							<div>
								<input type="text" name="zip" placeholder="Zip-code">
							</div>
							<div>
								<input type="text" name="email" placeholder="Email">
							</div>
		    			 </td>
		    			<td>
						<div>
							<input type="text" name="address" placeholder="Address">
						</div>
		    		<div>
						<select id="country" name="country" placeholder="Country"">
							<option value="null">Select a Country</option>         
							<option value="Afghanistan">Afghanistan</option>
							<option value="Albania">Albania</option>
							<option value="Algeria">Algeria</option>
							<option value="Argentina">Argentina</option>
							<option value="Armenia">Armenia</option>
							<option value="Aruba">Aruba</option>
							<option value="Australia">Australia</option>
							<option value="Austria">Austria</option>
							<option value="Azerbaijan">Azerbaijan</option>
							<option value="Bahamas">Bahamas</option>
							<option value="Bahrain">Bahrain</option>
							<option value="Bangladesh">Bangladesh</option>

		         </select>
				 </div>		        
	
		           <div>
		          <input type="text" name="phone" placeholder="Phone">
		          </div>
				  
				  <div>
					<input type="text" name="password" placeholder="Password">
				</div>
		    	</td>
		    </tr> 
		    </tbody></table> 
		   <div class="search"><div><button class="grey" name="register">Create Account</button></div></div>
		   
		    <div class="clear"></div>
		    </form>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
<?php include 'inc/footer.php';?>
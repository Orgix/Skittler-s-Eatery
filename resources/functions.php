<?php
/********************************HELPER FUNCTIONS*************************/
/* This is the place to all the helper functions that will just make your code look
cleaner. For code readability, make sure to add any helper function before the
ending comment. Cheers!

*/
function set_message($msg){
/* function that is used both for saving error cases or a welcome message. It is combined with display_message().
It saves messages into the global $_SESSION and presents the result wherever the function display_message() is called.
This function is used both on register and login actions, but in the send_messsage() function as well.

EX. on unsuccessful login => set_message("The combination of username and password is incorrect.");
Then after redirection the display_message() is used to notify the user about the  error*/
	if(!empty($msg)){
		$_SESSION['message']= $msg;
	}else{
		$msg = "";
	}
}


function display_message(){ /*function that presents any message in the screen that has been created from the various activities in the CMS. It will simply present them to the user and then unset the associated message from the $_SESSION. */
	if(isset($_SESSION['message'])){
		echo $_SESSION['message'];
		unset($_SESSION['message']);
	}
}

function redirect($location){ // function that redirects to where the $location indicates

	header("Location: ". $location);
}

function query($sql){ //query execution without needing to write $connection over and over

	global $connection;
	return mysqli_query($connection,$sql);
}

function confirm($query){ /* function that checks if there's a problem
with the query that was sent. It's mostly used for debugging purposes, but
if modified it can actually attack the error to a log file , where the
administrator can have it displayed. For debugging we just keep the classic
if clause to make sure our queries work adequately!*/

	global $connection;
	if(!$query){
		die("QUERY FAILED: ". mysqli_error($connection));
	}else{ /* this else is completely optional. It can be ommited after
		testing is done. Else it can be appended as a response to a log file*/
		echo "query succeeded~!";
	}
}

function escape_string($string){ //function that helps escape the string, more clearly written.

	global $connection;
	return mysqli_real_escape_string($connection, $string);
}

function fetch_array($result_set){ // fetch function
	return mysqli_fetch_array($result_set);
}

function count_rows($query){
	return mysqli_num_rows($query);
}

function property_does_exist($column , $property){
$property = escape_string($property);
$query = "SELECT user_id FROM customers WHERE $column='{$property}'";
	$result = query($query);
	confirm($result);

	if(count_rows($result) > 0){
		return true;
	}
	return false;
}

/********************************HELPER FUNCTIONS END*************************/


/********************************* PRODUCTS FUNCTIONS ************************/
function get_products(){// function that fetches all the products from DB, then presents them using heredoc

	$query = query("SELECT * FROM products");
	confirm($query);

	while($row = fetch_array($query)){
		$short_desc = substr($row['product_short_desc'],0,50)."...";
		/*remodel for MENU*/
		$product = <<<DELIMETER

 			<div class="col-sm-4 col-lg-4 col-md-4">
                <div class="thumbnail">
                    <a href="item.php?id={$row['product_id']}" target='blank'><img src="{$row['product_image']}" alt=""></a>
                    <div class="caption">
                        <h4 class="pull-right">&#36;{$row['product_price']}</h4>
                        <h4><a href="item.php?id={$row['product_id']}">{$row['product_title']}</a>
                        </h4>
                        <p>{$short_desc}</p>
                         <a class="btn btn-primary" target="_blank" href="../resources/cart.php?add={$row['product_id']}" target='blank'>Add to cart</a>
                    </div>

                </div>
            </div>
DELIMETER;
        echo $product;
	}

}




/********************************* PRODUCTS END ****************************/

/********************************* CATEGORIES FUNCTIONS*********************/
function get_categories(){
	
	$query = query("SELECT category_name FROM categories");


	confirm($query);

	while($row = fetch_array($query)){
		$name = $row['category_name'];
		$category_links = <<<DELIMETER
		 <li class=" "><a href="#{$name}">{$name}</a></li>
DELIMETER;
	echo $category_links;
	}

}

function get_category_items($id){
	echo $id;

	$query = query("SELECT * FROM products WHERE product_category_id =".escape_string($id)." ");
	confirm($query);

	while($row = fetch_array($query)){
		$short_desc = substr($row['product_short_desc'],0,60);
		$item = <<<START
		 <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="{$row['product_image']}" alt="">
                    <div class="caption">
                        <h3>{$row['product_title']}</h3>
                        <p>{$short_desc}</p>
                        <p>
                            <a href="#" class="btn btn-primary">Buy Now!</a> <a href="item.php?id={$row['product_id']}" class="btn btn-default">More Info</a>
                        </p>
                    </div>
                </div>
            </div>
START;
            echo $item;
	}
}



/*************************************************Users functions********************************************/
function handle_login_mistake(){
	set_message("The combination of username and password is wrong!");
	//redirect("register.php");
}

function login_user(){

	if(isset($_POST['login'])){
		
		$email = escape_string($_POST['login_user_email']);
		$password = escape_string($_POST['login_user_password']);
		
		if(empty($email) || empty($password)){
			set_message("This fields cannot be empty");
			redirect("register.php");
			return ; 
		}

		$query = query("SELECT * FROM customers WHERE user_email='{$email}'");

		confirm($query);
		
		

		if(count_rows($query) == 0){
			echo "no entries";
			handle_login_mistake();
		}else{
			
			$row = fetch_array($query);
			
			$verified = password_verify($password, $row['user_password']);

			if($verified){
				$_SESSION['first_name'] = $row['user_first_name'];
				$_SESSION['last_name'] = $row['user_last_name'];
				redirect("user.php");
			}else{
				handle_login_mistake();
			}
		}
	}
}
function handle_register(){
	if(isset($_POST['register'])){
	
	$first_name = trim($_POST['user_first_name']);
	$last_name = trim($_POST['user_last_name']);
	$username = trim($_POST['username']);
	$email = trim($_POST['user_email']);
	$password = trim($_POST['user_password']);
    $confirm_password = trim($_POST['user_password_confirm']);
	echo "pass before hash: ".$password."\n";
	$error = [
	   'first_name' => '',
	   'last_name' => '',
	   'email' =>'',
	   'password'=>'',
	   'confirm_password'=>''
   ];

   if(strlen($username) <= 4 ){
	   $error['username'] = 'Username needs to be longer than 4 characters.';
   }
   if(empty($username)){
	   $error['username'] = 'Username cannot be empty';
   }
   if(property_does_exist('username',$username)){
	   $error['username'] = 'Username already exists';
   }

	
   if(empty($email)){
	   $error['email'] = 'Email cannot be empty';
   }
   if(property_does_exist('user_email',$email)){
	   $error['email'] = 'Email already exists, <a href="index.php#loginWindow">Login</a>';
   }
   
   if(strlen($password) <= 6){
	   $error['password'] = 'Password cannot be less than 7 characters long';
   }
   if(empty($password) || empty($confirm_password)){
	   $error['password']='Password fields cannot be empty';
   }
   
   if($password != $confirm_password){
	   $error['confirm_password'] = 'The passwords given did not match';
   }

   foreach($error as $key => $value){
	   if(empty($value)){
		   unset($error[$key]);
	   }
   }
   if(empty($error)){
	   $user_info = [
		   'first_name'=>$first_name,
		   'last_name' =>$last_name,
		   'username' =>$username,
		   'password' =>$password,
		   'email' => $email
	   ];
	   register_user($user_info);
	   redirect("register.php");
   }
    else{
		return $error;
	}
}
}

function register_user($arr){
	global $connection;

	$first_name = escape_string($arr['first_name']);
	$last_name = escape_string($arr['last_name']);
	$username = escape_string($arr['username']);
	$email = escape_string($arr['email']);
    $password= $arr['password'];
	
	
	
    
    $hashed_password = escape_string(password_hash($password, PASSWORD_DEFAULT));
    
    $query = 'INSERT INTO customers (username, user_first_name, user_last_name, user_email, user_password, user_role) ';
    $query .= "VALUES ('{$username}','{$first_name}','{$last_name}','{$email}', '{$hashed_password}', 'user')";

    $register_user = query($query);
    confirm($register_user);

	        
	    
}


function send_message(){ // SETTING ON PHP.INI .... otherwise the email will never be sent
	if(isset($_POST['submit'])){

		$to = 'tnikos28@gmail.com';

		$from_name = $_POST['name'];
		$subject = $_POST['email'];
		$email = $_POST['email'];
		$message = $_POST['message'];

		$headers = "MIME-Version: 1.0"."\r\n";
		$headers .= 'From: {$email}'.'\r\n';
		$headers .= 'Content-type: text/html; charset=utf-8'.'\r\n';

		$result = mail($to, $subject, $message, $headers);

		if(!$result){
			set_message("Could not send the email");

		}else{

			set_message("Email sent!");

		}
		redirect("contact.php");
	}
}


/********************************************************** PAGE FUNCTIONS *******************************************/
function get_info($message){
  /*Function that will return the title depending on the query 
	parameter. Used on info.php for the info-title mark-up 
  */
  $title = "";
                    
  switch($message){
	  case 'about':
	   $title = "About us";
	   
	   break;
	  case 'faq':
	   $title = "FAQs";
	   break;
	  case 'howitworks':
	   $title = "How does it work";
	   break;
	  case 'contact':
	   $title = 'Contact Us';
	   break;
	  case 'terms':
	   $title = 'Terms & Conditions';
	   break;
	   case 'privacy':
	   $title = "Privacy Policy";
	   break;
	  case 'methods':
	   $title = "Payment Methods";
	   break;
	  case 'evaluation':
	   $title = 'Evaluation Policy';
	   break;
	  case 'sitemap':
	   $title = 'Sitemap';
	   break;
}	
 $info = array($title, $message.'.php');
 return $info;
}

function generate_items($pages, $pageRequested){
	for($i= 0; $i < count($pages); $i++){
		if($pages[$i][0] == $pageRequested){
			echo '<li class="selected"><a href="info.php?page='.$pages[$i][0].'">'.$pages[$i][1].'</a></li>';
		}
		else{
			echo '<li><a href="info.php?page='.$pages[$i][0].'">'.$pages[$i][1].'</a></li>';
		}
	}
}
/***************************************************END of page functions ***********************************/




/***************************************Checkout and cart functions*******************/
// function display_cart_items(){
//         $query = query("SELECT * FROM products");
//         confirm($query);

//         while($row = fetch_array($query)){
//             $product = <<<PRODUCT
//             <tr>
//                 <td>{$row['product_title']}</td>
//                 <td>&#36;{$row['product_price']}</td>
//                 <td>3</td>
//                 <td>2</td>
//                 <td><a href='cart.php?remove=1'>Remove</a></td>
//                 <td><a href='cart.php?delete=1'>Delete</a></td>
//             </tr>
// PRODUCT;
//             echo "Entei";
//             echo $product;
//         }

//     }

?>

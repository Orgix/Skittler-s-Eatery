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
	
	$query = query("SELECT id,category_name FROM categories");
	$list = array();
	$category_links = '';
	while($row = fetch_array($query)){
		$name = $row['category_name'];
		$category_links .= <<<DELIMETER
		 <li class=" "><a href="#{$name}">{$name}</a></li>
DELIMETER;
	
     $list[] = [$row['id'], $row['category_name']];
	}
	
	return [$list, $category_links];
}

function get_category_items($id){

	$query = query("SELECT * FROM items WHERE category_id =".$id." ");

	while($row = fetch_array($query)){
		
		$item = <<<START
		<div class="col-md-6 col-xl-4">
          <div class="card menu-item">
            <div class="card-header">
              <span class="food-title w-25">{$row['Item_name']}</span>
				<span class="food-cost float-right">{$row['Cost']}&euro;</span>
				<input type="hidden" class="food_code" name="id" value="{$row['id']}">
          </div>
            <div class="card-body">
              <span class="food-description">{$row['Description']}</span>
			</div>
			
            <div class="card-footer">
START;
		 
			if(isset($_SESSION['items'])){
				$item .= '<span class="btn float-right add-button">Add</span>';
			}
			$item .= '</div></div></div>';
			

            echo $item;
	}
}

function fetch_categories_with_items($categories){
	/* This function will query the database using the id from the array  get_categories returned. Meaning that for 4 categories, the database will
	queried for a total of 4 times. */

	for($i=0;$i< count($categories);$i++){
		$cat_name = $categories[$i][1];
		$displayed_cat =  <<<DELIMETER
		<div class="menu-card card d-block d-md-none mb-0 text-left ">
        <div class="card-header collapsed" data-toggle="collapse" data-target="#{$cat_name}" aria-expanded="False" >
          <a class="h3">
            {$cat_name}
          </a>
        </div>
      </div>
      <div class="row collapse flexlist" id="{$cat_name}">
        <div class="col-12 w-100  my-2 category_title d-none d-md-block">
          <span class="h3">{$cat_name}</span>
        </div>
	  
DELIMETER;
		echo $displayed_cat;
		get_category_items($categories[$i][0]);
		echo "</div>";
	}
	
}


/*************************************************Users functions********************************************/
function handle_login_mistake(){
	set_message("The combination of username and password is wrong!");
	redirect("register.php");
}

function login_user(){

	if(isset($_POST['login'])){
		
		$email = trim(escape_string($_POST['login_user_email']));
		$password = trim(escape_string($_POST['login_user_password']));
		echo $email;
		echo $password;
		if(empty($email) || empty($password)){
			set_message("This fields cannot be empty");
			redirect("register.php");
			return ; 
		}

		$query = query("SELECT * FROM customers WHERE user_email='{$email}'");

		confirm($query);
		
		

		if(count_rows($query) == 0){
			handle_login_mistake();
		}else{
			$row = fetch_array($query);
			$verified = password_verify($password, $row['user_password']);
			
			if($verified){
				$_SESSION['items'] = $row;
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
    $password= escape_string($arr['password']);
	
	
	
    
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    $query = 'INSERT INTO customers (username, user_first_name, user_last_name, user_email, user_password, user_role) ';
    $query .= "VALUES ('{$username}','{$first_name}','{$last_name}','{$email}', '{$hashed_password}', 'user')";

    $register_user = query($query);
    confirm($register_user);

	        
	    
}

/********************************************************AJAX FUNCTIONS *********************************************************/
/*
Ajax functions have something special. They do not have sessions in them, so in order to interact with databases, one needs to connect again and the session needs to be reopened.

*/




function get_user_cart(){
	if(isset($_POST['retrieve'])){
		require_once("config.php");

	$query = "SELECT cart_row,item_id FROM cart WHERE user={$_SESSION['items']['user_id']}";
	$result = mysqli_query($connection,$query);
	$item_ids = array();
	$table_data = array();
	while($row = fetch_array($result)){
		array_push($item_ids, [$row['item_id'], $row['cart_row']]);
	}
	$query = "SELECT Item_name,Description,Cost FROM items WHERE id=";
	for($i=0;$i<count($item_ids);$i++){
		$food_item = mysqli_query($connection, $query.$item_ids[$i][0]);
		$row = fetch_array($food_item);
		array_push($table_data, ["item_name"=>$row['Item_name'],"item_description"=>$row['Description'],"item_cost"=>$row['Cost'],"cart_id"=>$item_ids[$i][1]]);
	}
	echo json_encode($table_data);
}
}

get_user_cart();
function add_to_cart(){
	if(isset($_POST['code'])){
		require_once("config.php");
		
		
		$user = $_SESSION['items']['user_id'];
		$food_id= $_POST['code'];
		$query = "INSERT INTO cart (user,item_id) VALUES ({$user},{$food_id})";
		$submit_cart = mysqli_query($connection, $query);
		echo(mysqli_insert_id($connection));
	}
	
}
add_to_cart();

function delete_entry(){
	if(isset($_POST['del_code'])){
		require_once("config.php");

		$id = $_POST['del_code'];
	$query = "DELETE FROM cart WHERE cart_row = {$id}";
	$result = mysqli_query($connection, $query);
	}
}
delete_entry();


function confirmOrder(){
	if(isset($_POST['order'])){
		require_once("config.php");
		$form_list = array();
		$id = $_SESSION['items']['user_id'];
		$items = mysqli_real_escape_string($connection,json_encode($_POST['food_titles']));
		
		parse_str($_POST['formContents'],$form_list);
		
		$address = $form_list['address'];
		$floor = $form_list['floor'];
		$doorbell = $form_list['doorbell'];
		$telephone = $form_list['phone'];
		$comments = mysqli_real_escape_string($connection, $form_list['extraInfo']);

		$order_cost = $_POST['order_cost'];

		$query = "INSERT INTO orders (user_id,items_ordered,address,floor,telephone,comment,order_cost)";
		$query .= " VALUES({$id},'{$items}','{$address}','{$floor}','{$telephone}','{$comments}','{$order_cost}')";

		$result = mysqli_query($connection, $query);
		if($result){
			echo "success";
			$query = "DELETE FROM cart WHERE user={$id}";
			$result = mysqli_query($connection, $query);
		}
		else{
			die("QUERY FAILED: ". mysqli_error($connection));
		}
	
	
	}
}
confirmOrder();


/****************************************************************END OF AJAX FUNCTIONS***************************************************************** */
/********************************************************** PAGE FUNCTIONS *******************************************/
function fetch_orders(){
	$id = $_SESSION['items']['user_id'];

$query = "SELECT id,items_ordered,comment,order_status,order_cost FROM orders WHERE user_id={$id}";

$result = query($query);
$i= 1;
while($row= fetch_array($result)){
	$item = <<<ITEM
	
	<div class="card">
	
	  <div class="card-header" role="tab" id="heading{$i}">
		<a data-toggle="collapse" data-parent="#orders" href="#order{$i}" aria-expanded="false"
		  aria-controls="collapseOne1">
		  <h4 class="float-left">
		  	Order No # {$row['id']}
		  </h4>
		  <span class="float-right">STATUS: {$row['order_status']}</span>
		</a>
	  </div>
	  
	  <div id="order{$i}" class="collapse show" role="tabpanel" aria-labelledby="heading{$i}" data-parent="#orders">
		<div class="card-body">
		<span class="font-weight-bold"> Your ordered:   </span>
		<p>
			{$row['items_ordered']}
		  </p>
		  <p>Cost: <span class="font-weight-bold">{$row['order_cost']}</span>&euro;</p>
		</div>
	  </div>
	</div>
ITEM;
	echo $item;
	$i++;
}

}



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

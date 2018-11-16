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
		// echo "query succeeded~!";
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
/********************************HELPER FUNCTIONS END*************************/


/********************************* PRODUCTS FUNCTIONS ************************/
function get_products(){// function that fetches all the products from DB, then presents them using heredoc
	
	$query = query("SELECT * FROM products");
	confirm($query);

	while($row = fetch_array($query)){ 
		$short_desc = substr($row['product_short_desc'],0,50)."...";
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
function get_extra_panel(){

echo <<<STR
	<div class="col-sm-4 col-lg-4 col-md-4">
                        <h4><a href="#">Like this template?</a>
                        </h4>
                        <p>If you like this template, then check out <a target="_blank" href="http://maxoffsky.com/code-blog/laravel-shop-tutorial-1-building-a-review-system/">this tutorial</a> on how to build a working review system for your online store!</p>
                       
                    </div>
STR;

}
function get_categories(){
	$query = query("SELECT * FROM categories");
	

	confirm($query);

	while($row = fetch_array($query)){
		$category_links = <<<DELIMETER
		 <a href='category.php?id={$row['cat_id']}' class='list-group-item'>{$row['cat_title']}</a>
DELIMETER;
	echo $category_links;
	}

}


/********************************* PRODUCTS END ****************************/

/********************************* CATEGORIES FUNCTIONS*********************/
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

function login_user(){
	
	if(isset($_POST['submit'])){
		$username = escape_string($_POST['username']);
		$password = escape_string($_POST['password']);
		
		$query = query("SELECT username,user_password FROM users WHERE username='{$username}' AND user_password='{$password}'  ");

		confirm($query);

		if(count_rows($query) == 0){
			set_message("The combination of username and password is wrong!");
			redirect("login.php");
		}else{
			$_SESSION['username'] = $username;	
			redirect("admin/");
		}

	}

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




/***************************************************END of users' functions ***********************************/




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


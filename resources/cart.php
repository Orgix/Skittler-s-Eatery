<?php require_once("config.php"); 


 
    if(isset($_GET['add'])){

        $query = query("SELECT * FROM products WHERE product_id =".escape_string($_GET['add'])." ");
        confirm($query);

        while($row = fetch_array($query)){
            if($row['product_quantity'] != $_SESSION['product_'.$_GET['add']]){
                 $_SESSION['product_'.$_GET['add']] += 1;
                 redirect("../public/checkout.php");
            }else{
                set_message(" We only have ". $row['product_quantity']." {$row['product_title']} available");
                redirect("../public/checkout.php");
            }
        }
        
        // redirect("index.php");

    }

    if(isset($_GET['remove'])){
        if($_SESSION['product_'.$_GET['remove']] > 0){
            $_SESSION['product_'.$_GET['remove']] --;
            redirect("../public/checkout.php");
        }
        else{
            unset($_SESSION['item_total']);
            unset($_SESSION['quantity']);
            redirect("../public/checkout.php");
        }
    }


    if(isset($_GET['delete'])){
        $_SESSION['product_'.$_GET['delete']] = '0';
        unset($_SESSION['item_total']);
        unset($_SESSION['quantity']);
        redirect("../public/checkout.php");

    }




    function display_cart_items(){//TODO SESSIONS ISN'T always the wya to go. Make sure to implement a cart table in the database with the user's id and items. 

        /*This function will display all products saved in the SESSION */
       unset($_SESSION['quantity']);
       unset($_SESSION['item_total']);
       $item_name = 1;
       $item_number = 1;
       $amount = 1;
       $quantity = 1;
       $total = 0;
       $item_quantity = 0;
        foreach($_SESSION as $name => $value){

            if(substr($name, 0, 8) == "product_" && $value > 0){
                
                $length = strlen($name) - 8; 
                $id = substr($name, 8,$length);
                
                $query = query("SELECT * FROM products WHERE product_id=".escape_string($id)." ");
                confirm($query);


                
                while($row = fetch_array($query)){
                    $sub_total = $row['product_price'] * $value;
                    $item_quantity += $value;
                    $product = <<<PRODUCT
                    <tr>
                        <td>{$row['product_title']}</td>
                        <td>&#36;{$row['product_price']}</td>
                        <td>{$value}</td>
                        <td>&#36;{$sub_total}</td>
                        <td>
                            <a class='btn btn-success' href='../resources/cart.php?add={$row['product_id']}'>
                                <span class='glyphicon glyphicon-plus'></span>
                            </a>
                            <a class='btn btn-warning' href='../resources/cart.php?remove={$row['product_id']}'>
                                <span class='glyphicon glyphicon-minus'></span>
                            </a>
                            
                            <a class='btn btn-danger' href='../resources/cart.php?delete={$row['product_id']}'>
                                <span class='glyphicon glyphicon-remove'></span>
                            </a>
                        </td>
                    </tr>
                    <input type="hidden" name="item_name_{$item_name}" value="{$row['product_title']}">
                  <input type="hidden" name="item_number_{$item_number}" value="{$row['product_id']}">
                  <input type="hidden" name="amount_{$amount}" value="{$row['product_price']}">
                  <input type="hidden" name="quantity_{$quantity}" value="{$value}">
PRODUCT;
                    echo $product;
                    $item_name ++;
                    $item_number ++;
                    $amount ++;
                    $quantity++;
                }
               $_SESSION['item_total']  = $total += $sub_total;
               $_SESSION['quantity'] = $item_quantity;
            }
        }

        
    }


function display_paypal_button(){
    
    if(isset($_SESSION['quantity']) && $_SESSION['quantity'] >= 1){
        

    $paypal_button = <<<BUTTON
             <input type="image" name="upload"
    src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif"
    alt="PayPal - The safer, easier way to pay online">
BUTTON;
    return $paypal_button;
    }
}





function report(){
       $total = 0;
       $item_quantity = 0;
        foreach($_SESSION as $name => $value){

            if(substr($name, 0, 8) == "product_" && $value > 0){
                
                $length = strlen($name) - 8; 
                $id = substr($name, 8,$length);
                
                $query = query("SELECT * FROM products WHERE product_id=".escape_string($id)." ");
                confirm($query);


                
                while($row = fetch_array($query)){
                    $sub_total = $row['product_price'] * $value;
                    $item_quantity += $value;
                    
                
                }
               $total += $sub_total;
               $item_quantity;
            }
        }

}
?>
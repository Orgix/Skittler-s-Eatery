<?php require_once("../../resources/config.php"); ?>
<?php include(TEMPLATE_BACK.DS."header.php"); ?>
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      <nav id="sidebar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">
          <div class="avatar"><img src="img/mockup3.jpg" alt="..." class="img-fluid rounded-circle"></div>
          <div class="title">
            <h1 class="h5"><?php echo $_SESSION['items']['user_first_name']." ".$_SESSION['items']['user_last_name']; ?></h1>
          </div>
        </div>
        <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
        <ul class="list-unstyled">
                <li class="active"><a href="index.html"> <i class="icon-home"></i>Home </a></li>
                <li><a href="orders.php"> <i class="icon-grid"></i>Users' Orders </a></li>
        </ul>
      </nav>
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Welcome to Dashboard</h2>
          </div>
        </div>
        
        <div class="container-fluid">
          <div class="m-auto">
                

          <table class="table table-bordered table-responsive">
          <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Items</th>
                <th>Address</th>
                <th>Floor</th>
                <th>Telephone</th>
                <th>Comments</th>
                <th>Status</th>
                <th>Cost</th>
                <th colspan="2">Actions</th>
            </tr>
          </thead>
          <tbody>
        <?php 
            $query = "SELECT * FROM orders ORDER BY id DESC";
            $select_orders = query($query);
            while ($row = fetch_array($select_orders)){
                $order_id = $row['id'];
                $user_id =$row['user_id'];
                $items_ordered = $row['items_ordered'];
                $address = $row['address'];
                $floor = $row['floor'];
                $tel = $row['telephone'];
                $comments = $row['comment'];
                $status = $row['order_status'];
                $cost = $row['order_cost'];
                

                echo "<tr>";
                echo "<td>{$order_id}</td>";
                echo "<td>{$user_id}</td>";
                echo "<td>{$items_ordered}</td>";
                echo "<td>{$address}</td>";
                echo "<td>{$floor}</td>";
                echo "<td>{$tel}</td>";
                echo "<td>{$comments}</td>";
                echo "<td>{$status}</td>";
                echo "<td>{$cost}</td>";
                echo "<td><a href='orders.php?edit_id={$order_id}&status=Accepted'>Change to Accepted</a></td>";
                echo "<td><a href='orders.php?edit_id={$order_id}&status=Denied''>Deny</a></td>";


                // $query = "SELECT * FROM categories WHERE cat_id={$post_category_id}";
                // $select_categories = mysqli_query($connection, $query);
                // confirm($select_categories);

                // while($row = mysqli_fetch_assoc($select_categories)){
                //     $cat_title = $row['cat_title'];
                // }
                // echo "<td>{$cat_title}</td>";
                


                // echo "<td>{$post_status}</td>";
                // echo "<td><img src ='../images/{$post_image}' width='20' height='15' alt='image'></td>";
                // echo "<td>{$post_tags}</td>";
                // echo "<td>{$post_comment_count}</td>";
                // echo "<td>{$post_date}</td>";
                // echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";
                // echo "<td><a href='posts.php?delete={$post_id}'>Delete</a></td>";
                echo "</tr>";

            }

            ?>
            </tbody>
          </table>

              <?php 
                if(isset($_SESSION['items']) && $_SESSION['items']['user_role'] == 'Admin'){
                  
                    if(isset($_GET['edit_id'])){
                      $order_id =escape_string($_GET['edit_id']);
                      $status = escape_string($_GET['status']);
                      $query ="UPDATE orders SET order_status='{$status}' WHERE id=$order_id";

                      $admin_update_query = mysqli_query($connection, $query);
                      confirm($admin_update_query);
                      redirect("orders.php");
                    }
                  }
                
                
              
              ?>
          </div>
        </div>
        
        <footer class="footer">
          <div class="footer__block block no-margin-bottom">
            <div class="container-fluid text-center">
  
               <p class="no-margin-bottom">2019 &copy; Skittler's Eatery. All rights reserved.</p>
            </div>
          </div>
        </footer>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js"> </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/front.js"></script>
  </body>
</html>
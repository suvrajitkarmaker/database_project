<nav class="navbar navbar-expand bg-success navbar-dark sticky-top">
    <div class="container-fluid">
      <div class="col-md-3">
        <a class="navbar-brand" href="shop_front.php" id="logo-head"><img class="image" src="media/logo.png" alt="logo" style="width:60px;"></a>
      </div>
      <div class="col-md-5">
        <form class="form-inline" action="/action_page.php">
          <div class="input-group">
            <input class="form-control" type="text" placeholder="Search" id="search" size="100">
                <div class="input-group-btn">
                <button class="btn btn-light" type="submit">
                  <i class="fa fa-search" aria-hidden="true"></i>
                </button>
            </div>
          </div>
         </form>
      </div>
      <div class="col-md-4">
        <ul class="navbar-nav">
          <li class="nav-item"><a class="nav-link" href=""><i class="fa fa-question-circle" aria-hidden="true" id="nav-icon"></i> Help</a></li>


          <li class="nav-item">
            <div class="dropdown">
              <a href="" class="nav-link" data-toggle="dropdown"><i class="fa fa-user" aria-hidden="true" id="nav-icon"></i>  <?php if(isset($_SESSION["login"]) && $_SESSION["login"]==true)  echo $_SESSION["username"];else echo "Login";?>  <i class="fa fa-level-down"></i></a>


              <div class="dropdown-menu" style="border:1px solid black ;z-index: 1;">
              <?php

                if(isset($_SESSION["login"]) && $_SESSION["login"]==true){
                   $email=$_SESSION["email"];

                  $result = mysqli_query($conn, "SELECT image FROM userpic where email='$email'"); 
                        if(mysqli_num_rows($result) > 0 ){
                            while ($row = mysqli_fetch_array($result)) { 
                            echo '<div class="thumbnail"><img class="img-thumbnail" src="media/user/'.$row['image'].'" style="width: 60px;height: 60px; display: block;margin-left: auto;margin-right: auto;"><hr><div class="text-center"><a href="logout.php">Logout</a></div><div class="text-center"><a class="text-center" href="edit_profile.php" >Edit Profile</a></div>';
                            

                          }
                        }

                  
                }
                else{
                  
                  echo '<div class="thumbnail"><img class="img-thumbnail" src="media/profile.jpg" style="width: 60px;height: 60px; display: block;margin-left: auto;margin-right: auto;"><hr><div class="text-center"><a href="customer_login.php">Login</a></div><div class="text-center"><a class="text-center" href="user_regi.php" >Signup</a></div>';
                }
              ?>
            </div>
            </div>
          </li>
          <?php
           $oncart="oncart";
           $sql = "select * from cart where status='$oncart'";
           $result = mysqli_query($conn,$sql);
           $number = mysqli_num_rows($result);
          ?>


          <li class="nav-item"><?php if(isset($_SESSION["login"])){
            if($number>0){
              echo '<button type="button" class="modal_btn nav-link" data-toggle="modal" data-target="#fullcart"><i class="fa fa-shopping-cart" id="nav-icon" aria-hidden="true"></i> Cart  <span class="badge badge-light">'.$number.'</span></a>';
            }
            else{
              echo '<button type="button" class="modal_btn nav-link" data-toggle="modal" data-target="#emptycart"><i class="fa fa-shopping-cart" id="nav-icon" aria-hidden="true"></i> Cart  <span class="badge badge-light"></span></button>';
            }
          }
          else{
          echo '<button type="button" class="modal_btn nav-link" data-toggle="modal" data-target="#falselogin"><i class="fa fa-shopping-cart" id="nav-icon" aria-hidden="true"></i> Cart  <span class="badge badge-light"></span></button>'; 
        }?></li>
          
        </ul>
      </div>
    </div>  
  </nav>
  <!--------------------------------------------Navbar end-------------------------------------------------->

  <!-- The Modal -->
<div class="modal fade" id="falselogin">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title"><i class="fa fa-shopping-cart" id="nav-icon" aria-hidden="true"></i> Shopping Cart</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       <h5 class="text-center">Log in to see your cart list.</h5>
      </div>
      <button class="btn btn-block btn-secondary text-light" value="refresh"><a href="customer_login.php" class="text-light">Login</a></button>
     

    </div>
  </div>
</div>


<div class="modal fade" id="fullcart">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title"><i class="fa fa-shopping-cart" id="nav-icon" aria-hidden="true"></i> Shopping Cart</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <!-------------->
      <div class="d-flex d-flex justify-content-center align-items-center" style="margin: 1px solid black">
           <table class="table table-bordered table-sm" style="margin-bottom: 50px;">
              
                <tr class="t_head">
                  <th>Status</th>
                  <th>Product Name</th>
                  <th>Price</th>
                  <th>Unit</th>
                  <th>Total Price</th>
                </tr>

                <?php
                $total_price=0;

                while ($row = mysqli_fetch_array($result)) {
                $productname = $row['productname'];
                $price = $row['price'];
                $quantity=$row['quantity'];

            ?>
                
                <tr class="t_content">
                  <td><button>Remove</button></td>
                  <td><?php echo $productname  ?></td>
                  <td><?php echo $price ?><span style="font-size: 20px;"> ৳</span></td>
                  <td><?php echo  $quantity ?></td>

                  <td><?php echo $price = $price*$quantity ?><span style="font-size: 20px;"> ৳</span></td>
                </tr>
                <?php $total_price +=$price   ?>

              <?php
              }
              ?>

                <tr class="footer">
                  <td colspan="4"> Amount have to pay(Ex. Without Delivary charge):</td>
                  <td><?php echo $total_price  ?><span style="font-size: 20px;"> ৳</span></td>
                </tr>
             
            </table>

        </div>
        <button class="btn btn-block btn-secondary text-light" value="refresh"><a href="" class="nav-link text-light">Refresh</a></button>
        <button class="btn btn-block btn-success text-light" value="refresh"><a href="payment.php" class="nav-link text-light">Go to Payout Process</a></button>
      <!-------------->
      </div>

      <!-- Modal footer -->
    

    </div>
  </div>
</div>
<div class="modal fade" id="emptycart">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title"><i class="fa fa-shopping-cart" id="nav-icon" aria-hidden="true"></i> Shopping Cart</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       <h5 class="text-center">Your Cart is Empty</h5>
      </div>

      

    </div>
  </div>
</div>
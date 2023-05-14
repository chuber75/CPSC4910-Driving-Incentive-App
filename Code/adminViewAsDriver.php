<?php
require_once "Database/config.php";

$org_name = "No Organization";
$org_desc = "";
$points = 0;

// if($_SERVER['REQUEST_METHOD'] == 'POST'){
//    $_SESSION['org_id'] = $_POST['org_id'];
// }


$conversionRate = 100;

// $query = "SELECT * FROM organizations WHERE org_id = {$_SESSION['org_id']}";
// 		  $result = mysqli_query($con, $query);
		//   $conversionRate = 100.00;
		//   if(is_object($result)){
		//      $row = $result->fetch_assoc();
		//      $conversionRate = $row['pointToDollar'];

   $org_name = 'Test Organization Name';
   $org_desc = 'Test Organization Description';
   $points = 100;

?>
<!DOCTYPE html>
<html>
   <head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Home</title>
   <link rel="stylesheet" href="css/driver_home_style.css">
   <script src="js/driver_home_page.js"></script>
</head>
<body>
   <nav class="nav_default">
      <ul class="nav_listing">
         <div class="navbox">
            <img src="resources/Logo.png">
            <li><a href="home_page.php">Home</a></li>
            <li><a href="profile_page.php">Profile</a></li>
            <li><a href="html/faq.html">FAQ</a></li>
            <li><a href="driver_applications_page.php">Apply</a></li>
            <li><a href="logout.php">Logout</a></li>
	    <li><a href="wishlist.php">Wishlist</a></li>
            <li style="margin-left:auto;">
               <form action="driver_home_page.php" method="POST">
                  <select name="org_id" onchange="this.form.submit()">
                     <option value="none" selected disabled hidden>Change Organization</option>
                     <?php
                        // $result = mysqli_query($con, "SELECT org_id from driver_to_org where driver_id = {$_SESSION['id']}");
                        // for($i = 0; $i<$result->num_rows;$i++){
                        //    $id = $result->fetch_assoc()['org_id'];
                        //    $name = mysqli_query($con, "SELECT org_name from organizations where org_id = {$id}")->fetch_assoc()['org_name'];
                           echo("<option value=\"7\">Test Name</option>");
                        // }
                     ?>
                  </select>
               </form>
            </li>
            <li><button onclick="myFunction()">Toggle dark mode</button><script>
               function myFunction() {
                  var element = document.body;
                  element.classList.toggle("dark-mode");
               }
            </script>
            </li>
         </div>
      </ul>
   </nav>

   <h1>My Organization: <?php echo('Organization Name');?></h1>
   <h2><?php echo("Organization Description");?></h2>



   <div class="content">

      <div class="base">
         <label class="indent" id="user_points">My Points: <?php echo '100';?></label>
         <div id="point_history" class="scroll_box">
            <ul id="point_history_listing" class="scroll_list">
               <?php
            //    if(isset($_SESSION['id'])){
            //       $point_result = mysqli_query($con, "SELECT * from points where driver_id = ${_SESSION['id']} and org_id = ${_SESSION['org_id']}");
            //       for($i = 0; $i < $point_result->num_rows; $i++){
            //          $row = $point_result->fetch_assoc();
                     echo("<li class=\"point_history_entry\"><p>Points: 'Amount Change'</p><button>Details</button><br><p>Timestamp: Timestamp</p><p style=\"display:none;\"><br><br>'Description'</p></li>");
               ?>
            </ul>
         </div>
      </div>







      <div class="base">
         <label class="indent">My Catalog: </label>
            <button onclick="filterLow()">Price: Low to High</button>
            <button onclick="filterHigh()">Price: High to Low</button>
            <button onclick>Popularity</button>
         <div id="catalog" class="scroll_box">
            <ul id="catalog_listing" class="scroll_list">

            </ul>
         </div>
      </div>

      <div class="base" id="cartBox">
         <label class="indent">My Cart: </label>
         <button onclick>Place Order</button>
         <button onclick="clearCart()">Clear Cart</button>
         <div id="cart_content" class="scroll_box">
            <ul id="cart_listing" class="scroll_list">
               
            </ul>
         </div>
      </div>

      <div class="base" id="orderBox">
         <label class="indent">My Orders: </label>
         <div id="order_content" class="scroll_box">
            <ul id="order_listing" class="scroll_list">
              
	      <?php

	      //get org_id from SESSION['user_id']
        // $email = $_SESSION['email'];
	        //find the organization id that sponsor is in based on his email
  		// $query = "SELECT driver_id FROM drivers WHERE email = '$email'";
  		// $result = mysqli_query($con, $query);

 		//snatch that org_id if it exists...
  		// if(is_object($result)){
    	// 	  if($result->num_rows === 1){
      	// 	     $row = $result->fetch_assoc();
		//      $driver_id = $row['driver_id'];	
		//   }
		// }
		
		// $query = "SELECT org_id FROM driver_to_org WHERE driver_id = '$driver_id'";
  		// $result = mysqli_query($con, $query);

 		//snatch that org_id if it exists...
  		// if(is_object($result)){
    	// 	  for($x = 0; $x < ($result->num_rows); $x++){
      	// 	     $row = $result->fetch_assoc();
		//      if($_SESSION['org_id'] == $row['org_id']){
		//         $org_id = $row['org_id'];	
		//      }
		//   }
		// }

		// $query = "SELECT catalog_id FROM catalog WHERE org_id = '$org_id'";
  		// $result = mysqli_query($con, $query);

 		//snatch that org_id if it exists...
  		// if(is_object($result)){
    	// 	  if($result->num_rows === 1){
      	// 	     $row = $result->fetch_assoc();
		//      $catalog_id = $row['catalog_id'];	
		     echo '1234';
		//   }
		// }

		// $query = "SELECT pointToDollar FROM organizations WHERE org_id = '$temp_org_id'";
		// $result = mysqli_query($con, $query);
		$pointRate = 0;
		// if(is_object($result)){
		// 	if($result->num_rows === 1){
		// 	$row = $result->fetch_assoc();
		// 	$pointRate = $row['pointToDollar'];

// 	}
// }


	        //get list of products from corresponding catalog_id
		$query = "SELECT * FROM products WHERE catalog_id = '$catalog_id'";
  		$result = mysqli_query($con, $query);

 		//snatch that org_id if it exists...
  		if(is_object($result)){
		  //echo $result->num_rows;
    		  for($x = 0; $x < ($result->num_rows); $x++){
		     $res = $result->fetch_assoc();
		     //echo "test";
		     $img_src = $res['image_src'];
		     $title = $res['title'];

		     $points = $res['points'] * $conversionRate;
		     echo "
			<script type='text/javascript'>
				addCatalogElement('$img_src', '$points', '$title', 10)	      		
			</script>
			";

		  }
		}

	      
	      ?>

            </ul>
         </div>
      </div>



   </div>
</body>
</html>
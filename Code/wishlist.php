<?php
require_once "Database/config.php";

$org_name = "No Organization";
$org_desc = "";
$points = 0;

if($_SERVER['REQUEST_METHOD'] == 'POST'){
   $_SESSION['org_id'] = $_POST['org_id'];
}

if(isset($_SESSION['org_id'])){
   $result = mysqli_query($con, "SELECT org_name, org_desc from organizations where org_id = ${_SESSION['org_id']}")->fetch_assoc();
   $org_name = $result['org_name'];
   $org_desc = $result['org_desc'];
   $points = mysqli_query($con, "SELECT curr_points from driver_to_org where driver_id = ${_SESSION['id']} and org_id = ${_SESSION['org_id']}")->fetch_assoc()['curr_points'];
}

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
            <li><a href="driver_applications_page.php">Apply</a></li>
            <li><a href="html/faq.html">FAQ</a></li>
            <li><a href="logout.php">Logout</a></li>
            <li><a href="#settings">Settings</a></li>
	    <li><a href="wishlist.php">Wishlist</a></li>
            <li style="margin-left:auto;">
               <form action="driver_home_page.php" method="POST">
                  <select name="org_id" onchange="this.form.submit()">
                     <option value="none" selected disabled hidden>Change Organization</option>
                     <?php
                        $result = mysqli_query($con, "SELECT org_id from driver_to_org where driver_id = {$_SESSION['id']}");
                        for($i = 0; $i<$result->num_rows;$i++){
                           $id = $result->fetch_assoc()['org_id'];
                           $name = mysqli_query($con, "SELECT org_name from organizations where org_id = {$id}")->fetch_assoc()['org_name'];
                           echo("<option value=\"{$id}\">$name</option>");
                        }
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

   <h1>My Organization: <?php echo("$org_name");?></h1>
   <h2><?php echo("$org_desc");?></h2>



   <div class="content">
      <div class="base">
         <label class="indent">My Wishlist: </label>
         <div id="catalog" class="scroll_box">
            <ul id="catalog_listing" class="scroll_list">
               
            </ul>
         </div>
      </div>
   </div>
</body>
</html>
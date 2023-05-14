<?php
// Initialize the session
 
// Include config file
 require_once "Database/config.php";
   $target_email = "";
   $target_first_name = "";
   $target_last_name = "";
   $target_active = "";
   $target_role = "";
   $target_sq_1 = "";
   $target_sa_1 = "";
   $target_sq_2 = "";
   $target_sa_2 = "";
   $target_sq_3 = "";
   $target_sa_3 = "";

if(($_SESSION['role'] != 'admin' AND $_SESSION['role'] != 'sponsor') OR $_SERVER['REQUEST_METHOD'] != "POST"){
   header("location: home_page.php");
}

if($_SERVER['REQUEST_METHOD'] == "POST"){
   $target_id = $_POST["user_id"];
   $target_email = mysqli_query($con, "SELECT email from users where user_id = $target_id")->fetch_assoc()['email'];
   $target_first_name = "";
   $target_last_name = "";
   $target_active = "";
   $target_role = "";
   $target_sq_1 = "";
   $target_sa_1 = "";
   $target_sq_2 = "";
   $target_sa_2 = "";
   $target_sq_3 = "";
   $target_sa_3 = "";
  
   
  $firstnameQuery = "SELECT first_name FROM users WHERE email = '$target_email'";
  $result = mysqli_query($con, $firstnameQuery);
  if (is_object($result)) {
     if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $target_first_name = $row['first_name'];
        if(!result){
           http_response_code(404);
           die(mysqli_error($con));
     }
     }
  }
   
  $lastnameQuery = "SELECT last_name FROM users WHERE email = '$target_email'";
   $result = mysqli_query($con, $lastnameQuery);
   if (is_object($result)) {
     if ($result->num_rows === 1) {
         $row = $result->fetch_assoc();
         $target_last_name = $row['last_name'];
         if(!result){
           http_response_code(404);
           die(mysqli_error($con));
       }
     }
  }
  
  $roleQuery = "SELECT role FROM users WHERE email = '$target_email'";
   $result = mysqli_query($con, $roleQuery);
   if (is_object($result)) {
     if ($result->num_rows === 1) {
         $row = $result->fetch_assoc();
         $target_role = $row['role'];
         if(!result){
           http_response_code(404);
           die(mysqli_error($con));
       }
     }
  }
  
  $activeQuery = "SELECT active FROM users WHERE email = '$target_email'";
   $result = mysqli_query($con, $activeQuery);
   if (is_object($result)) {
     if ($result->num_rows === 1) {
         $row = $result->fetch_assoc();
         $target_active = $row['active'];
         if(!result){
           http_response_code(404);
           die(mysqli_error($con));
       }
     }
  }
  
  $security1QuestionQuery = "SELECT security_question1 FROM users WHERE email = '$target_email'";
   $result = mysqli_query($con, $security1QuestionQuery);
   if (is_object($result)) {
     if ($result->num_rows === 1) {
         $row = $result->fetch_assoc();
         $target_sq_1 = $row['security_question1'];
         if(!result){
           http_response_code(404);
           die(mysqli_error($con));
       }
     }
  }
  
  $security1AnswerQuery = "SELECT security_answer1 FROM users WHERE email = '$target_email'";
   $result = mysqli_query($con, $security1AnswerQuery);
   if (is_object($result)) {
     if ($result->num_rows === 1) {
         $row = $result->fetch_assoc();
         $target_sa_1 = $row['security_answer1'];
         if(!result){
           http_response_code(404);
           die(mysqli_error($con));
       }
     }
  }

  $result = mysqli_query($con, "SELECT security_question2 FROM users WHERE email = '$target_email'");
   if (is_object($result)) {
     if ($result->num_rows === 1) {
         $row = $result->fetch_assoc();
         $target_sq_2 = $row['security_question2'];
         if(!result){
           http_response_code(404);
           die(mysqli_error($con));
       }
     }
  }

  $result = mysqli_query($con, "SELECT security_answer2 FROM users WHERE email = '$target_email'");
   if (is_object($result)) {
     if ($result->num_rows === 1) {
         $row = $result->fetch_assoc();
         $target_sa_2 = $row['security_answer2'];
         if(!result){
           http_response_code(404);
           die(mysqli_error($con));
       }
     }
  }

  $result = mysqli_query($con, "SELECT security_question3 FROM users WHERE email = '$target_email'");
   if (is_object($result)) {
     if ($result->num_rows === 1) {
         $row = $result->fetch_assoc();
         $target_sq_3 = $row['security_question3'];
         if(!result){
           http_response_code(404);
           die(mysqli_error($con));
       }
     }
  }

  $result = mysqli_query($con, "SELECT security_answer3 FROM users WHERE email = '$target_email'");
   if (is_object($result)) {
     if ($result->num_rows === 1) {
         $row = $result->fetch_assoc();
         $target_sa_3 = $row['security_answer3'];
         if(!result){
           http_response_code(404);
           die(mysqli_error($con));
       }
     }
  }
  
  mysqli_close($con); 
}
  ?>
  <!DOCTYPE html>
     <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>profile</title>
        <link rel="stylesheet" href="css/profile_style.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
        rel="stylesheet">
      <script>
         function submit_callback(){
            let error_message = "";
            let fname = document.getElementById("txtFirstName").value;
            let lname = document.getElementById("txtLastName").value;
            let s_a_1 = document.getElementById("txtAnswer1").value;
            let s_a_2 = document.getElementById("txtAnswer2").value;
            let s_a_3 = document.getElementById("txtAnswer3").value;
            let pword = document.getElementById("password").value;
            let c_pword = document.getElementById("confirm_password").value;

            if(fname.length == 0){
               error_message += "First name can't be blank!<br>";
            }
            if(lname.length == 0){
               error_message += "Last name can't be blank!<br>";
            }
            if(s_a_1.length == 0){
               error_message += "Must provide a security question answer!<br>";
            }
            if(s_a_2.length == 0){
               error_message += "Must provide a security question answer!<br>";
            }
            if(s_a_3.length == 0){
               error_message += "Must provide a security question answer!<br>";
            }
            if(pword != c_pword){
               error_message += "Passwords don't match!<br>";
            }

            if(error_message.length == 0){
               document.forms["manage_user_form"].submit();
            }
            else{
               document.getElementById("error_output").innerHTML = error_message;
            }
         }
      </script>
     </head>
     <body>
        <nav class="nav_default">
           <ul class="nav nav_listing">
              <div class="image"><img src="resources/Logo.png">
              <li><a href="home_page.php">Home</a></li>
              <li><a href="profile_page.php">Profile</a></li>
              <li><a href="faq.html">FAQ</a></li>
              <li><a href="catalog.php">Catalog</a></li>
              <li><a href="logout.php">Logout</a></li>
              <!-- <li> -->
                 <button type = "button" class="icon-button">
                    <span class = "material-icons">notifications</span>
                    <span class = "icon-button__badge">2</span>
                 </button>
              <!-- </li> -->
              </div>
           </ul>
        </nav>
        <div class="card">
           <form action="/update_user.php" method=post id="manage_user_form">
           <label class="indent">First Name </label><p class="card_detail">
              <input type="text" name="txtFirstName" id="txtFirstName" value="<?php echo $target_first_name;?>">
           </p>
           <label class="indent">Last Name </label><p class="card_detail">
              <input type="text" name="txtLastName" id="txtLastName" value="<?php echo $target_last_name;?>">
           </p>
           <label class="indent">Role </label><p class="card_detail">
              <input type="text" name="txtRole" id="txtRole" value="<?php echo $target_role;?>" readonly>
           </p>
           <label class="indent">Active </label><p class="card_detail">
              <input type="text" name="txtRole" id="txtRole" value="<?php echo $target_active ? "yes" : "no";?>" readonly>
           </p>
           </br>
           <label class="indent">Email </label><p class="card_detail"> 
              <input type="text" name="txtEmail" id="txtEmail" value="<?php echo $target_email;?>" readonly>
           </p>
           </br>
           <label class="indent">Security Question #1 </label><p class="card_detail">
              <input type="text" name="txtSecurity1" id="txtSecurity1" value="<?php echo $target_sq_1;?>" readonly>
           </p>
           <label class="indent">Security Answer #1 </label><p class="card_detail">
              <input type="text" name="txtAnswer1" id="txtAnswer1" value="<?php echo $target_sa_1;?>">
           </p>
           </br>
           <label class="indent">Security Question #2 </label><p class="card_detail">
              <input type="text" name="txtSecurity2" id="txtSecurity2" value="<?php echo $target_sq_2;?>" readonly>
           </p>
           <label class="indent">Security Answer #2 </label><p class="card_detail">
              <input type="text" name="txtAnswer2" id="txtAnswer2" value="<?php echo $target_sa_2;?>">
           </p>
           </br>
           <label class="indent">Security Question #3 </label><p class="card_detail">
              <input type="text" name="txtSecurity3" id="txtSecurity3" value="<?php echo $target_sq_3;?>" readonly>
           </p>
           <label class="indent">Security Answer #3 </label><p class="card_detail">
              <input type="text" name="txtAnswer3" id="txtAnswer3" value="<?php echo $target_sa_3;?>">
           </p>
           </br>
           <input type="password" name="password" id="password" placeholder="New Password" value="">
            <span class="invalid-feedback"><?php echo $password_err; ?></span>
            
            <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password" value="">
            <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
           </br>
               <input type="text" name="managed_call" value="1" style="display:none;">
           </form>

           <button id="submit_button" onclick="submit_callback()">Submit Changes</button>

           <p id="error_output"></p>
        </div>
     </body>
  
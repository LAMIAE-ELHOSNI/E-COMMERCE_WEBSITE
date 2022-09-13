<?php
require ("connectDB.php");
require ("function.php");
if(isset($_POST['login'])){
   $username= get_safe_value($con,$_POST['username']) ;
   $password= get_safe_value($con,$_POST['password']);
   $querysql="select * from admin_users where username='$username' and password='$password'";
   $res=mysqli_query($con,$querysql);
   $coun=mysqli_num_rows($res);
   if($coun==1){
      $_SESSION['admin_login']="yes";
      $_SESSION['admin_username']=$username;
      header("Location:category.php");
      die();
      // $msg="<div class='btn btn-success'>LOGIN WITHE SUCCESS</div>";
   }else{
        $msg="<div class='btn btn-danger'>USERNAME OR PASSWORD NOT CORRECT</div>";
   }
}
?>
<!doctype html>
<html class="no-js" lang="">
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Login Page</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="assets/css/normalize.css">
      <link rel="stylesheet" href="assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="assets/css/font-awesome.min.css">
      <link rel="stylesheet" href="assets/css/themify-icons.css">
      <link rel="stylesheet" href="assets/css/pe-icon-7-filled.css">
      <link rel="stylesheet" href="assets/css/flag-icon.min.css">
      <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
      <link rel="stylesheet" href="assets/css/style.css">
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
   </head>
   <body class="bg-dark">
      <div class="sufee-login d-flex align-content-center flex-wrap">
         <div class="container">
            <div class="login-content">
               <div class="login-form mt-150">
               <div style="margin-top:5px;"></div>
               <div><?php if(isset($_POST['login'])){echo $msg;}; ?></div>                 
                  <form method="POST">
                     <div class="form-group">
                        <label>username</label>
                        <input type="text" name="username" class="form-control" placeholder="username" require>
                     </div>
                     <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password" require >
                     </div>
                     <button type="submit" name="login" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
					</form>
               </div>
            </div>
         </div>
      </div>
      <script src="assets/js/vendor/jquery-2.1.4.min.js" type="text/javascript"></script>
      <script src="assets/js/popper.min.js" type="text/javascript"></script>
      <script src="assets/js/plugins.js" type="text/javascript"></script>
      <script src="assets/js/main.js" type="text/javascript"></script>
   </body>
</html>
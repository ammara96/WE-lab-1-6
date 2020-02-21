<?php  
session_start();
if(isset($_SESSION["admin_name"]))
{
 header("location:Lab12CookiesPage2.php");
} 
if(isset($_POST["login"]))   
{  
 if(!empty($_POST["name"]) && !empty($_POST["password"]))
 {
  $name = $_POST["name"]; 
  $password = $_POST["password"];  
   if(!empty($_POST["remember"]))   
   {  
    setcookie ("login", $name, time()+ (7 * 24 * 60 * 60));  
    setcookie ("password", $password, time()+ (7 * 24 * 60 * 60));
    $_SESSION["admin_name"] = $name;
   }  
   else  
   {  
    if(isset($_COOKIE["login"]))   
    {  
     setcookie ("login","");  
    }  
    if(isset($_COOKIE["password"]))   
    {  
     setcookie ("password","");  
    }  
   }  
    header("location:Lab12CookiesPage2.php");  
 }

  /* }  
  else  
  {  
   $message = "Invalid Login";  
  }  */
 
 else
 {
  $message = "Both are Required Fields";
 }
}  
 ?>  
<html>  
 <head>  
  <title>Lab 12 Task 2 Cookies </title>  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
  <style>  
  body  
  {  
   margin:0;  
   padding:0;  
   background-color:#f1f1f1;  
  }  
        .box  
        {  
   width:700px;  
   padding:20px;  
   background-color:#fff;  
  }  
  </style>  
 </head>  
 <body>  
  <div class="container box">  
   <form action="" method="post" id="frmLogin"> 
    <h3 align="center">Form </h3><br />
    <div class="text-danger"><?php if(isset($message)) { echo $message; } ?></div>  
    <div class="form-group">  
     <label for="login">Username</label>  
     <input name="name" type="text" value="<?php if(isset($_COOKIE["login"])) { echo $_COOKIE["login"]; } ?>" class="form-control" />  
    </div>  
    <div class="form-group">  
     <label for="password">Password</label>  
     <input name="password" type="password" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>" class="form-control" />   
    </div>  
    <div class="form-group">  
     <input type="checkbox" name="remember" <?php if(isset($_COOKIE["login"])) { ?> checked <?php } ?> />  
     <label for="remember-me">Remember me</label>  
    </div>  
    <div class="form-group">  
     <div><input type="submit" name="login" value="Login" class="btn btn-success"></span></div>  
    </div>   
   </form>  
   <br />  
  </div>  
 </body>  
</html>
 
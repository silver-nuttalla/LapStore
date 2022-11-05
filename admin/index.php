<?php
include("config/database.php");//connect to mysql
extract($_POST);
if(isset($login))
{
    //sql injection 
$email=mysqli_real_escape_string($link,htmlentities(trim($email)));
$pass=mysqli_real_escape_string($link,htmlentities(trim($pass)));

    $pass= $pass;//convert into md5
    //fetch email or pass
    $sel=mysqli_query($link,"select email,password from admin where email='$email'");
    $arr=mysqli_fetch_assoc($sel);
    if($email===$arr['email'] && $pass===$arr['password'])
    {
        session_start();//session start
        $_SESSION['sid']=$email;//session create
        header("location:dashboard.php");//redirect
    }
    else
    {
        $msg="Email or pass is not correct";
    }
}
?>
<!doctype html>
<html>
    <head>
        <link rel="stylesheet" href="css/bootstrap.css"/>
        <script src="js/bootstrap.js"></script>
    </head>
    <body>
        <main>
     <header class="jumbotron">
        <h1 class="text-center">Admin Panel</h1>
    </header>
    <section class="container">
       <form method="post">
       <?php
      if(isset($msg))
      {
        ?>
  <label class="alert alert-danger"><?= $msg;?></label>
        <?php
      }
       ?>
    <div class="form-group">
        <label>Email :</label>
        <input type="text" name="email" class="form-control" required/>
    </div>
    <div class="form-group">
        <label>Password :</label>
        <input type="password" name="pass" class="form-control" required/>
    </div>
    <div class="form-group">
        
        <input type="checkbox" name="c1"/>
        <label>Remember Me</label>
    </div>
    <input type="submit" value="Login" name="login" class="btn btn-success" />
    <input type="reset" value="Reset" class="btn btn-danger"/>
      </form>
    </section>
        </main>
    </body>
</html>
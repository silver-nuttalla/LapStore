<?php
include("config/database.php");//connect to mysql
session_start();
$sid=$_SESSION['sid'];//read session
//for blank session
if($sid=="")
{
  header("location:index.php");
}
?>
<!doctype html>
<html>
    <head>
        <link rel="stylesheet" href="css/bootstrap.css"/>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="js/bootstrap.js"></script>
    </head>
    <body>
        <main>
        <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Admin Panel</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="?con=cp">Change Password</a></li>
      <li><a href="#">Page 2</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> Welcome : <?= $sid;?></a></li>
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>
  </div>
</nav>
        </main>
        <section class="container">
        <aside class="col-sm-4">
            <div class="list-group">
  <a href="?con=category" class="list-group-item active">Category</a>
  <a href="?con=product" class="list-group-item">Products</a>
  <a href="#" class="list-group-item">Orders</a>
  <a href="#" class="list-group-item">Feedback</a>
</div>
        </aside>
        <aside class="col-sm-8">
             <?php
  switch(@$_GET['con'])
  {
 case 'category' : include('category.php');
       break;
case 'product' : include('product.php');
       break;
case 'cp' : include('cp.php');
       break;
       case 'edit' : include('editcat.php');
       break;
  }
         ?>
        </aside>
            </section>
    </body>
</html>
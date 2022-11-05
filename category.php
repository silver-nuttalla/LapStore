
<!DOCTYPE HTML>
<html>
	<head>
		<title>Mobilestore Website Template | Home :: W3layouts</title>
		<link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
		<meta name="keywords" content="Mobilestore iphone web template, Android web template, Smartphone web template, free webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
		<link href='//fonts.googleapis.com/css?family=Londrina+Solid|Coda+Caption:800|Open+Sans' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="css/responsiveslides.css">
		<script src="js/jquery.min.js"></script>
		<script src="js/responsiveslides.min.js"></script>
		  <script>
		    // You can also use "$(window).load(function() {"
			    $(function () {
			
			      // Slideshow 1
			      $("#slider1").responsiveSlides({
			        maxwidth: 1600,
			        speed: 600
			      });
			});
		  </script>
	</head>
	<body>
   <?php include("header.php");
   $cat=$_GET['cat'];
   ?>
   <?php include("slider.php");?>
	 <div class="clear"> </div>	
	 <div class="wrap">				    	
<div class="content-grids">
  <h4><?= $cat;?> Product</h4>
		    	<div class="section group">
			<?php
	$sel=mysqli_query($link,"select * from mobiles where cat='$cat'");
	while($arr=mysqli_fetch_assoc($sel))
	{
		?>
       <div class="grid_1_of_4 images_1_of_4 products-info">
					 <a href="productdetails.php?pid=<?= $arr['pid'];?>">
					 <img src="admin/images/<?= $arr['iname'];?>">
					 </a>
					 <a href="category.php?cat=<?= $arr['cat'];?>"><?= $arr['cat'];?></a>
					 <h3 style="text-decoration:line-through">Rs.<?= $arr['price'];?></h3>
					  <h3>Rs.<?= $arr['price']-(($arr['price']*$arr['disc'])/100);?></h3>
					 <ul>
					 	<li><a  class="cart" href="single.html"> </a></li>
					 	<li><a  class="i" href="productdetails.php?pid=<?= $arr['pid'];?>"> </a></li>
					 	
					 </ul>
				</div>
		<?php
	}
		?>		
				</div>
</div>
</div>
	<?php include("sidebar.php");?>
</div>
</div>
	 <div class="clear"> </div>
 </div>
		<?php include("footer.php");?>
	</body>
</html>


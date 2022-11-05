<?php
include('admin/config/database.php');
session_start();
$sidd=session_id();
?>
<script>
  $(document).ready(function()
  {
	  $("#serr").click(function()
	  {
		  var ser=$("#ser").val();
		  if(ser!="")
		  {
			  location.href='search.php?ser='+ser;
		  }
	  })
  })
</script>
<div class="wrap">
		<!----start-Header---->
		<div class="header">
			<div class="search-bar">
				
					<input type="text" id="ser">
					<input type="button" value="Search" id="serr" />
				
			</div>
			<div class="clear"> </div>
			<div class="header-top-nav">
				<ul>
					
					<li><a href="checkout.php">Checkout</a></li>
					<li><a href="checkout.php">
					<?php
					$sel=mysqli_query($link,"select * from tempcart where sid='$sidd' and purchase=0");
					$item=mysqli_num_rows($sel);
					?>
					<span>shopping cart&nbsp;&nbsp;: </span></a><label> &nbsp;<?= $item;?></label></li>
				</ul>
			</div>
			<div class="clear"> </div>
		</div>
		</div>
		<div class="clear"> </div>
		<div class="top-header">
			<div class="wrap">
		<!----start-logo---->
			<div class="logo">
				<a href="index.php"><h1>Lap <span>Store</span></h1></a>
			</div>
		<!----end-logo---->
		<!----start-top-nav---->
		<div class="top-nav">
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="aboutus.php">About</a></li>
				
				<li><a href="contact.php">Contact</a></li>
			</ul>
		</div>
		<div class="clear"> </div>
		</div>
		</div>
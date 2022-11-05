<script>
 $(document).ready(function()
 {
	 $(".delcart").click(function()
	 {
		 pid=$(this).attr('piid');
		 quan=$(this).attr('quann');
		 $.post('admin/api.php',{sumit:pid,rahul:quan},function(res)
		 {
           alert(res);
		   $('body').load('index.php');
		 })
	 })
 })
</script>

		    	<h4>Deals of the day</h4>
		    	<div class="section group">

			<?php
	$sel=mysqli_query($link,"select * from mobiles order by dat desc limit 6");
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
					 	<li><a  class="cart delcart" href="javascript:void()" piid="<?= $arr['pid'];?>" quann=1> </a></li>

					 	<li><a  class="i" href="productdetails.php?pid=<?= $arr['pid'];?>"> </a></li>
					 	
					 </ul>
				</div>
		<?php
	}
		?>		
				

				<!-- end -->


			</div>
	





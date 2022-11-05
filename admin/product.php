<?php
extract($_POST);
if(isset($sub))
{
   $tmp=$_FILES['att']['tmp_name'];
   $fn=$_FILES['att']['name'];
   $tmp = explode('.', $fn);
   $ext = end($tmp);

   if($ext=="jpg" || $ext=="png")
   {
     $iname=rand().".$ext";
     $pid="Mob".rand();
     if(mysqli_query($link,"INSERT INTO mobiles (pid, cat, mname,price,quan,disc ,pross,os,ram,rom,camera,display,battery,color,warrenty,iname)
        VALUES ('$pid','".$_POST["cat"]."','".$_POST["mname"]."' , '".$_POST["price"]."', '".$_POST["quan"]."', 
        '".$_POST["disc"]."', '".$_POST["pross"]."', '".$_POST["os"]."', '".$_POST["ram"]."', '".$_POST["rom"]."', '".$_POST["camera"]."', '".$_POST["display"]."', '".$_POST["battery"]."', '".$_POST["color"]."',
         '".$_POST["warrenty"]."', '$iname' )") or die("Query Problem"))
     {

      move_uploaded_file($_FILES['att']['tmp_name'],"images/$iname");
   
    $msg="Mobile Added";




     }
     else
     {
       $msg="Already added";
     }
   }
   else
   {
     $msg="Only jpg or png supported";
   }
}
?>
<label><?= @$msg;?></label>


<script>
  $(document).ready(function()
  {
    $(".del").click(function()
    {
     var cidd=$(this).attr("idd");
      var imm=$(this).attr('imm');
      $.post("api.php",{cidd:cidd,imm:imm},function(res)
      {
        alert(res);
        $("body").load('dashboard.php?con=product');
      })
    })
  })
  </script>


<table class="table">
    <tr>
       <td colspan=5 class="text-center">
       <a href="#" data-toggle="modal" data-target="#myModal" class="btn btn-danger"><b>+</b> Add Product</a>

</td>
    </tr>
    <tr>
      <th>S.no</th>
      <th>Cname</th>
      <th>Pname</th>
      <th>Image</th>
      <th>Date</th>
      <th>Action</th>
      </tr>
      <?php
$sel=mysqli_query($link,"select * from mobiles order by dat desc");
if(mysqli_num_rows($sel)>0)
{
  $sn=1;
  while($arr=mysqli_fetch_assoc($sel))
  {
    ?>
 <tr>
      <td><?= $sn;?></td>
      <td><?= $arr['cat'];?></td>
      <td><?= $arr['mname'];?></td>
      <td><img src="images/<?= $arr['iname'];?>" width=50 height=50/></td>
      <td><?= $arr['dat'];?></td>
      <td>
        <a href="dashboard.php?edit=<?= $arr['id'];?>" class="btn btn-info"><span class="glyphicon glyphicon-edit"></span></a>
       <a href="javascript:void()" imm="<?= $arr['iname'];?>" idd="<?= $arr['id'];?>" class="btn btn-danger del"> <span class="glyphicon glyphicon-remove"></span></a>
      </td>
      </tr>
    <?php
    $sn++;
  }
}
else
{
  ?>
  <tr>
    <td colspan=5 align="center">No records</td>
    </tr>
  <?php
}
      ?>
    </table>
    <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Product</h4>
      </div>
      <div class="modal-body">
         <form method="post" enctype="multipart/form-data">
     <div class="form-group">
     <label>Category</label>
     <select name="cat" class="form-control">
     <?php
     //dynamic dropdown
  $sel1=mysqli_query($link,"select cname from category");
  while($arr1=mysqli_fetch_assoc($sel1))
  {
      ?>
  <option value="<?= $arr1['cname'];?>"><?= $arr1['cname'];?></option>
      <?php
  }
     ?>
     </select>
     </div>
     <div class="form-group">
     <label>Mobile name</label>
     <input type="text" name="mname" required class="form-control"/>
     </div>
      <div class="form-group">
     <label>Price</label>
     <input type="text" name="price" required class="form-control"/>
     </div>
      <div class="form-group">
     <label>Quantity</label>
     <input type="text" name="quan" required class="form-control"/>
     </div>
      <div class="form-group">
     <label>Discount</label>
     <input type="text" name="disc" required class="form-control"/>
     </div>
      <div class="form-group">
     <label>Processor</label>
     <input type="text" name="pross" required class="form-control"/>
     </div>
      <div class="form-group">
     <label>Os</label>
     <input type="text" name="os" required class="form-control"/>
     </div>
      <div class="form-group">
     <label>Ram</label>
     <input type="text" name="ram" required class="form-control"/>
     </div>
      <div class="form-group">
     <label>Rom</label>
     <input type="text" name="rom" required class="form-control"/>
     </div>
      <div class="form-group">
     <label>Camera</label>
     <input type="text" name="camera" required class="form-control"/>
     </div>
      <div class="form-group">
     <label>Display</label>
     <input type="text" name="display" required class="form-control"/>
     </div>
      <div class="form-group">
     <label>Battery</label>
     <input type="text" name="battery" required class="form-control"/>
     </div>
      <div class="form-group">
     <label>Color</label>
     <input type="text" name="color" required class="form-control"/>
     </div>
      <div class="form-group">
     <label>Warrenty</label>
     <input type="text" name="warrenty" required class="form-control"/>
     </div>
     <div class="form-group">
     <label>Image</label>
     <input type="file" name="att" required class="form-control"/>
     </div>
    
     <input type="submit" name="sub" value="submit" class="btn btn-success"/>
    
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
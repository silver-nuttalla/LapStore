<?php
 $cid=$_GET['eid'];
 $sel=mysqli_query($link,"select * from category where id=$cid");
 $arr=mysqli_fetch_assoc($sel);
 extract($_POST);
 if(isset($sub))
 {
     if(mysqli_query($link,"update category set cname='$cname' where id=$cid"))
     {
         header('location:dashboard.php?con=category');
     }
 }
?>
<h2>Edit Category</h2>
 <form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Cname :</label>
        <input type="text" value="<?= $arr['cname'];?>" name="cname" class="form-control" required/>
    </div>
    <div class="form-group">
        <label>Image :</label>
        <input type="file" name="att" class="form-control"/>
    </div>
    
    <input type="submit" value="Submit" name="sub" class="btn btn-success" />
   
      </form>
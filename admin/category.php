<?php
extract($_POST);
//for add category
if(isset($sub))
{
  $im=$_FILES['att']['name'];


  $tmp = explode('.', $im);
   $ext = end($tmp);


  if($ext==="jpg" || $ext==="png")//check extension
  {
    $fn=rand().".$ext";//create random file name

    //upload file
    if(move_uploaded_file($_FILES['att']['tmp_name'],"images/$fn"))
    {
      
        if(mysqli_query($link,"insert into category (cname,image) values('$cname','$fn')"))//insert in table
        {
           $msg="Category Saved";
        }
        else
        {
          unlink('images/'.$fn);//delete file
          $msg="Already exists";
        }
    }

  }
  else
  {
    $msg="Only jpg or png suported";
  }
}


//fetch category
$sel=mysqli_query($link,"select * from category order by dat desc");
?>
<label><?= @$msg;?></label>
<script>
  $(document).ready(function()
  {
    $(".dell").click(function()
    {
      var cid=$(this).attr('delid');
      var imm=$(this).attr('imm');
       $.post('api.php',{cid:cid,imm:imm},function(res)
       {
         alert(res)
          $('body').load('dashboard.php?con=category');
       })
    })
  })
</script>
<table class="table">
               <tr>
                   <th colspan=5 class="text-center">
                       <a href="javascript:void()" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Add Category</a>
                       </th>
                </tr>
                <tr>
                    <th>S.no</th>
                    <th>Cname</th>
                    <th>Image</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
              <?php
  if(mysqli_num_rows($sel)>0)
  {
    $sn=1;
    while($arr=mysqli_fetch_assoc($sel))
    {
      ?>
    <tr>
      <td><?= $sn;?></td>
      <td><?= $arr['cname'];?></td>
      <td><img src="images/<?= $arr['image'];?>" width=50 height=50/></td>
      <td><?= $arr['dat'];?></td>
      <td><a href="?con=edit&eid=<?= $arr['id'];?>" class="btn btn-info"><label class="glyphicon glyphicon-pencil"></label></a>

      <a href="javascript:void()" imm="<?= $arr['image'];?>" delid="<?= $arr['id'];?>" class="btn btn-danger dell"> <label class="glyphicon glyphicon-remove"></label></a>

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
   <td colspan=5 align="center">No Data Found</td>
  </tr>
    <?php
  }
              ?>
            </table>
            <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Category</h4>
      </div>
      <div class="modal-body">
        <form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Cname :</label>
        <input type="text" name="cname" class="form-control" required/>
    </div>
    <div class="form-group">
        <label>Image :</label>
        <input type="file" name="att" class="form-control" required/>
    </div>
    
    <input type="submit" value="Submit" name="sub" class="btn btn-success" />
   
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
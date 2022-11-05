<?php
extract($_POST);
if(isset($sub))
{
    if($np==$cp)
    {
 $sel=mysqli_query($link,"select password from admin where email='$sid'");
 $arr=mysqli_fetch_assoc($sel);
 if($arr['password']===md5($op))
 {
    if($op===$np)
    {
        $msg="op and np is not same";
    }
    else
    {
        $np=md5($np);
        if(mysqli_query($link,"update admin set password='$np' where email='$sid'"))
        {
            $msg="Password Updated";
        }
    }
 }
 else
 {
     $msg="Op is not match";
 }
    }
    else
    {
        $msg="Np or cp are not match";
    }
}
?>
<form method="post">
<label><?= @$msg;?></label>
 <div class="form-group">
        <label>Op :</label>
        <input type="password" name="op" class="form-control" required/>
    </div>
  <div class="form-group">
        <label>Np :</label>
        <input type="password" name="np" class="form-control" required/>
    </div>
     <div class="form-group">
        <label>Cp :</label>
        <input type="password" name="cp" class="form-control" required/>
    </div>
    <input type="submit" name="sub" value="Submit" class="btn btn-success"/>
</form>
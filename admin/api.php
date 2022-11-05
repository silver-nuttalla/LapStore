<?php
include("config/database.php");
session_start();
$sidd=session_id();
//echo $_POST['cid'];
if(isset($_POST['cid']))
{
    $cid=$_POST['cid'];
    $imm=$_POST['imm'];
    if(mysqli_query($link,"delete from category where id=$cid"))
    {
        unlink('images/'.$imm);
        echo "Deleted";
    }
    else
    {
        echo "Not deleted";
    }
}
//for addcart
if(isset($_POST['sumit']))
{
    $pid=$_POST['sumit'];//pid
    $quan=$_POST['rahul'];//quantity
    if(mysqli_query($link,"insert into tempcart(sid,pid,quan) values('$sidd','$pid',$quan)"))
    {
        echo "Add Cart";
    }
    else
    {
         echo "Not add";
    }
}
//for delete car
if(isset($_GET['iiid']))
{
    $iid=$_GET['iiid'];
    if(mysqli_query($link,"delete from tempcart where id=$iid"))
    {
        echo "Deleted";
    }
}


if(isset($_POST['cidd']))
{
    $cid=$_POST['cidd'];
    $imm=$_POST['imm'];
    if(mysqli_query($link,"delete from mobiles where id=$cid"))
    {
        unlink('images/'.$imm);
        echo "Deleted";
    }
    else
    {
        echo "Not deleted";
    }
}
?>
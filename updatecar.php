<?php

function connect(){
$con =mysqli_connect('localhost','root','');
if(!$con)
{
    echo 'Not connected';
}
   
else if(!mysqli_select_db($con,'rental _company'))
{
    echo 'Databse not selected';
}
    else{
        return $con;
}
}


$v=$_POST['vid'];
$dr=$_POST['dr'];
$wr=$_POST['wr'];

if($wr==''){
    
    updatedaily();
}
else if($dr==''){
    
    updateweekly();

}

else{
    
   upd();
}
    

function upd(){
    
    $v=$_POST['vid'];
    $dr=$_POST['dr'];
    $wr=$_POST['wr'];
    $c=connect();
    $sql="UPDATE cars SET D_RATE=$dr, W_RATE=$wr WHERE V_ID='$v'";
    $res=mysqli_query($c, $sql) or die("error on both");
    header("refresh:2; url=update.php");
    
    
}


function updatedaily(){
    
    $v=$_POST['vid'];
    $dr=$_POST['dr'];
    $wr=$_POST['wr'];
    $c=connect();
    $sql="UPDATE cars SET D_RATE=$dr WHERE V_ID='$v'";
    $res=mysqli_query($c, $sql) or die("error on both");
    header("refresh:2; url=update.php");
    
    
}

function updateweekly(){
    
    $v=$_POST['vid'];
    $dr=$_POST['dr'];
    $wr=$_POST['wr'];
    $c=connect();
    $sql="UPDATE cars SET W_RATE=$wr WHERE V_ID='$v'";
    $res=mysqli_query($c, $sql) or die("error on both");
    header("refresh:2; url=update.php");
    
    
}


?>

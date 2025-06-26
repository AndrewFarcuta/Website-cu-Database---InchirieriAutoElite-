<?php
 
$con =mysqli_connect('localhost','root','');
if(!$con)
{
    echo 'Not connected';
}

   
if(!mysqli_select_db($con,'rental _company'))
{
    echo 'Databse not selected';
}

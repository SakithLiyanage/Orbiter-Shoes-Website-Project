<?php

$con=new mysqli("localhost","root","","orbiter");

if($con->connect_error)
{
  die("connection failed".$con->connect_error);
}




?>
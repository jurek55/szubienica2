<?php
session_start();
$s=$_GET['x'];
//echo $s;
$obj=json_decode($s);
$_SESSION['znak']=$obj->lit;
header('Location: start.php');
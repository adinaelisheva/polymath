<?php
include("cnfg.php");

$level = 1;

if(isset($_GET['level'])){
  $level = $_GET['level'];
}

if ($level > 3) { $level = 3; }
if ($level < 1) { $level = 1; }

if(isset($_GET['topic'])){
  //don't bother if there's no topic
  $topic = mysqli_real_escape_string($con,$_GET['topic']);
  $result = mysqli_query($con,"SELECT exp from topics WHERE topic='$topic';");
  $row = mysqli_fetch_array($result); //there should only be one row
  $exp = $row['exp'] + 3*$level;
  mysqli_query($con,"UPDATE topics SET exp='$exp' WHERE topic='$topic';");
}

?>
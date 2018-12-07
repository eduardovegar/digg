<?php
include "errors.php";
// set json file to store images
$json_file;
session_start();
$sl = $_GET['uploaded']; // get which layout are we dealing with
$screen = json_decode(file_get_contents('../data/screens_list.json')); // get the current screen

$how_many = sizeof($screen);
$which = $how_many -1;
// establish a img list for each layout
switch ($sl)
{
  case 1:
    $json_file = "../data/fullscreenimg$which.json";
    break;
  case 2:
    $json_file = "../data/lside.json";
    break;
  case 3:
    $json_file = "../data/rside.json";
    break;
}
// parse into array
$img_list = json_decode(file_get_contents($json_file), true);

$verify = getimagesize($_FILES['image']['tmp_name']);


$uploaddir = '../uploads/';

$uploadfile = $uploaddir . basename($_FILES['image']['name']);

$img_name = basename($_FILES['image']['name']);
//  check img uploaded is png
// crazy move but it is a step to sanitize inputs
// TODO: needs better input santitization
if ($verify['mime'] != 'image/png')
{
  $message = 2;
  $_SESSION['message'] = $message;
  header("Location: ../admin/layout/index.php?layout_selection=$sl&message=$message&filename=$img_name");
  exit;
}

if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile))
{
    $tmp_img = stripslashes($uploadfile);
    $img_list[] = $tmp_img;
    $encoded_img = json_encode($img_list, JSON_PRETTY_PRINT);

    if (file_put_contents($json_file, $encoded_img))
    {
      $message = 1;
      $_SESSION['message'] = $message;
      header("Location: ../admin/layout/index.php?layout_selection=$sl&message=$message&filename=$img_name");
    }
} else {
  $message = 2;
  $_SESSION['message'] = $message;
  header("Location: ../admin/layout/index.php?layout_selection=$sl&message=$message");
}
?>

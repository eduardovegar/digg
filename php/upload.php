<?php
include "errors.php";
// set json file to store images
$json_file;
session_start();
$sl = $_GET['uploaded']; // get which layout are we dealing with

// check if this is the static, make all stuff go disabled
if (isset($_POST['isStatic']))
{
  $last = 1;
}

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
    $json_file = "../data/lside$which.json";
    $tmpimgstuff = json_decode(file_get_contents($json_file), true);
    if (sizeof($tmpimgstuff < 1)) // if there's nothing in the array then
    {
      $isFirst = 1; // is it the first uploaded
    } else {
      $isFirst = 0;
    }
    break;
  case 3:
    $json_file = "../data/rside$which.json";
    break;
}
// this creates the file that will host the images
// the user is uploading and at the same time
// it stores it as an array we cann work with
$img_list = json_decode(file_get_contents($json_file), true);

$verify = getimagesize($_FILES['image']['tmp_name']);

// uploaddir is on the scren dir so as to avoid conflicts or duplicates
$uploaddir = '../screens/'. $which . "/";

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

if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) // if upload is succesful
{
    $tmp_img = stripslashes($uploadfile);
    $img_list[] = $tmp_img;
    $encoded_img = json_encode($img_list, JSON_PRETTY_PRINT);

    if (file_put_contents($json_file, $encoded_img))
    {
      $message = 1;
      $_SESSION['message'] = $message;
      header("Location: ../admin/layout/index.php?layout_selection=$sl&message=$message&filename=$img_name&isFirst=$isFirst&last=$last");
    }
} else {
  $message = 2;
  $_SESSION['message'] = $message;
  header("Location: ../admin/layout/index.php?layout_selection=$sl&message=$message");
}
?>

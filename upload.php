<?php
// display all error messages
// TODO: comment next 2 lines after debugging is complete
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);
$error = '';
$success = '';

// set json file to store images
$json_file = 'data/img_data.json';
$img_list = json_decode(file_get_contents($json_file), true);

$verify = getimagesize($_FILES['image']['tmp_name']);


if ($verify['mime'] != 'image/png')
{
  $error = 2;
  $_SESSION['message'] = $error;
  header('Location: setup.php?message='.$error);
  exit;
}

$uploaddir = 'uploads/';

$uploadfile = $uploaddir . basename($_FILES['image']['name']);

if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
    $tmp_img = stripslashes($uploadfile);
    $img_list[] = $tmp_img;
    $encoded_img = json_encode($img_list, JSON_PRETTY_PRINT);

    if (file_put_contents($json_file, $encoded_img))
    {
      $message = 1;
      $_SESSION['message'] = $message;
      header('Location: setup.php?message='.$message);
    }

} else {
  $error = 2;
  $_SESSION['message'] = $error;
  header('Location: setup.php?message='.$error);
}
?>

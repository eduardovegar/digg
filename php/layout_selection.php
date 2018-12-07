<?php
// get data from form
$layout_value = $_POST['layout'];
// send data to page
session_start();
$_SESSION['layout_selection'] = $layout_value;

switch ($layout_value)
{
  case 1:
    header("Location: ../admin/layout/index.php?layout_selection=$layout_value");
    break;
  case 2:
    header("Location: ../admin/layout/index.php?layout_selection=$layout_value");
    break;
  case 3:
    header("Location: ../admin/layout/index.php?layout_selection=$layout_value");
    break;
}

 ?>

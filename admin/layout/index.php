<?php
$layout_file = '../../data/layouts.json';

$layouts = json_decode(file_get_contents($layout_file), true);
session_start();
// get layout value from selection
$layout_value = $_GET['layout_selection'];
$uploaded = $layout_value;
$_SESSION['uploaded'] = $uploaded;
// message from upload action
$alert = $_GET['message'];
// get filename from upload function
$img_uploaded = $_GET['filename'];
if($alert == 1){
  $alert = "<div class='alert alert-success'>Image $img_uploaded was uploaded</div>";
} elseif ($alert == 2) {
  $alert = "<div class='alert alert-danger'>Could not upload $img_uploaded file</div>";
}
// set array index correctly and upload message
switch ($layout_value)
{
  case 1:
    $message = "Submit all slides here";
    $l = 0;
    break;
  case 2:
    $message = "Submit left side first, then all right side slides";
    $l = 1;
    break;
  case 3:
    $message = "Submit all your slides, and finally the right side";
    $l = 2;
    break;
}
 ?>
<!DOCTYPE html>
<html>
  <head>
    <title><?php echo $layouts[$l]["name"] ?></title>
    <meta charset="utf-8" />
    <meta name="description" content="Editing full screen layout" />
    <meta name="author" content="Eduardo Vega" />
    <link rel="stylesheet" href="../../css/style.css"  />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="icon" href="../../favicon.png" />
  </head>
  <body>
    <div class="container">
      <div class="jumbotron container-fluid">
        <?php echo $alert; ?>
        <h1 class="display-4">SELECTED: <?php echo $layouts[$l]["name"]; ?></h1>
        <br /><img class="img-responsive" src="<?php echo $layouts[$l]["img"];  ?>" />
        <hr class="my-4" />
        <p><?php
          echo $message;
         ?></p>
        <form name="upload" action="../../php/upload.php?uploaded=<?php echo $layout_value ?>" method="POST" enctype="multipart/form-data">
          <div class="form-control layout-admin">
            <p class="form-text">Only PNG images allowed</p>
            <label for="image">Select image to upload</label>
            <input type="hidden" value="<?php echo $layout_value; ?>"/>
            <input type="file" name="image" />
            <input type="submit" name="upload" value="Upload" class="btn btn-primary" />
          </div>
        </form>
        <div class="container">
          <form name="gotoscreen" action="../../php/get_created_screens.php?layout=<?php echo $layout_value ?>" method="POST">
            <input type="submit" name="gotoscreen" value="Go to my screen"  class="btn btn-success"/>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>

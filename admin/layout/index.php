<?php
// get the layout file for the names
$layout_file = '../../data/layouts.json';

$layouts = json_decode(file_get_contents($layout_file), true);
session_start();
// get layout value from selection
$layout_value = $_GET['layout_selection']; /// which one was sent from previous screen
$uploaded = $layout_value;
$_SESSION['uploaded'] = $uploaded;

// is it first
if (isset($_GET['isFirst']))
{
  $isFirst = $_GET['isFirst'];
}
// message from upload action
$alert = $_GET['message'];
// get filename from upload function
$img_uploaded = $_GET['filename']; // get message if it was uploaded
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
    $message = "Submit your static left side first";
    $l = 1;
    break;
  case 3:
    $message = "Submit all your slides, and click the checkbox once you're ready to upload the static right side";
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

          if (isset($isFirst))
          {
            if ($isFirst == 1)
            {
              $message = "Static image was uploaded. Please upload your slideshow images.";
              echo $message;
            }
          }
          else
          {
            echo $message;
          }

         ?></p>
        <form name="upload" action="../../php/upload.php?uploaded=<?php echo $layout_value ?>" method="POST" enctype="multipart/form-data">
          <div class="layout-admin">
            <div class="form-group">
              <p class="form-text"><?php
              if($_GET['last'] == 1)
              {
                echo "All images uploaded. Please click the Go to my screen button below to access your screen ";
              }
              else
              {
                echo "Only PNG images allowed";
              } ?>
            </p>
            </div>
            <div class="form-group">
              <label for="image">
                <?php
                if($_GET['last'] == 1)
                {}
                else
                {
                  echo "Select image to upload";
                } ?>
              </label>
              <input type="hidden" value="<?php echo $layout_value; ?>"/>
              <input <?php if ($_GET['last'] == 1) { echo "disabled"; } ?> class="form-control-file" type="file" name="image" />
            </div>
            <?php
            if ($layout_value == 3 && $_GET['last'] !=1)
            {
              echo "
              <div class='form-group'>
                <label for='isStaticId' class='form-check-label'>Is this the static image?</label>
                <input class='form-check-input' type='checkbox' name='isStatic' id='isStaticId' />
              </div>";
            }  ?>
            <input <?php if ($_GET['last'] == 1) { echo "disabled"; } ?>  type="submit" name="upload" value="Upload" class="btn btn-primary" />
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

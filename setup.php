<?php
  $message = $_GET['message'];
  if($message == 1){
    $message = '<div class="alert alert-success">Image was uploaded</div>';
  } elseif ($message == 2) {
    $error = '<div class="alert alert-danger">Could not upload image file</div>';
  }

  $json_file = 'data/img_data.json';
  $img_list = json_decode(file_get_contents($json_file), true);
 ?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8" />
  <title>Upload your images</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
  <div class="container">
    <?php
    if(isset($error)){echo $error;}
    if(isset($message)){echo $message;}
    ?>
    <form name="upload" action="upload.php" method="POST" enctype="multipart/form-data">
      <div class="form-control">
        <p class="form-text">Upload images for app - Only PNG images allowed</p>
        <label for="image">Select image to upload</label>
        <input type="file" name="image" />
        <input type="submit" name="upload" value="Upload" class="btn btn-primary" />
      </div>
    </form>
    <div class="container-fluid">
      <h2>Active assets</h2>

      <p>Done adding images?</p>
      <a href="layout.php" class="btn btn-primary">Go to slideshow</a>
    </div>
  </div>
</body>
</html>

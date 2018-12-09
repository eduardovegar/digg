<?php
include 'php/errors.php';
 ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Creating screen...</title>
    <meta charset="utf-8" />
    <meta name="description" content="Creating a scren" />
    <meta name="author" content="Eduardo Vega" />
    <link rel="stylesheet" href="css/style.css"  />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="icon" href="favicon.png" />
  </head>
  <body>
    <div class="container">
      <div class="jumbotron container-fluid">

<?php
include 'php/errors.php';

// get screens list from json file
$screens_files= '../data/screens_list.json';
// decode them to local var
$screens_list = json_decode(file_get_contents($screens_files), true);

// get the screens dirs
$json_file = '../data/new_screens.json';
// decode
$new_screens = json_decode(file_get_contents($json_file), true);

// set up dir variable to create dirs and json file
$screens_dir = "../screens/";

$y = sizeof($screens_list);
$xy  = strval($y); //parse to string


// have to reset umask in order to create the folder
// with the permisions i want
$oldmask = umask(0);
if (!file_exists($screens_dir . $xy)){
  mkdir($screens_dir .  $xy, 0775, true);
}
chown($screens_dir . $xy, 'bitnami');
umask($oldmask);
// save dir to new screens list
$new_screens[] = $screens_dir . $xy;

// if we this is the first one then set to 1
$i = 0;
if (sizeof($screens_list) == 0)
{
  $screens_list[] = $i;
}
else // if not the 1st then add +1
{
  $x = sizeof($screens_list);
  $screens_list[] = $x;
}
$encoded_new_screens  = json_encode($new_screens,JSON_PRETTY_PRINT);
$encoded_screens_list = json_encode($screens_list,JSON_PRETTY_PRINT);
  // screens list put
  if (file_put_contents($screens_files, $encoded_screens_list))
  {
    $message = '<div class="alert alert-success">Changes submitted succesfully</div>';
  }
  else
  {
    $error = '<div class="alert alert-danger">ERROR: Can not modify JSON file</div>';
  }
  // new screens put
  if (file_put_contents($json_file, $encoded_new_screens))
  {
    $message = '<div class="alert alert-success">Changes submitted succesfully</div>';
  }
  else
  {
    $error = '<div class="alert alert-danger">ERROR: Can not modify JSON file</div>';
  }

  if(isset($error)){echo $error;}
  if(isset($message)){echo $message;}
  echo "<h2>Page will refresh in 5 seconds...</h2>";

  header('Refresh: 5; URL=../admin/select-layout');
?>


</div>
</div>
</body>
</html>

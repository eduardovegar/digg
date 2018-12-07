<?php
// display all error messages
// TODO: comment next 2 lines after debugging is complete
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

$json_file = 'data/data.json';
$error = '';
$message = '';
$json_file_data = json_decode(file_get_contents($json_file), true);
if(isset($_POST['submit']))
{


  $post_data = array(
    'name' => $_POST['name'],
    'age' => $_POST['age']
  );

  $json_file_data[] = $post_data; //appends to array

  $encoded_data = json_encode($json_file_data, JSON_PRETTY_PRINT);

  if (file_put_contents($json_file, $encoded_data))
  {
    $message = '<div class="alert alert-success">File Submitted Successfully</div>';
  }
  else
  {
    $error = '<div class="alert alert-danger">Can not add JSON data</div>';
  }
}
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8" />
  <title>Edit Sandwiches | Capstone Project</title>
  <link rel="stylesheet" href="css/style.css"/>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
  <div class="container">
    <?php
    if(isset($error)){echo $error;}
    if(isset($message)){echo $message;}
    ?>
    <form action="" name="form1" method="POST">
      <div class="form-group">
        <label for="finput-name">Your name:</label>
        <input name="name" type="text" class="form-control" id="finput-name" />
      </div>
      <div class="form-group">
        <label for="finput-age">Your age:</label>
        <input name="age" type="number" class="form-control" id="finput-age" />
      </div>
      <input class="btn btn-primary" name="submit" type="submit" value="Submit" />
    </form>
  </div>

</body>
</html>

<?php
// display all error messages
// TODO: comment next 2 lines after debugging is complete
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

// set data file location
$json_file = 'data/data.json';
// initalize message variables
$error = '';
$success = '';
// get file and parse json data into php array
$sandwiches_data = json_decode(file_get_contents($json_file), true);

// process submitted data
if(isset($_POST['submit']))
{
  if(!empty($_POST['s1']))
  {
    $sandwich1 = array(
      'name' => $_POST['s1'],
      'description' => $_POST['ds1'],
      'price' => $_POST['ps1'],
      'identifier' => 's1'
    );
    $sandwiches_data[0] = $sandwich1;
  }
  if(!empty($_POST['s2']))
  {
    $sandwich2 = array(
      'name' => $_POST['s2'],
      'description' => $_POST['ds2'],
      'price' => $_POST['ps2'],
      'identifier' => 's2'
    );
    $sandwiches_data[1] = $sandwich2;
  }
  if(!empty($_POST['s3']))
  {
    $sandwich3 = array(
      'name' => $_POST['s3'],
      'description' => $_POST['ds3'],
      'price' => $_POST['ps3'],
      'identifier' => 's3'
    );
    $sandwiches_data[2] = $sandwich3;
  }
  if(!empty($_POST['s4']))
  {
    $sandwich4 = array(
      'name' => $_POST['s4'],
      'description' => $_POST['ds4'],
      'price' => $_POST['ps4'],
      'identifier' => 's4'
    );
    $sandwiches_data[3] = $sandwich4;
  }
  if(!empty($_POST['s5']))
  {
    $sandwich5 = array(
      'name' => $_POST['s5'],
      'description' => $_POST['ds5'],
      'price' => $_POST['ps5'],
      'identifier' => 's5'
    );
    $sandwiches_data[4] = $sandwich5;
  }
  if(!empty($_POST['s6']))
  {
    $sandwich6 = array(
      'name' => $_POST['s6'],
      'description' => $_POST['ds6'],
      'price' => $_POST['ps6'],
      'identifier' => 's6'
    );
    $sandwiches_data[5] = $sandwich6;
  }
  if(!empty($_POST['s7']))
  {
    $sandwich7 = array(
      'name' => $_POST['s7'],
      'description' => $_POST['ds7'],
      'price' => $_POST['ps7'],
      'identifier' => 's7'
    );
    $sandwiches_data[6] = $sandwich7;
  }



  $encoded_sandwiches = json_encode($sandwiches_data, JSON_PRETTY_PRINT);

  if (file_put_contents($json_file, $encoded_sandwiches))
  {
    $message = '<div class="alert alert-success">Changes submitted succesfully</div>';
  }
  else
  {
    $error = '<div class="alert alert-danger">ERROR: Can not modify JSON file</div>';
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
      <?php
      foreach($sandwiches_data as $key => $sandwich)
      {
        echo
        "
        <div class='form-group'>
        <label for='". $sandwich['identifier'] ."' />MODIFY: <strong>". $sandwich['name'] ."</strong></label>
        <input class='form-control' type='text' name='". $sandwich['identifier'] ."' id='". $sandwich['identifier'] ."' placeholder='". $sandwich['name'] ."'  />
        <input class='form-control' type='number' step='0.01' name='p". $sandwich['identifier'] ."' id='p". $sandwich['identifier'] ."' placeholder='". $sandwich['price'] ."'  />
        <textarea class='form-control'  name='d". $sandwich['identifier'] ."' id='d". $sandwich['identifier'] ."' placeholder='". $sandwich['description'] ."' ></textarea>
        </div>
        ";
      }
      ?>
      <input name="submit" type="submit" class="btn btn-primary"  />
    </form>
  </div>

</body>
</html>

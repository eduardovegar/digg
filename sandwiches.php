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

?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8" />
  <title>Capstone Project</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css"/>
</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col sandwiches">
        <div class="blue-separator"></div>
        <div class="sandwiches-inner">
          <?php
          foreach($sandwiches_data as $key => $sandwich)
          {
            echo "
              <p class='sandwich-name'>" . $sandwich['name'] ."</p>
              <p class='sandwich-price'>" . $sandwich['price'] . "</p>
              <p class='sandwich-description'>" . $sandwich['description'] . "</p>
              ";
          }
           ?>
        </div>
        <div class="blue-separator"></div>
      </div>
      <div class="col pictures-s">
          <div class="sandwich-header">
            <h1>Our Sandwiches</h1>
          </div>
          <div class="actual-sandwiches siema">
            <?php
            foreach($sandwiches_data as $key => $sandwich)
            {
              /*TODO: erase these lines if you
              implement images for all sandwiches
               */
              if ($key  > 4){
                break;
              }
              if ($sandwich["image"] == "img/s6.jpg"){
                break;
              }

              echo "
                <div class='simage'>
                  <img class='img-responsive' src=". $sandwich["image"] ." / />
                  <h2>". $sandwich["name"] ."</h2>
                </div>
              ";
            }
             ?>
          </div>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="js/siema.min.js"></script>
  <script type="text/javascript">
    const slideshow = new Siema({
      selector: '.siema',
      loop: true,
      duration: 500
    });
    var timer = setInterval(function(){
      slideshow.next();
    }, 7000);
  </script>
</body>
</html>

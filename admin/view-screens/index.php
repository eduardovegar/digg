<?php
$screens = json_decode(file_get_contents('../../data/new_screens.json'), true);

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Screens View</title>
    <meta charset="utf-8" />
    <meta name="description" content="View my screens" />
    <meta name="author" content="Eduardo Vega" />
    <link rel="stylesheet" href="../../css/style.css"  />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="icon" href="../../favicon.png" />
  </head>
  <body>
    <div class="container">
      <div class="jumbotron container-fluid">
        <h1 class="display-4">Here's your screens</h1>
        <p class="inc">Click on any button to take you to that screen</p>
        <div class="row">
        <?php
          $i =0;
          foreach ($screens as $key => $o_screen)
          {
            $screen = str_replace("\\", "", $o_screen);
            echo "<div class='col'><a class='btn btn-success' href='../$screen'>Go to screen $i</a></div>";
            $i++;
          } 
        ?>
        </div>
      </div>
    </div>
  </body>
</html>

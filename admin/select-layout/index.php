<?php
include '../../php/errors.php';

$layout_file = '../../data/layouts.json';

$layouts = json_decode(file_get_contents($layout_file), true);

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Select layout</title>
    <meta charset="utf-8" />
    <meta name="description" content="Create a new screen" />
    <meta name="author" content="Eduardo Vega" />
    <link rel="stylesheet" href="../../css/style.css?v=1"  />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="icon" href="../../favicon.png" />
  </head>
  <body>
    <div class="container">
      <div class="jumbotron container-fluid">
        <h1 class="display-4">Select your screen layout</h1>
        <hr class="my-4" />
        <p class="inc"></p>
        <form action="../../php/layout_selection.php" method="POST">
          <div class="row">
          <?php
          $i = 1;
          foreach ($layouts as $key => $layout)
          {
            echo "<div class='col'>";
            echo "<input type='radio' name='layout' value=$i id=$i />";
            echo "
              <label class='layout-label' for=$i>
                <img class='img-responsive' src=" . $layout["img"] . " />
              </label>";
            echo "</div>";
            $i++;
          }
           ?>
         </div>
          <input type="submit" class="btn btn-primary" href="admin/" value="Next Step"></input>
        </form>
      </div>
    </div>
  </body>
</html>

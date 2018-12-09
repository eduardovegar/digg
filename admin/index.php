<?php
include 'php/errors.php';
 ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Acess my screens</title>
    <meta charset="utf-8" />
    <meta name="description" content="Create a new screen" />
    <meta name="author" content="Eduardo Vega" />
    <link rel="stylesheet" href="../css/style.css"  />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="icon" href="../favicon.png" />
  </head>
  <body>
    <div class="container">
      <div class="jumbotron container-fluid">
        <h1 class="display-4">Create a new Screen</h1>
        <hr class="my-4" />
        <p class="inc">Click the button below to create a new screen and access creation options.</p>
        <form action="../php/new_screen_creation.php" method="POST">
          <input type="submit" class="btn btn-primary" href="admin/" value="Create New Screen"></input>
        </form>

      </div>
      <div class="jumbotron container-fluid">
        <h1 class="display-4">Access my screens</h1>
        <hr class="my-4" />
        <p class="inc">Click the button below to acess your screens</p>
        <a class="btn btn-primary" href="view-screens/" >Access my screens</a>
      </div>
    </div>
  </body>
</html>

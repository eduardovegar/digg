<!doctype html>
<html>
<head>
  <meta charset='utf-8' />
  <link rel='stylesheet' href='../../css/style.css' />
  <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css' >
</head>
<body>
  <div class='container-fluid lside-container'>
    <div class='slideshow'>

    <?php
      $img_list_rside = json_decode(file_get_contents("../../data/rside5.json"), true);
      $how_many_rside = sizeof($img_list_rside);
      $i = 0;
      foreach ($img_list_rside as $key => $img)
      {
        $new_img = str_replace("\\", "", $img);
        if ($i == 0)
        {
          echo "<div class=siema>";
        }

        if (++$i === $how_many_rside)
        {
          echo "</div><div class=flight><img class=img-responsive src=" . "../" . "$new_img />";
          exit;
        }
        echo "<div><img class=img-responsive src=" . "../" . "$new_img /></div>";
      }
    ?>
          </div>
    </div>
  </div>
  <script type='text/javascript' src='../../js/siema.min.js'></script>
  <script type=text/javascript>
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

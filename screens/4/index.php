<!doctype html>
<html>
<head>
  <meta charset='utf-8' />
  <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css' >
</head>
<body>
  <div class='container-fluid'>
    <div class='slideshow'>
      <div class='siema'>
<?php $img_list_fullscreen = json_decode(file_get_contents("../../data/fullscreenimg4.json"), true); foreach($img_list_fullscreen as $key => $img) { $new_img = str_replace("\\", "", $img); echo "<div><img class=img-responsive src=" . "../" . "$new_img /></div>";} ?>
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

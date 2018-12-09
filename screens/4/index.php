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
<?php $img_list_lside = json_decode(file_get_contents("../../data/lside4.json"), true); $i=0; foreach($img_list_lside as $key => $img){ $new_img = str_replace("\\", "", $img); if ($i==0){echo "<div class=pull-left><img class=lside-static-img src=" . "../" . "$new_img /></div>";}elseif ($i==1){echo "<div class=siema><div><img class=img-responsive src=" . "../" . "$new_img /></div>";}else{echo "<div><img class=img-responsive src=" . "../" . "$new_img /></div>";}$i++;}?>      </div>
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

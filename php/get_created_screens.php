<?php
// get which layout are we working with
$layout = $_GET['layout'];
// get the list of created screens
$screens_list_file = '../data/new_screens.json';
$screens_list = json_decode(file_get_contents($screens_list_file), true);

$how_many = sizeof($screens_list);

$which = $how_many -1 ; // get index

// get the path without backward slashes
$path = str_replace('\\', '',$screens_list[$which]);

$new_screen = $path . '/index.php';
// creaate the new file

switch ($layout)
{
  case 1:
    $f1 = file_get_contents('../templates/fullscreen.html');
    $f2 = file_get_contents('../templates/fullscreen2.html');
    $code_to_add = '<?php
    $img_list_fullscreen = json_decode(file_get_contents("../../data/fullscreenimg'.$which.'.json"), true);
    foreach($img_list_fullscreen as $key => $img)
    {
      $new_img = str_replace("\\\", "", $img);
      echo "<div><img class=img-responsive src=" . "../" . "$new_img /></div>";
    } ?>' ;
    $contents = $f1 . $code_to_add . $f2;
    file_put_contents($new_screen, $contents);
    header("Location: $path");
    break;
  case 2:
    $f1 = file_get_contents('../templates/side1.html');
    $f2 = file_get_contents('../templates/side2.html');
    $code_to_add = '<?php
    $img_list_lside = json_decode(file_get_contents("../../data/lside'.$which.'.json"), true);
    $i=0;
    foreach($img_list_lside as $key => $img)
    {
      $new_img = str_replace("\\\", "", $img);
      if ($i==0)
      {
        echo "<div class=float-left><img class=lside-static-img src=" . "../" . "$new_img /></div>";
      }
      elseif ($i==1)
      {
        echo "<div class=siema><div><img class=img-responsive src=" . "../" . "$new_img /></div>";
      }
      else
      {
        echo "<div><img class=img-responsive src=" . "../" . "$new_img /></div>";}
        ++$i;
      }?>';
    $contents = $f1 . $code_to_add . $f2;
    file_put_contents($new_screen, $contents);
    header("Location: $path");
    break;
  case 3:
    $f1 = file_get_contents('../templates/side1.html');
    $f2 = file_get_contents('../templates/side2.html');
    $code_to_add = '
    <?php
      $img_list_rside = json_decode(file_get_contents("../../data/rside'.$which.'.json"), true);
      $how_many_rside = sizeof($img_list_rside);
      $i = 0;
      foreach ($img_list_rside as $key => $img)
      {
        $new_img = str_replace("\\\", "", $img);
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
    ';
    $contents = $f1 . $code_to_add . $f2;
    file_put_contents($new_screen, $contents);
    header("Location: $path");
    break;
}

?>

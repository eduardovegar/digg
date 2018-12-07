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
    $code_to_add = '<?php $img_list_fullscreen = json_decode(file_get_contents("../../data/fullscreenimg'.$which.'.json"), true); foreach($img_list_fullscreen as $key => $img) { $new_img = str_replace("\\\", "", $img); echo "<div><img class=img-responsive src=" . "../" . "$new_img /></div>";} ?>' ;
    $contents = $f1 . $code_to_add . $f2;
    file_put_contents($new_screen, $contents);
    header("Location: $path");
    break;
  case 2:
    break;
  case 3:
    break;
}

?>

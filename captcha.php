<?PHP
  
  $image = @imagecreatetruecolor(120, 30) or die("Cannot Initialize new GD image stream");

  
  $background = imagecolorallocate($image, 43, 66, 70);
  imagefill($image, 0, 0, $background);
  $linecolor = imagecolorallocate($image, 43, 66, 70);
  $textcolor = imagecolorallocate($image, 0xFF, 0xFF, 0xFF);

  for($i=0; $i < 6; $i++) {
    imagesetthickness($image, rand(1,3));
    imageline($image, 0, rand(0,30), 120, rand(0,30), $linecolor);
  }

  session_start();

  // add random digits to canvas
  $digit = '';
  for($x = 15; $x <= 95; $x += 20) {
    $digit .= ($num = rand(0, 9));
    imagechar($image, rand(3, 5), $x, rand(2, 14), $num, $textcolor);
  }

  // record digits in session variable
  $_SESSION['digit'] = $digit;

  // display image and clean up
  header('Content-type: image/png');
  imagepng($image);
  imagedestroy($image);
?>
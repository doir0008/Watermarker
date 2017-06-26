<?php 
    $watermark = imagecreatefrompng("stamp.png");
    $rnd = rand(1,3);
    $im = imagecreatefromjpeg("image" . $rnd . ".jpg");
    $wmSize = getimagesize("stamp.png");
    $imSize = getimagesize("image" . $rnd . ".jpg");

    for($i=0; $i<3; $i++) {
        $xRandom = rand($wmSize[0],($imSize[0] - $wmSize[0]));
        $yRandom = rand($wmSize[1],($imSize[1] - $wmSize[1]));
        imagecopy($im, $watermark, $xRandom, $yRandom, 0, 0, $wmSize[0], $wmSize[1]);  
    }
    imagepng($im, "newimage.png");
    imagedestroy($watermark);
    imagedestroy($im);
    $output = '<a href="index.php"><img src="newimage.png"/></a>';    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <?php echo $output; ?>
</body>
</html>
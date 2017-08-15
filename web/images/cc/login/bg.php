<?php
sleep(2);
header("Content-Type: image/pjpeg");
header("Content-Length: " . filesize('bg1.jpg'));
$contents = file_get_contents('bg1.jpg');
echo $contents;
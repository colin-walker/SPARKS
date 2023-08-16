<?php

$target_dir = dirname(__FILE__).'/pages/';
$filename = $target_dir.$_POST['page'].'.txt';
unlink($filename);

?>
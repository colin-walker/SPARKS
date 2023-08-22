<?php

$target_dir = dirname(__FILE__).'/pages/';
$page = $target_dir.$_GET['page'].'.txt';
echo file_get_contents($page);

?>
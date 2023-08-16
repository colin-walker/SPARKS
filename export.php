<?php

$target_dir = dirname(__FILE__).'/pages/';

if (file_exists('sparks.zip')) {
	unlink('sparks.zip');
}

$sparks = glob($target_dir . '/*.txt');

$zip = new ZipArchive();
$zip->open('sparks.zip', ZipArchive::CREATE);

foreach ($sparks as $spark) {
	if (!is_dir($spark)) {
		$zip->addFile($spark, basename($spark));
	}
}

$zip->close();

header('Content-Type: application/zip');
header('Content-Disposition: attachment; filename="sparks.zip"');
readfile('sparks.zip');

if (file_exists('sparks.zip')) {
	unlink('sparks.zip');
}

?>
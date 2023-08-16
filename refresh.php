<?php

unset($pages);
$pages = array();
$target_dir = dirname(__FILE__).'/pages/';
$pages = glob($target_dir.'*.txt');
rsort($pages);
$empty = '';

echo "<ol class='carousel__viewport'>";

if (count($pages) > 1 || (count($pages) == 1) && $_GET['p'] != pathinfo($pages[0], PATHINFO_FILENAME)) {
	foreach($pages as $file) {
		$list = array();
		$text = htmlentities(file_get_contents($file));
		$filename = pathinfo($file, PATHINFO_FILENAME);
		if ($filename != $_GET['p']) {
			$date = date('D, d M Y H:i:s', $filename);
			echo "<li class='carousel__slide'>";
			echo "<span style='line-height: 1.5em; cursor: pointer; font-weight: bold;' onClick='getSaved($filename)'>$date</span><br><br>";
			echo "<p>$text</p>";
			echo "</li>";
		}
	}
} else {
	$empty = true;
}
echo '<li class="carousel__slide">';

if ($empty) {
	echo '<div style="width: 100%; margin: 5px auto; position: relative; text-align: center;">Nothing in the vault</div>';
}
echo '	    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" stroke="currentColor" class="carouselNew new bi bi-plus-square" style="position: absolute; bottom: 10px; right: 10px;" onClick="makeNew()" viewBox="-1 -1 18 18">
			<path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
			<path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
		</svg>
	</li>';
echo "</ol>";

?>
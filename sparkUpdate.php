<?php

$target_dir = dirname(__FILE__).'/pages/';

if (isset($_POST['update'])) {
	$page = $target_dir.$_POST['page'].'.txt';
	$newcontent = $_POST['content'];
	file_put_contents($page, $newcontent);
}

?>

<script>

	areaLen = textarea.value.length;
	textarea.setSelectionRange(areaLen, areaLen);
	textarea.style.height = textarea.scrollHeight + "px";
	textarea.scrollTop = textarea.scrollHeight;
	
	messageContainer.innerHTML = "Saved";
	messageContainer.classList.add('show');
	timeoutId = setTimeout(function() {
		messageContainer.classList.remove('show');
	}, 1000);

<?php

if (isset($_POST['caret']) && $_POST['caret'] != '') {
	$caretPosition = $_POST['caret'];
	echo "textarea.setSelectionRange($caretPosition)";

}

?>
	textarea.focus();
</script>
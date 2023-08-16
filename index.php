<?php

$target_dir = dirname(__FILE__).'/pages/';
$pages = glob($target_dir.'*.txt');
rsort($pages);
$filenames = array();

if (!empty($pages)) {
	$text = htmlentities(file_get_contents($pages[0]));
	$saveTo = pathinfo($pages[0], PATHINFO_FILENAME);
	foreach($pages as $file) {
		$filename = pathinfo($file, PATHINFO_FILENAME);
		$filenames[] = $filename;
	}
		rsort($filenames);
} else {
	$page = $target_dir.time().'.txt';
	$saveTo = $page;
	$text = '';
	file_put_contents($page, $text);
}

?>
<!DOCTYPE html>
<html lang="en-GB">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sparks</title>
  	<link rel="stylesheet" href="style.css" type="text/css" media="all">
  	<link rel="icon" type="image/svg" href="lightning.svg">
  	
  	<script src="htmx.min.js"></script>
  	<script src="jquery-3.6.0.min.js"></script>
  	
</head>
<body onload="placeCaret()">
			
	<div id="empty"></div>
	<div id="message-container"></div>
	
	<div id="wrapper" style="width: 100vw; position: absolute; left: 0px;">
	    <div id="page" class="hfeed h-feed site">
	    	<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" stroke="currentColor" class="save bi bi-check-square" viewBox="-1 -1 18 18" style="position: absolute; bottom: 15px; right: calc(50vw - 283px);" onClick="doSave()">
				<path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
				<path d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.235.235 0 0 1 .02-.022z"/>
			</svg>
	    	
	    	<svg id="newBtn" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" stroke="currentColor" class="new bi bi-plus-square" style="position: absolute; bottom: 15px; right: calc(50vw - 220px);" onClick="makeNew()" viewBox="-1 -1 18 18">
				<path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
				<path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
			</svg>
	    	
	    	<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" stroke="currentColor" class="vault bi bi-archive" style="position: absolute; bottom: 15px; left: calc(50vw - 283px);" onClick="show()" viewBox="-1 -1 18 18">
				<path d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1V2zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5H2zm13-3H1v2h14V2zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
			</svg>
			
			<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" stroke="currentColor" class="delete bi bi-x-square" style="position: absolute; top: 25px; right: calc(50vw - 283px); z-index: 10;" onClick="doDelete()" viewBox="-1 -1 18 18">
				<path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
				<path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
			</svg>
	    	
	        <header id="masthead" class="site-header">
	            <div class="site-branding">
	                <h1 class="site-title">
	                    <a href="<?php echo BASE_URL; ?>" rel="home">
	                        <span class="p-name">Sparks</span>
	                    </a>
	                </h1>
	            </div>
	        </header>
	        <div id="primary" class="content-area">
				<main id="main" class="site-main today-container">
					</br>
					
					<form id="form" method="post">
						<input type="hidden" name="update">
						<input type="hidden" id="pageName" name="page" value="<?php echo $saveTo; ?>">
						<input type="hidden" id="caret" name="caret">
						<textarea id="content" name="content" placeholder="Write..." hx-trigger="keydown[keyCode==13]" hx-post="sparkUpdate.php" hx-vals='{"page": "<?php echo $saveTo; ?>", js:{content: document.getElementById("content").value}'><?php echo $text; ?></textarea>
						<br><br>
					</form>
					
				</main>
			</div>
			
			<dialog id="vault" style="border: 1px black solid; border-radius: 8px; outline: none; padding: 20px 10px 10px;">
				<div id="list">
				</div>
				<a id="export" href="export.php" style="text-align: left; font-size: 13px; float: right; margin-top: 50px; position: absolute; bottom: 12px; left: 15px; cursor: pointer; outline: none; text-decoration: none;">
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" stroke="currentColor" class="bi bi-save" viewBox="-1 -1 18 18">
					<title>Export</title>
					<path d="M2 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H9.5a1 1 0 0 0-1 1v7.293l2.646-2.647a.5.5 0 0 1 .708.708l-3.5 3.5a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L7.5 9.293V2a2 2 0 0 1 2-2H14a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h2.5a.5.5 0 0 1 0 1H2z"/>
				</svg></a>
				<span id="modal_close" onclick="hide()" style="text-align: right; font-size: 13px; float: right; margin-top: 50px; position: absolute; bottom: 12px; right: 15px; cursor: pointer;">
				<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" stroke="currentColor" class="bi bi-x-circle" viewBox="-1 -1 18 18">
					<title>Close</title>
					<path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
					<path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
				</svg>
				</span>
			</dialog>
					
			<script>
				const textarea = document.querySelector("textarea");
				const content = document.getElementById("content");
				const pageName = document.getElementById("pageName");
				const newBtn = document.getElementById("newBtn");
				const form = document.getElementById("form");
				const messageContainer = document.getElementById('message-container');
				
				if (window.innerWidth > 767) {
					textarea.addEventListener("focus", function() {
						var istext = this.value;
						newBtn.style.display = istext !== "" ? "inline" : "none";
					});
					
					textarea.addEventListener("blur", function() {
						var istext = this.value;
						newBtn.style.display = istext !== "" ? "inline" : "none";
					});
					
					textarea.addEventListener("input", function() {
						var istext = this.value;
						newBtn.style.display = istext !== "" ? "inline" : "none";
					});
				}
				
				function placeCaret() {
					areaLen = textarea.value.length;
					textarea.setSelectionRange(areaLen, areaLen);
					textarea.focus();
					textarea.style.height = textarea.scrollHeight + "px";
					textarea.scrollTop = textarea.scrollHeight;
				}

				//swipe

				myElement = document.getElementById("page");
				
				myElement.addEventListener("touchstart", startTouch, {passive: true});
				myElement.addEventListener("touchmove", moveTouch, {passive: true});
				
				// Swipe Left / Right
				var initialX = null;
				var initialY = null;
				
				function startTouch(e) {
					initialX = e.touches[0].clientX;
					initialY = e.touches[0].clientY;
				};
				
				function moveTouch(e) {
					if (initialX === null) {
						return;
					}
				
					if (initialY === null) {
						return;
					}
				
					var currentX = e.touches[0].clientX;
					var currentY = e.touches[0].clientY;
					
					var diffX = initialX - currentX;
					var diffY = initialY - currentY;
					
					if (Math.abs(diffX) > Math.abs(diffY)) {
						if (diffX > 12) {
							// swiped left
							makeNew()
						}
						if (diffX < -12) {
						  show()
						}
					}  
					
					initialX = null;
					initialY = null;
				}
				
				
				function doSave() {
					if (content = $("#content").val() != '') {
						var pageName = $("#pageName").val();
						var content = $("#content").val();
												
						$.post("sparkUpdate.php", {
						    "page" : "${pageName}",
						    "content" : "${content}",
						    "update" : "yes"
						});
						
						messageContainer.innerHTML = "Saved";
						messageContainer.classList.add("show");
						timeoutId = setTimeout(function() {
							messageContainer.classList.remove("show");
						}, 1000);
						document.getElementById("list").innerHTML = "";
					}
				}
				
				function makeNew() {
					if (content = $("#content").val() != "") {
						var pageName = $("#pageName").val();
						var content = $("#content").val();
						$.post("sparkUpdate.php",
						  {
						    "page" : "${pageName}",
						    "content" : "${content}",
						    "update" : "yes"
						  });
						  
						hide();
						textarea.value = "";
						document.getElementById("pageName").value = Math.round(Date.now() / 1000);
						textarea.focus();
					}
				}
				
				function getSaved(vaultPage) {
				    
				    currentPage = $("#pageName").val();
				    currentContent = $("#content").val();
				    
				    if ($("#content").val() != "") {
				    	var page = 
						$.post("sparkUpdate.php",
						{
						    "page" : $("#pageName").val(),
						    "content" : $("#content").val(),
						    "update" : "yes"
						});
					}
					
					$.get("getVault.php", {
						"page" : vaultPage
					}, function(data) {
						var responseData = data;
						document.getElementById("content").value = responseData;
						doResave(responseData);
					
						$.post("delete.php",
						{
						    "page" : vaultPage,
						    "delete" : "yes"
						});
					}, "text");
					
					document.getElementById("list").scrollLeft = 0;
					document.getElementById("list").innerHTML = "";
				
					hide();
				}
  
				function doResave(responseData) {
				    document.getElementById("pageName").value = Math.round(Date.now() / 1000);
					var newPage = Math.round(Date.now() / 1000);
					var newContent = responseData;
				
				    $.post("sparkUpdate.php",
					{
					    "page" : newPage,
					    "content" : newContent,
					    "update" : "yes"
					});
					
				}
				
				
				function doDelete() {
					var pageName = $("#pageName").val();
					
					$.post("delete.php",
					{
					    "page" : pageName,
					    "delete" : "yes"
					});
					document.getElementById("pageName").value = Math.round(Date.now() / 1000);
					document.getElementById("content").value = "";
					document.getElementById("list").innerHTML = "";
				}
				
				const v = document.getElementById("vault");

				function show() {
					htmx.ajax("GET", "refresh.php?p="+pageName.value, "#list");
					v.showModal();
				}
				
				function hide() {
					v.close();
					document.getElementById("list").innerHTML = "";
				}
			</script>

		</div>
	</div>
</body>
</html>
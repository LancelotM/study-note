<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>标题</title>
</head>
<body>
	<div id="header"></div>
	<div id="main"></div>
	<div id="footer"></div>
	<script src='js/jquery-1.11.3.js'></script>
	<script>
		window.onload=function(){
			$('#header').load('header.php');
			$('#footer').load('footer.php');
		}
	</script>
</body>
</html>
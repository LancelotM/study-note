<!doctype html>
<html>
  <head>
    <title>标题</title>
    <meta charset="utf-8">
  </head>
  <body>
    <h1>练习5-九九乘法表</h1>
	<table width="100%" border="1">
	<tbody>
		<script>
		for(var i=1; i<=9; i++){
			document.write('<tr>');
			for(var j=1; j<=i; j++){
				document.write('<td>');
				document.write(i+'*'+j+'='+(i*j));
				document.write('</td>');
			}
			document.write('</tr>');
		}
		</script>
	</tbody>
	</table>
  </body>
</html>
<!doctype html>
<html>
  <head>
    <title>标题</title>
    <meta charset="utf-8">
  </head>
  <body>
    <h1>练习4-九九乘法表</h1>
	<table width="100%" border="1">
	  <tbody>
	  <?php
		for($i=1; $i<=9; $i++){
			echo '<tr>';
			for($j=1; $j<=$i; $j++){
				echo '<td>';
				echo $i.'*'.$j.'='.($i*$j);
				echo '</td>';
			}
			echo '</tr>';
		}	
	  ?>
	  </tbody>
	</table>
  </body>
</ht<?php echo 'm'; ?>l>
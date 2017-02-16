<!doctype html>
<html>
  <head>
    <title>标题</title>
    <meta charset="utf-8">
  </head>
  <body>
    <h1>练习3</h1>
    <?php
      for($i=0; $i<10; $i++){
		for($j=0; $j<=$i; $j++){
			echo '*';
		}
		echo '<br>';
	  }
    ?>
  </body>
</html>
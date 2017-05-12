<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Documento</title>

	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
	<style type="text/css">
		.draggable{
			cursor: pointer;
		}
	</style>
</head>
<body>

	<?php 
		$db = new PDO('mysql:host=127.0.0.1;dbname=canek;charset=utf8', 'root', 'guoqeuyiejtj');

		include 'models/FooModel.php';

		$fooModel = new FooModel($db);

		$fooList = $fooModel->getAllFoos();
	?>

	<?php foreach ($fooList as $row): ?>
		<img class="draggable" src="img/<?= $row['file'] ?>" style="position: absolute; left: <?= $row['x'] ?>px; top: <?= $row['y'] ?>px;" data-id="<?= $row['id'] ?>">
	<?php endforeach ?>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
	<script>
	  $( function() {
	    $( ".draggable" ).draggable({
	    	stop: function(){
	    		var x = parseInt($(this).css('left'),10);
	    		var y = parseInt($(this).css('top'),10);
	    		var id = $(this).attr('data-id');
	    		$.ajax({
			        url: 'update.php',
			        type: 'GET',
			        data: { id: id, x: x, y: y},
			        success: function (response) {
			            
			        },
			        error: function () {
			           
			        }
			    });
	    	}
	    });
	  } );
	  </script>
</body>
</html>
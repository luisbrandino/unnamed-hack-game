<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Dashboard - Unnamed hack game</title>
  </head>
  <body>

  	<?php include_once 'C:\xampp\unnamed_hack_game\html-content\navbar.php' ?>

  	<center>
	  	<div class="w-50 p3 text-center mt-5 row col-md-4 col-md-push-4">
	  		<table class="table text-center">
			  <thead class="thead-dark">
			    <tr>
			      <th scope="col">Username</th>
			      <th scope="col">Money</th>
			      <th scope="col">Level</th>
			      <th scope="col">Exp</th>
			      <th scope="col">IP</th>
			    </tr>
			  </thead>
			  <tbody>
			    <tr>
			      <td><?= $player->__get('username') ?></td>
			      <td><?= $player->__get('money') ?></td>
			      <td><?= $player->__get('level') ?></td>
			      <td><?= $player->__get('exp') ?></td>
			      <td><?= $player->__get('gameIP') ?></td>
			    </tr>
			  </tbody>
			</table>
	  	</div>
  	</center>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>
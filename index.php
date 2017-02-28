<?php include_once "_partials/header.php" ?>

	<div class="page-header">
		<h1>VERY MUCH TODO LIST</h1>
	</div>

	<?php $data = $database->select('items', [ 'id', 'text' ]); ?>

	<ul id="item-list" class="list-group col-sm-6">
		<?php
			foreach ( $data as $i => $item ) {
				$row = $i + 1;
				echo '<li id="item-'. $item['id'] .'" class="list-group-item '. get_parity($row) .'">';
				echo    $item['text'];
				echo '  <div class="controls pull-right">';
				echo '      <a href="edit.php?id='. $item['id'] .'" class="edit-link">edit</a>';
				echo '      <a href="delete.php?id='. $item['id'] .'" class="delete-link text-muted glyphicon glyphicon-remove"></a>';
				echo '  </div>';
				echo '</li>';
			}
		?>
	</ul>

	<form id="add-form" class="col-sm-6" action="_inc/add-item.php" method="post">
		<p class="form-group">
			<textarea class="form-control" name="message" id="text" rows="3" placeholder="is there something to do?"></textarea>
		</p>
		<p class="form-group submit-button">
			<input class="btn-sm btn-danger" type="submit" value="add new item">
		</p>
	</form>

<?php include_once "_partials/footer.php" ?>
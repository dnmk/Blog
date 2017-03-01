<?php include_once "_partials/header.php" ?>

	<div class="page-header">
	  <h1 class="text-center">Blogger <small>Course project</small></h1>
	</div>

	<form id="add-form" class="col-sm-12" action="_inc/add-item.php" method="post">
		<p class="form-group">
			<textarea class="form-control" name="message" id="text" rows="10" placeholder="Put new post"></textarea>
		</p>
		<p class="form-group submit-button">
			<input class="btn-sm btn-danger center-block" type="submit" value="Add post">
		</p>
	</form>

<?php include_once "_partials/footer.php" ?>

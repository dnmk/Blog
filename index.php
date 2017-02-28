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

	<div class="col-sm-12">
		<div class="embed-responsive embed-responsive-16by9">
  		<iframe class="embed-responsive-item" src="https://www.youtube.com/watch?v=FM7MFYoylVs&index=4&list=PLx0sYbCqOb8TBPRdmBHs5Iftvv9TPboYG"></iframe>
		</div>
	</div>

<?php include_once "_partials/footer.php" ?>

<?php

	require_once '_inc/config.php';

	if ( ! $item = get_item() ) {
		show_404();
	}

	include_once "_partials/header.php";

?>

    <div class="page-header">
        <h1>VERY MUCH EDIT</h1>
    </div>

	<div class="row">
	    <form id="edit-form" class="col-sm-6" action="_inc/edit-item.php" method="post">
	        <p class="form-group">
	            <textarea class="form-control" name="message" id="text" rows="3"><?php echo $item ?></textarea>
	        </p>
	        <p class="form-group">
		        <input name="id" type="hidden" value="<?php echo $_GET['id'] ?>">
	            <input class="btn-sm btn-danger" type="submit" value="edit item">
		        <span class="controls">
			        <a href="<?php echo $base_url ?>" class="back-link text-muted">back</a>
		        </span>
	        </p>
	    </form>
	</div>

<?php include_once "_partials/footer.php" ?>

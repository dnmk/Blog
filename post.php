<?php

	try{

		$post = get_post();

	}catch (PDOException $e){

		$post = false;

		get_error($e);

	}


	if (! $post){

		flash()->error("This post doesn't exist");
		redirect('/');

	}

	$post_title = $post->title;

	include_once "_partials/header.php";

?>

    <div class="page-header text-center">
        <h1>POST PAGE</h1>

		<div class="container">
			<?= $post->text  ?>
		</div>

		<div class="btn-group btn-group-sm pull-left">
			<a href="<?= BASE_URL ?>" class="btn btn-default"> <-- Back </a>
		</div>
    </div>

<?php include_once "_partials/footer.php" ?>

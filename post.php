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

include_once "_partials/header.php";

?>

    <div class="page-header text-center">
        <h1>POST PAGE</h1>

		<div class="container">
			<?= $post->text  ?>
		</div>
    </div>

<?php include_once "_partials/footer.php" ?>

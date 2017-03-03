<?php

	$results = get_posts();

	try{

		$results = get_posts();

	}catch (PDOException $e){

		$results = [];

	}


	include_once '_partials/header.php'


?>

<div class="page-header">
	<h1 class="text-center">Dashboard</h1>
	<?php if ( count( $results ) ) : foreach ($results as $post) : ?>
		<div class="row">
			<div class="col-sm-6 col-sm-offset-3">
				<article id="pos-<?= $post->id ?>" class="post">
					<header class="post-header">
						<h2>
							<a href="<?= $post->link ?>">
								<?= $post->title ?>
							</a>
						</h2>

						<time datetime="<?= $post->date ?>">
							<small> / <?= $post->time ?></small>
						</time>
					</header>

					<div class="post-content">
						<p>
							<?= $post->teaser ?>
						</p>
					</div>

					<div class="footer post-footer">
						<a class="read-more" href="<?= $post->link ?>">
							// read more >>
						</a>
					</div>

					<div class="tags">
						<p>
							<?=  $post->tags ?>
						</p>
					</div>

				</article>
			</div>
		</div>
	<?php endforeach; else: ?>

		<p>
			I have nothing to show
		</p>

	<?php endif; ?>

	</div>

<?php include_once '_partials/footer.php' ?>

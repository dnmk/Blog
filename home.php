<?php

	$results = get_posts();

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
									<a href="<?= BASE_URL ?>/post/<?= $post->id ?>/<?= plain( $post->slug ) ?>">
										<?= plain($post->title) ?>
									</a>
								</h2>

								<time datetime="<?= date( 'Y-m-d', strtotime( $post->created_at ) ) ?>">
									<small> / <?= date('j M Y, G:i', strtotime( $post->created_at ) ) ?></small>
								</time>
							</header>

							<div class="post-content">
								<p>
									<?= word_limiter(plain($post->text), 20) ?>
								</p>
							</div>

							<div class="footer post-footer">
								<a class="read-more" href="<?= BASE_URL ?>/post/<?= $post->id ?>/<?= plain( $post->slug ) ?>">
									// read more >>
								</a>
							</div>
						</article>
					</div>
				</div>


		<?php endforeach; else: ?>

			<p>
				We got nothing
			</p>


		<?php endif; ?>

	</div>

<?php include_once '_partials/footer.php' ?>

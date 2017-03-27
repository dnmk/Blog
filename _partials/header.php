<?php require_once '_inc/config.php' ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>
		<?=
			(isset($post_title) ? "$post_title / " : '')
		?>

		Blog
	</title>

	<link rel="stylesheet" href=" <?= asset('/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" href=" <?= asset('/css/main.css') ?>">

	<script>
		var baseURL = '<?php echo BASE_URL ?>';
	</script>
</head>
<body>

<header class="container">
	<?= flash()->display() ?>
</header>

<main>
	<div class="container">

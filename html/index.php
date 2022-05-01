<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="./style/style.css">
<<<<<<< Updated upstream
=======
	<link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.css" rel="stylesheet">
>>>>>>> Stashed changes
	<title>Docker PHP template</title>
</head>
<body>
<<<<<<< Updated upstream
	Hello world!
=======
	<header class="px-2">
		<nav class="navbar navbar-light bg-light">
			<div class="container-fluid">
				<a class="navbar-brand">PHP course work</a>
				<a type="button" class="mt-4 mb-4 btn btn-primary" data-mdb-toggle="modal" href="./login_page/login.php" \>
					<?php
					$auth = 0;
					if ($auth == 0) { // Авторизация где-то здесь
						echo "Sign in";
					} else {
						echo "Log out";
					}

					?>
				</a>
			</div>
		</nav>
	</header>



	<div class="d-flex justify-content-center add-link">
		<a type="button" class="mt-2 mb-4 btn btn-primary" href="./add_message_page/add_message.php">
			Add message
		</a>
	</div>
	<main class="container d-flex">
		<div class="container">
			<div class="input-group mt-2 mb-4">
				<input type="search" class="form-control rounded" placeholder="type here a tag or a field of expertise of the message you searching" aria-label="Search" aria-describedby="search-addon" />
				<button type="button" class="btn btn-outline-primary">search</button>
			</div>

			<div class="mt-2 border border-2 ps-3">
				<?php
				echo "thread with all the messages in there" // Все доступные сообщения здесь 
				?>

			</div>
		</div>
	</main>

	<!-- MDB -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.js"></script>

>>>>>>> Stashed changes
	<?php include('backend/script.php') ?>
	<script src="./script/script.js"></script>
</body>
</html>

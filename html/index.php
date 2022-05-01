<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="./style/style.css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.css" rel="stylesheet">
	<title>Docker PHP template</title>
</head>

<body>
	<header class="px-2">
		<nav class="navbar navbar-light bg-light">
			<div class="container-fluid">
				<a class="navbar-brand">PHP course work</a>
				<a type="button" class="mt-4 mb-4 btn btn-primary" data-mdb-toggle="modal" href="./login_page/login.php">
					Log out
				</a>
			</div>
		</nav>
	</header>

	<main class="container d-flex mt-10">


		<div class="container">
			<div class="d-flex justify-content-center">
				<?php
				echo "Hi, Username, here you can" ?>
			</div>
			<div class="d-flex justify-content-center">
				<button type="button" class="mt-2 mb-4 btn btn-primary" data-mdb-toggle="modal" data-mdb-target="#ModalCenter">
					Add message
				</button>
			</div>
			<!-- modal window -->
			<div class="modal fade" id="ModalCenter" tabindex="-1" role="dialog" aria-labelledby="ModalCenterTitle" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="ModalLongTitle">Add message</h5>
							<button type="button" class="close" data-mdb-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<h6 class="modal-title" id="ModalLongTitle">message text</h6>
							<textarea class="form-control" id="message-text" v-model="newImageSource" placeholder="Simple wine cake. This cake was sent home from our children's school. It is the simplest, best-tasting cake I've ever made. Great to make with the kids, especially for cupcakes."></textarea>
							<h6 class="modal-title" id="ModalLongTitle">tag</h6>
							<textarea class="form-control" id="message-text" v-model="newImageName" placeholder="#cake"></textarea>
							<div class="form-check my-2">
								<input class="form-check-input" type="radio" name="flexRadioDefault" id="public" checked>
								<label class="form-check-label" for="public">
									Public message
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="radio" name="flexRadioDefault" id="private">
								<label class="form-check-label" for="private">
									Private message
								</label>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
							<button v-on:click="addImage()" :disabled="!isComplete" data-mdb-dismiss="modal" type="button" class="btn btn-primary">Add</button>
						</div>
					</div>
				</div>
			</div>

			<div class="input-group mt-2 mb-4">
				<input type="search" class="form-control rounded" placeholder="type here the tag of the message you searching" aria-label="Search" aria-describedby="search-addon" />
				<button type="button" class="btn btn-outline-primary">search</button>
			</div>

			<div class="mt-2 border border-2 ps-3">
				<?php
				echo "thread with all the messages in there"
				?>

			</div>
		</div>
	</main>
	<!-- MDB -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.js"></script>
</body>

</html>
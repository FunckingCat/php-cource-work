<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="./style/style.css">
	<title>Docker PHP template</title>
</head>
<body>
	<?php include('backend/script.php') ?>
    <form method="post" action="./backend/add_message_form.php">
        Your name: <br>
        <input type="text" name="name"><br>
        <br>

        Your email: <br>
        <input type="text" name="email"><br>
        <br>

        Your comments: <br>
        <textarea name="comment" rows="15" cols="50"></textarea><br><br>

        <input type="submit" value="Submit">
    </form>
    <a href="./index.php">Home</a>
	<script src="./script/script.js"></script>
</body>
</html>

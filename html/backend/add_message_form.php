<?php
    include ('./database.php');

    post_message(
        $_POST['comment'],
        '2',
        '3',
        '4',
        true
    );
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div>
    <a href="../index.php">Go home</a>
</div>
<div>
    <?php
        print_result(exec_query("SELECT * FROM Messages"));
    ?>
</div>
</body>
</html>
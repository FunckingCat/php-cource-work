<?php
session_start();
include './backend/get_data.php';
?>

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
    <nav class="navbar navbar-dark bg-dark rounded">
        <div class="container-fluid">
            <a class="navbar-brand">
                <?php
                    echo $_SESSION['username'] . " | " . $_SESSION['login'];
                ?>
            </a>
            <a type="button" class="mt-4 mb-4 btn btn-success" data-mdb-toggle="modal" href="./index.php" \>
                Log out
            </a>
        </div>
    </nav>
</header>


<div class="mt-7 ps-3 container d-flex flex-wrap align-items-center justify-content-center">
    <?php


    $errors = 0;
    if ($_POST['channel']) { // Если канал существует/несуществует
        $channels = getChannels();
        if (in_array($_POST['channel'], $channels)) {
            $channelInfo = getChannelByName($_POST['channel'])->fetch_assoc();
            echo '<div class="mt-3  border border_2"><p> Hi there, this is channel named</p><h3>' . $channelInfo['name']
                . '</h3></p>' . '<p>Channel description:</p><h4>' . $channelInfo['description'] . '</h4></div>';
        } else {
            echo '<div class="mt-3  border border_2"><h3>There is no channel named "' . $_POST['channel'] .
                '"</h3><p>maybe you made a mistake in your request</p></div>';
            $errors++;
        }
    }

    if ($_POST['tag']) { //Если тега не существует
        $tags = getTags();
        if (!in_array($_POST['tag'], $tags)) {
            echo '<div class="mt-3  border border_2"><h3>There is no tag named "' . $_POST['tag'] .
                '"</h3><p>maybe you made a mistake in your request</p></div>';
            $errors++;
        }
    }

    if ($_POST['topic']) { // Если топик существует
        $topics = getTopics();
        if (in_array($_POST['topic'], $topics)) {
            $topicInfo = getTopicByName($_POST['topic'])->fetch_assoc();
            echo '<div class="mt-3  border border_2"><p>Topic: ' . $topicInfo['title'] . '</p>'
                . '<p>Topic description: ' . $topicInfo['description'] . '</p></div>';
        } else {
            echo '<div class="mt-3  border border_2"><h3>There is no topic named "' . $_POST['topic'] .
                '"</h3><p>maybe you made a mistake in your request</p></div>';
            $errors++;
        }
    }

    if ($errors) {
        return 0;
    }

    $messages = getMessages($_POST['channel'], $_POST['tag'], $_POST['topic']);
    if (!$messages) {
        return 0;
    }
    for ($n = 0; $n < count($messages); $n++): ?>
        <div class="card text-white bg-dark m-2" style="width: 18rem;">
            <div class="card-header">
                <?php echo $messages[$n]['channel'] ?>
                <?php echo ' #' . $messages[$n]['hashtag'] ?>
            </div>
            <div class="card-body text-dark">
                <div class="card-text text-white"><?php echo $messages[$n]['body'] ?></div>
                <div class="card-text"><small class="text-muted"><?php echo 'User: ' . $messages[$n]['username'] ?></small></div>
                <div class="card-text"><small class="text-muted"><?php echo 'at ' . $messages[$n]["dispatch_time"] ?></small></div>
            </div>
        </div>
    <?php endfor; ?>
</div>

<!-- <div class="card border-dark mb-3" style="max-width: 18rem;">
  <div class="card-header"><?php echo 'Channel: ' . $messages[$n]['channel'] ?></div>
  <div class="card-body text-dark">
    <h5 class="card-title"><?php echo 'Hashtag: ' . $messages[$n]['hashtag'] ?></h5>
    <p class="card-text"><?php echo $messages[$n]['body'] ?></p>
    <p class="card-text"><small class="text-muted"><?php echo 'User: ' . $messages[$n]['username'] ?></small></p>
    <p class="card-text"><small class="text-muted"><?php echo 'at ' . $messages[$n]["dispatch_time"] ?></small></p>
  </div>
</div> -->

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.js"></script>
<script src="./script/script.js"></script>
</body>

</html>
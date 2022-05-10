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
    <link rel="stylesheet" href="./style.scss">
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


    <main class="container d-flex mt-2">

        <div class="container">

            <h2>New message</h2>

            <form method="post" action="./backend/post_message.php">

                <div class="input-group mt-2 mb-4 d-flex flex-column">
                    <label for="tag">Tag</label>
                    <input id="tag" class="w-100 form-control rounded" list="tags" name="tag" placeholder="Select tag or make new one" required>
                    <datalist id="tags">
                        <?php
                        $tags = getTags();
                        for ($n = 0; $n < count($tags); $n++) {
                            echo '<option value="' . $tags[$n] . '">';
                        }
                        ?>
                    </datalist>
                </div>
                <div class="input-group mt-2 mb-4 d-flex flex-column">
                    <label for="channel">Channel</label>
                    <input id="channel" class="w-100 form-control rounded" list="channels" name="channel" placeholder="Select channel or make new one" required>

                    <datalist id="channels">

                        <?php
                        $channels = getChannels();
                        for ($n = 0; $n < count($channels); $n++) {
                            echo '<option value="' . $channels[$n] . '">'; // Вывод каналов
                        }
                        ?>

                    </datalist>
                </div>

                <div class="input-group mt-2 mb-4 d-flex flex-column">
                    <label for="message-text" class="mt-2">Message</label>
                    <textarea class="form-control w-100 mb-2" name="message" id="message-text" style="height:10rem;" required
                    placeholder="Дорогой дневник, мне не подобрать слов, чтобы описать боль и унижение, которое я испытал сегодня..."></textarea>
                </div>
                    
                <div class="d-flex align-items-center justify-content-around my-4">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="message-type" id="public" value="public" checked>
                        <label class="form-check-label" for="public">
                            Public
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="message-type" id="private" value="private">
                        <label class="form-check-label" for="private">
                            Private message
                        </label>
                    </div>
                </div>

                <button type="submit" class="btn btn-block btn-success">Add</button>
            </form>
            <a type="button" class="mt-2 mb-4 btn btn-dark btn-block" href="./search.php">
                Back
            </a>
    </main>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.js"></script>

    <script src="./script/script.js"></script>
</body>

</html>
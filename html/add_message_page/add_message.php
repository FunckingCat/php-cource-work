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
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid d-flex justify-content-between">
                <div class="d-flex">
                    <a class="navbar-brand" href="../index.php">PHP course work</a>
                    <a type="button" class="mt-3 mb-3 btn btn-primary" href="../index.php">back to all messages</a>
                </div>
                <a type="button" class="mt-4 mb-4 btn btn-primary" data-mdb-toggle="modal" href="../login_page/login.php">
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


    <main class="container d-flex mt-10">

        <div class="container">
            <div class="d-flex justify-content-center">
                <?php
                echo "Hi, Username, here you can" //Имя пользователя 
                ?>
            </div>


            <h2>Add message</h2>

            <form method="post" action="//httpbin.org/post">
                <label for="message-text" class="mt-2">message text</label>
                <textarea class="form-control mb-2" name="message" id="message-text" style="height:10rem;" placeholder="Simple wine cake. This cake was sent home from our children's school. It is the simplest, best-tasting cake I've ever made. Great to make with the kids, especially for cupcakes."></textarea>
                <label for="tag">tag</label>
                <input id="tag" list="tags" name="tag" placeholder="cake">

                <datalist id="tags">

                    <?php
                    $tagsCount = 4;
                    for ($n = 0; $n <= $tagsCount; $n++) {
                        echo '<option value="Internet Explorer">'; // Вывод уже существующих тэгов
                    }
                    ?>

                </datalist>

                <div class="form-check my-2">
                    <input class="form-check-input" type="radio" name="message-type" id="public" value="public" checked>
                    <label class="form-check-label" for="public">
                        Public message
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="message-type" id="private" value="private">
                    <label class="form-check-label" for="private">
                        Private message
                    </label>
                </div>
                <div class="">
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
    </main>

    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.js"></script>

    <?php include('backend/script.php') ?>
    <script src="./script/script.js"></script>
</body>

</html>
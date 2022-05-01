<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/style.css">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.css" rel="stylesheet">

    <title>Docker PHP template</title>
    <?php include './backend/get_data.php'; ?>
</head>

<body>

    <header class="px-2">
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
                <div class="d-flex">
                    <a class="navbar-brand" href="../index.php">PHP course work</a>
                    <a type="button" class="mt-3 mb-3 btn btn-primary" href="./search.php">back to all messages</a>
                </div>
                <a type="button" class="mt-4 mb-4 btn btn-primary" data-mdb-toggle="modal" href="./index.php" \>
                    Log out
                </a>
            </div>
        </nav>
    </header>


    <div class="mt-2 border border-2 ps-3">
        <?php
        $channelName = 'rap';
        $messages = getMessagesByChannelName(); //
        
        ?>

    </div>


    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.js"></script>
    <script src="./script/script.js"></script>
</body>

</html>
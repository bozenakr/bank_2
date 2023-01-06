<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle ?? 'Untitled Page' ?></title>
    <!-- mano URL is index.php -->
    <script src="<?= URL . 'app.js' ?>"></script>
    <link rel="stylesheet" href="<?= URL . 'app.css' ?>">
</head>

<body>
    <header>
        <div class="container header">
            <div class="header-menu">
                <img class="logo" src="/assets/logoIdea.jpg" alt="logo">
                <a class="header-link" href="http://bank2.lt/clients">Client list</a>
                <a class="header-link" href="http://bank2.lt/clients/create">New account</a>
            </div>
            <!-- <form action="http://localhost/php/bank/php/login.php?logout" method="post"> -->
            <button type="submit" class="btn btn-logout">Logout</button>
            </form>
        </div>
        </div>
    </header>
</body>

</html>
<?php

# Configuration file
require_once(__DIR__.'/config/app.php');

use DaniMathGames\SafeBox\Game;

# Get requested page
$getViewInput = filter_input(INPUT_GET, 'p', FILTER_DEFAULT);
$getView = empty($getViewInput) ? 'home' : $getViewInput;

?>

<html lang="en">
    <head>
        <meta charset="utf-8">

        <title>Dani Math Games | Cofre</title>

        <link rel="stylesheet" href="<?= STORAGE_URL ?>/css/styles.css">

        <style>
            body {
                background: url("<?= STORAGE_URL . '/img/backgrounds/' . Game::getBackground() ?>")  no-repeat center center fixed;
                background-size: cover;
                height: 100%;
                overflow: hidden;
            }
        </style>
    </head>

    <body>

        <div class="content">

            <?php
                # Page content
                if (!empty($getView)) {
                    $includePath = THEME_FOLDER . '/' . strip_tags(trim($getView)) . '.php';
                } else {
                    $includePath = THEME_FOLDER . '/layout/' . '404.php';
                }

                if (file_exists($includePath)) {
                    require_once($includePath);
                } else {
                    require_once(THEME_FOLDER . '/layout/' . '404.php');
                }
            ?>

        </div>

        <!-- jquery -->
        <script src="<?= ROOT_URL ?>/node_modules/jquery/dist/jquery.min.js"></script>
        <!-- sweetalert2 -->
        <script src="<?= ROOT_URL ?>/node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
        <!-- app custom -->
        <script src="<?= STORAGE_URL ?>/js/scripts.js"></script>

    </body>
</html>
<?php

use DaniMathGames\SafeBox\Game;

if((!isset($_GET['question']) && !isset($_GET['answer']) && !isset($_GET['map']))){
    ?> <script>window.location.href = '?p=run&map';</script> <?php
}

if (isset($_GET['map'])) {
    require_once('map.php');
}

if (isset($_GET['question'])) {
    require_once('question.php');
}

if (isset($_GET['answer'])) {
    require_once('answer.php');
}

?>



<?php

use DaniMathGames\SafeBox\Game;

if (!Game::isRunning()) {
    ?> <script>window.location.href = '?p=home';</script> <?php
}

$mapBackground = 'map-' . $_SESSION['step'] . '.png';
?>

<div class="mapa">

    <img src="<?= STORAGE_URL ?>/img/maps/<?= $mapBackground ?>" />


    <div class="botao">
        <a href="?p=run&question">
            <img src="<?= STORAGE_URL ?>/img/buttons/button-avancar.png" />
        </a>
    </div>

</div>
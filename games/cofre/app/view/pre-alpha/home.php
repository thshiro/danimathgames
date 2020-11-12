<?php

use DaniMathGames\SafeBox\Game;

if (Game::isRunning()) {
  ?> <script>window.location.href = '?p=run&map';</script> <?php
}

?>

<div class="inicio">
    <div>
        <img src="<?= STORAGE_URL ?>/img/home.png" />
    </div>

    <a href="?p=regras">
        <img src="<?= STORAGE_URL ?>/img/buttons/button-jogar.png" />
    </a>
</div>
<?php 

Use DaniMathGames\SafeBox\BoxPasswords;
use DaniMathGames\SafeBox\Game;


?>
<!-- IF ANSWER IS WRONG -->
<?php if (isset($_SESSION['status']) && $_SESSION['answer'] == false) { ?>

<div class="answer-result">

    <img src="<?= STORAGE_URL ?>/img/questions/question-wrong.png" />

    <div class="botao">
        <a href="?p=home">
            <img src="<?= STORAGE_URL ?>/img/buttons/button-reiniciar-green.png" />
        </a>
    </div>

</div>

<?php } ?>

<!-- IF ANSWER IS WRONG -->
<?php 

if (isset($_SESSION['status']) && $_SESSION['answer'] == true) { 
    
    if (!Game::isRunning()) {
        ?> <script>window.location.href = '?p=home';</script> <?php
    }

    if ($_SESSION['step'] % 2 == 0) { ?>

        <div class="answer-result">

            <img src="<?= STORAGE_URL ?>/img/questions/question-correct-tip.png" />

            <p class="dica">
                <?= $currentTip = BoxPasswords::getTip($_SESSION['password'], $_SESSION['step'] / 2); ?>
            </p>

            <div class="botao" style="margin-top:50px">
                <a href="?p=home">
                    <img src="<?= STORAGE_URL ?>/img/buttons/button-continuar.png" />
                </a>
            </div>

        </div>

    <?php } else { ?>
        <div class="answer-result">

            <img src="<?= STORAGE_URL ?>/img/questions/question-correct.png" />

            <div class="botao">
                <a href="?p=home">
                    <img src="<?= STORAGE_URL ?>/img/buttons/button-continuar.png" />
                </a>
            </div>

        </div>
    <?php }
}
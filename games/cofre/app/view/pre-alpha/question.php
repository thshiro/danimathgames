<?php

use DaniMathGames\SafeBox\BoxPasswords;
use DaniMathGames\SafeBox\Game;
use DaniMathGames\SafeBox\Questions;

if (!Game::isRunning()) {
    ?> <script>window.location.href = '?p=home';</script> <?php
}


$finalQuestion = $_SESSION['step'] == 12 ? true : false;

if ($finalQuestion) {
    $currentQuestion = $_SESSION['password'];

    $currentQuestionData = BoxPasswords::getPasswords($currentQuestion);
} else {
    $currentQuestion = $_SESSION['questions'][$_SESSION['step']-1];

    $currentQuestionData = Questions::getQuestions($currentQuestion);
}

$questionBackground = 'question-' . $_SESSION['step'] . '.png';

?>


<div class="box-questions">

    <div class="question">
        
        <img src="<?= STORAGE_URL ?>/img/questions/<?= $questionBackground ?>" />
        
        <p <?= strlen($currentQuestionData['question']) > 355 ? "style='font-size:1.5vw'" : '' ?>>
            <?= $currentQuestionData['question'] ?>
        </p>

        <?php if ($finalQuestion) { ?>
            <a href="#" class="botao-ver-dicas">Ver todas as dicas</a>
        <?php } ?>
    </div>

    <div class="answers">

        <div class="botoes">
        <?php
            foreach ($currentQuestionData['answers'] as $key => $value) {
                ?>
                <form class="botao" action="javascript:void(0)" enctype="multipart/form-data" name="question-answer-<?= $key ?>" onsubmit="ajaxForm('question-answer-<?= $key ?>', true, true, '', '?p=run&answer')">

                    <input type="hidden" name="callback" value="<?= ($finalQuestion) ? 'BoxPasswords' : 'Questions' ?>" />
                    <input type="hidden" name="callback_action" value="checkAnswer" />

                    <input type="hidden" name="question" value="<?= $currentQuestion ?>" />
                    <input type="hidden" name="answer" value="<?= $key ?>" />

                    <img src="<?= STORAGE_URL ?>/img/buttons/button-pergunta.png" width="80%"/>

                    <a href="#" onclick="$(`form[name='question-answer-<?= $key ?>']`).submit()" <?= strlen($currentQuestionData['question']) < 10 ? "style='font-size:1.8vw'" : '' ?>>
                        <?= $value['text'] ?>
                    </a>
                </form>
            <?php
            }
        ?>
        </div>
        
    </div>

</div>


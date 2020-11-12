<?php


namespace DaniMathGames\SafeBox;

class Questions extends QuestionsData
{

    /**
     * Get one or all questions by key
     *
     * @param int $question The key of the question
     * @param int $qty The quantity of questions to return
     *
     * @return array DaniMathGames\SafeBox\QuestionsData::$questions
     */
    public static function getQuestions($question = false, $qty = 11)
    {
        if ($question !== false) {
            return Self::$questions[$question];
        }

        $question = array_rand(Self::$questions, $qty);
        
        shuffle($question);

        return $question;
    }

    
    /**
     * Check if a answer is correct
     *
     * @param POST $post Data with the ['question'] and the ['answer'] selected
     *
     * @return void
     */
    public function checkAnswer($post)
    {
        $question = $post['question'];
        $answer = $post['answer'];

        if (Self::getQuestions($question)['answers'][$answer]['value'] === true) {
            $_SESSION['step'] += 1;
            $_SESSION['answer'] = true;
        } else {
            $_SESSION['status'] = 'ended';
            $_SESSION['answer'] = false;
        }
    }
}

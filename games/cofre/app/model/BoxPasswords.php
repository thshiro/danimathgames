<?php

namespace DaniMathGames\SafeBox;

class BoxPasswords extends BoxPasswordsData
{

    /**
     * Get one or all safebox passwords
     * 
     * @param int $password If get one password by key
     * 
     * @return array DaniMathGames\SafeBox\BoxPasswordData::$passwords
     */
    public static function getPasswords($password = false)
    {
        if ($password !== false) { 
            return Self::$passwords[$password];
        }

        return array_rand(Self::$passwords, 1);
    }

    /**
     * Get the tip of a password by key
     * 
     * @param int $password The password key
     * @param int $tip The tip key
     * 
     * @return array DaniMathGames\SafeBox\BoxPasswordData::$passwords
     */
    public static function getTip($password, $tip)
    {
        return Self::$passwords[$password]['tips'][$tip];
    }

    /**
     * Check if a answer is correct
     *
     * @param POST $post Data with the ['password'] and the ['answer'] selected
     *
     * @return void
     */
    public function checkAnswer($post)
    {
        $question = $post['question'];
        $answer = $post['answer'];

        if (Self::getPasswords($question)['answers'][$answer]['value'] === true) {
            $_SESSION['victory'] = true;
            $_SESSION['answer'] = true;
        } else {
            $_SESSION['status'] = 'ended';
            $_SESSION['answer'] = false;
        }
    }

}

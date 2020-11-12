<?php

namespace DaniMathGames\SafeBox;

use DaniMathGames\SafeBox\Questions;
use DaniMathGames\SafeBox\BoxPasswords;

class Game
{

    /**
     * Start the game
     *
     * @return void
     */
    public function start()
    {
        $_SESSION['status'] = 'running';
        $_SESSION['step'] = 1;
        $_SESSION['questions'] = Questions::getQuestions();
        $_SESSION['password'] = BoxPasswords::getPasswords();
    }

    /**
     * End the game
     *
     * @return void
     */
    public function end()
    {
        $_SESSION['status'] = 'ended';
    }

    /**
     * Check if the game is running
     *
     * @return bool
     */
    public static function isRunning()
    {
        if (isset($_SESSION['status']) && ($_SESSION['status'] == 'running')) {
            return true;
        }

        return false;
    }

    /**
     * Returns the background image for the current page
     *
     * @return string
     */
    public static function getBackground()
    {
        if (
            isset($_GET['p']) &&
            (
                $_GET['p'] == 'home' 
                ||
                $_GET['p'] == 'regras'
            ) 
            ||
            isset($_GET['question'])
            ||
            !isset($_GET['p'])
        ) {
            return 'blue.png';
        }

        if (isset($_GET['map'])) {
            return 'green.png';
        }

        if (isset($_GET['answer']) & $_SESSION['answer'] == false) {
            return 'red-stripes.png';
        } else { 
            return 'green-stripes.png';
        }
    }
}

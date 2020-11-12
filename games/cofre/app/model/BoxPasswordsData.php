<?php

namespace DaniMathGames\SafeBox;

class BoxPasswordsData
{

    /**
     * @var array
     *
     * The passwords (final answer) of the game
     */
    protected static $passwords = [

        1 => [
            'question' => "Qual é a senha do cofre?",
            'answers' => [
                1 => ['text' => '154.981', 'value' => false],
                2 => ['text' => '156.983', 'value' => false],
                3 => ['text' => '156.982', 'value' => false],
                4 => ['text' => '157.982', 'value' => true],
            ],
            'tips' => [
                1 => 'O NÚMERO CORRESPONDENTE A CHAVE DO CADEADO DO COFRE POSSUI 6 ORDENS',
                2 => 'A TERCEIRA ORDEM DO NÚMERO CORRESPONDENTE A CHAVE DO CADEADO DO COFRE É UM NÚMERO IMPAR',
                3 => 'O NÚMERO CORRESPONDENTE A CHAVE DO CADEADO DO COFRE É UM NÚMERO PAR',
                4 => 'O VALOR POSICIONAL DO ALGARISMO 5 NA CHAVE CORRESPONDE A 5 DEZENAS DE MILHAR',
                5 => 'O ALGARISMO DAS DEZENAS SIMPLES CORRESPONDE A 4 VEZES AO DAS UNIDADES SIMPLES',
                6 => 'O ALGARISMO CORRESPONDENTE A 3ª ORDEM É O TRIPLO DE 3',
                8 => 'O VALOR ABSOLUTO CORRESPONDENTE A UNIDADE DE MILHAR VALE O TRIPLO DA UNIDADE SIMPLES',
                7 => 'O ALGARISMO CORRESPONDENTE A MAIOR ORDEM PAR É O 1',
            ]
        ]
    ];
}

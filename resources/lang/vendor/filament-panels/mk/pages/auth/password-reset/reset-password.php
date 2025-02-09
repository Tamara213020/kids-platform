<?php

return [

    'title' => 'Ресетирајте ја вашата лозинка',

    'heading' => 'Ресетирајте ја вашата лозинка',

    'form' => [

        'email' => [
            'label' => 'Е-пошта',
        ],

        'password' => [
            'label' => 'Лозинка',
            'validation_attribute' => 'лозинка',
        ],

        'password_confirmation' => [
            'label' => 'Потврди лозинка',
        ],

        'actions' => [

            'reset' => [
                'label' => 'Ресетирај лозинка',
            ],

        ],

    ],

    'notifications' => [

        'throttled' => [
            'title' => 'Преголем број на обиди за ресетирање на лозинка',
            'body' => 'Ве молиме обидете се повторно по :seconds секунди.',
        ],

    ],

];


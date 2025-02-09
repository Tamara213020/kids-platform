<?php

return [

    'title' => 'Регистрирај се',

    'heading' => 'Регистрирај се',

    'actions' => [

        'login' => [
            'before' => 'или',
            'label' => 'најавете се на вашиот профил',
        ],

    ],

    'form' => [

        'email' => [
            'label' => 'Е-пошта',
        ],

        'name' => [
            'label' => 'Име',
        ],

        'password' => [
            'label' => 'Лозинка',
            'validation_attribute' => 'лозинка',
        ],

        'password_confirmation' => [
            'label' => 'Потврди лозинка',
        ],

        'actions' => [

            'register' => [
                'label' => 'Регистрирај се',
            ],

        ],

    ],

    'notifications' => [

        'throttled' => [
            'title' => 'Преголем број на обиди за регистрација',
            'body' => 'Ве молиме обидете се повторно по :seconds секунди.',
        ],

    ],

];


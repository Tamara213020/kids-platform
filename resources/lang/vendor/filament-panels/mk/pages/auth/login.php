<?php

return [

    'title' => 'Најави се',

    'heading' => 'Најави се',

    'actions' => [

        'register' => [
            'before' => 'или',
            'label' => 'регистрирај се за профил',
        ],

        'request_password_reset' => [
            'label' => 'Заборавена лозинка?',
        ],

    ],

    'form' => [

        'email' => [
            'label' => 'Е-пошта',
        ],

        'password' => [
            'label' => 'Лозинка',
        ],

        'remember' => [
            'label' => 'Запамти ме',
        ],

        'actions' => [

            'authenticate' => [
                'label' => 'Најави се',
            ],

        ],

    ],

    'messages' => [

        'failed' => 'Овие информации не се совпаѓаат со нашите записи.',

    ],

    'notifications' => [

        'throttled' => [
            'title' => 'Преголем број на обиди за најава',
            'body' => 'Ве молиме обидете се повторно по :seconds секунди.',
        ],

    ],

];


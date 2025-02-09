<?php

return [

    'label' => 'Навигација за страницирање',

    'overview' => '{1} Прикажува 1 резултат|[2,*] Прикажува од :first до :last од вкупно :total резултати',

    'fields' => [

        'records_per_page' => [

            'label' => 'По страна',

            'options' => [
                'all' => 'Сите',
            ],

        ],

    ],

    'actions' => [

        'go_to_page' => [
            'label' => 'Оди на страница :page',
        ],

        'next' => [
            'label' => 'Следна',
        ],

        'previous' => [
            'label' => 'Претходна',
        ],

    ],

];

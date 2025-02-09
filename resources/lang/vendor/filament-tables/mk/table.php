<?php

return [

    'column_toggle' => [

        'heading' => 'Колони',

    ],

    'columns' => [

        'text' => [

            'actions' => [
                'collapse_list' => 'Прикажи :count помалку',
                'expand_list' => 'Прикажи :count повеќе',
            ],

            'more_list_items' => 'и :count повеќе',

        ],

    ],

    'fields' => [

        'bulk_select_page' => [
            'label' => 'Одбери/прифати ги сите ставки за масовни акции.',
        ],

        'bulk_select_record' => [
            'label' => 'Одбери/прифати ја ставката :key за масовни акции.',
        ],

        'bulk_select_group' => [
            'label' => 'Одбери/прифати групата :title за масовни акции.',
        ],

        'search' => [
            'label' => 'Пребарај',
            'placeholder' => 'Пребарај',
            'indicator' => 'Пребарувај',
        ],

    ],

    'summary' => [

        'heading' => 'Свод',

        'subheadings' => [
            'all' => 'Сите :label',
            'group' => ':group свод',
            'page' => 'Оваа страница',
        ],

        'summarizers' => [

            'average' => [
                'label' => 'Просек',
            ],

            'count' => [
                'label' => 'Број',
            ],

            'sum' => [
                'label' => 'Сума',
            ],

        ],

    ],

    'actions' => [

        'disable_reordering' => [
            'label' => 'Заврши со преуредување на записи',
        ],

        'enable_reordering' => [
            'label' => 'Преуреди записи',
        ],

        'filter' => [
            'label' => 'Филтер',
        ],

        'group' => [
            'label' => 'Група',
        ],

        'open_bulk_actions' => [
            'label' => 'Масовни акции',
        ],

        'toggle_columns' => [
            'label' => 'Преклопување на колони',
        ],

    ],

    'empty' => [

        'heading' => 'Нема :model',

        'description' => 'Креирајте :model за да започнете.',

    ],

    'filters' => [

        'actions' => [

            'remove' => [
                'label' => 'Отстрани филтер',
            ],

            'remove_all' => [
                'label' => 'Отстрани ги сите филтри',
                'tooltip' => 'Отстрани ги сите филтри',
            ],

            'reset' => [
                'label' => 'Ресетирај',
            ],

        ],

        'heading' => 'Филтри',

        'indicator' => 'Активни филтри',

        'multi_select' => [
            'placeholder' => 'Сите',
        ],

        'select' => [
            'placeholder' => 'Сите',
        ],

        'trashed' => [

            'label' => 'Избришани записи',

            'only_trashed' => 'Само избришани записи',

            'with_trashed' => 'Со избришани записи',

            'without_trashed' => 'Без избришани записи',

        ],

    ],

    'grouping' => [

        'fields' => [

            'group' => [
                'label' => 'Групирај според',
                'placeholder' => 'Групирај според',
            ],

            'direction' => [

                'label' => 'Насока на групирање',

                'options' => [
                    'asc' => 'Растечки',
                    'desc' => 'Опаѓачки',
                ],

            ],

        ],

    ],

    'reorder_indicator' => 'Влечете и испуштете ги записите за да ги преуредите.',

    'selection_indicator' => [

        'selected_count' => 'Избрана :count запис|Избрани :count записи',

        'actions' => [

            'select_all' => [
                'label' => 'Избери ги сите :count',
            ],

            'deselect_all' => [
                'label' => 'Откажи ги сите',
            ],

        ],

    ],

    'sorting' => [

        'fields' => [

            'column' => [
                'label' => 'Сортирај според',
            ],

            'direction' => [

                'label' => 'Насока на сортирање',

                'options' => [
                    'asc' => 'Растечки',
                    'desc' => 'Опаѓачки',
                ],

            ],

        ],

    ],

];


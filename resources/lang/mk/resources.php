<?php
return [
    'navigation' => [
        'dashboard' => 'Дашборд',
        'badges' => 'Беџови',
        'courses' => 'Курсеви',
        'users' => 'Корисници',
    ],

    'fields' => [
        'name' => 'Име',
        'email' => 'Е-пошта',
        'role' => 'Улога',
        'password' => 'Лозинка',
        'profile_photo_path' => 'Профилна слика',
        'email_verified_at' => 'Верификувано време на е-пошта',
        'title' => 'Наслов',
        'slug' => 'Пермалинк',
        'description' => 'Опис',
        'image_url' => 'Слика',
        'color_hash' => 'Боја',
        'two_factor_secret' => 'Таа елементарна тајна за двофакторска автентикација',
        'two_factor_recovery_codes' => 'Кодови за опоравување на двофакторска автентикација',
        'two_factor_confirmed_at' => 'Датум на потврда на двофакторска автентикација',
        'current_team_id' => 'Тим на корисникот',
        'created_at' => 'Датум на креирање',
        'updated_at' => 'Датум на ажурирање',
        'score' => 'Резултат',
    ],

    'actions' => [
        'view' => 'Прегледај',
        'edit' => 'Уреди',
        'delete' => 'Избриши',
    ],

    'pages' => [
        'index' => 'Преглед',
        'create' => 'Додај нов',
        'edit' => 'Уреди',
    ],

    'labels' => [
        'users' => 'Корисници',
        'courses' => 'Курсеви',
        'badges' => 'Значки',
        'lectures' => 'Лекции',
    ],

    'pagination' => [
        'showing_results' => 'Прикажани од {start} до {end} од {total} резултати',
        'per_page' => 'На страница',
    ],
];

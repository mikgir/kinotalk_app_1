<?php

use App\Models\User;
use MoonShine\Exceptions\MoonShineNotFoundException;
use MoonShine\Models\MoonshineUser;

return [
    'dir' => 'app/Admin',
    'namespace' => 'App\Admin',

    'title' => env('MOONSHINE_TITLE', 'KINOTALK'),
    'logo' => env('MOONSHINE_LOGO', ''),

    'route' => [
        'prefix' => env('MOONSHINE_ROUTE_PREFIX', 'moonshine'),
        'middleware' => ['web', 'moonshine'],
        'custom_page_slug' => 'custom_page',
        'notFoundHandler' => MoonShineNotFoundException::class
    ],

    'auth' => [
        'enable' => true,
        'guard' => 'moonshine',
        'guards' => [
            'moonshine' => [
                'driver' => 'session',
                'provider' => 'moonshine',
            ],
        ],
        'providers' => [
            'moonshine' => [
                'driver' => 'eloquent',
                'model' => User::class,
            ],
        ],
        'footer' => ''
    ],
    'locales' => [
        'en', 'ru'
    ],
    'middlewares' => [],
    'tinymce' => [
        'file_manager' => false, // or 'laravel-filemanager' prefix for lfm
        'token' => env('MOONSHINE_TINYMCE_TOKEN', ''),
        'version' => env('MOONSHINE_TINYMCE_VERSION', '6')
    ],
    'socialite' => [
        // 'driver' => 'path_to_image_for_button'
    ],
    'header' => null, // blade path
    'footer' => [
        'copyright' => 'Made with ❤️ by <a href="#" class="font-semibold text-purple hover:text-pink" target="_blank">GB-dev 1</a>',
        'nav' => [
            'https://github.com/lee-to/moonshine/blob/1.x/LICENSE.md' => 'License',
            'https://moonshine.cutcode.dev' => 'Documentation',
            'https://github.com/lee-to/moonshine' => 'GitHub',
        ],
    ]
];

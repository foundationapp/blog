<?php

return [
    'headline_logo' => '/vendor/foundationapp/blog/assets/images/logo-light.png',

    'user' => [
        'namespace'                     => 'App\Models\User',
        'database_field_with_user_name' => 'name',
        'relative_url_to_profile'       => '',
        'relative_url_to_image_assets'  => '',
        'avatar_image_database_field'   => '',
    ],

    'load_more' => [
        'posts' => 10,
    ],

    'home_route' => 'blog',
    'route_prefix' => 'blog',
    'route_prefix_post' => 'post',

    /*
    |--------------------------------------------------------------------------
    | Styles for blog
    |--------------------------------------------------------------------------
    |
    | This is a minimal config to update a few of the sytles in the blog
    |
    */

    'styles' => [
        'rounded' => 'rounded-md',
        'container_width' => 'max-w-5xl',
    ],

    /*
    |--------------------------------------------------------------------------
    | Editor
    |--------------------------------------------------------------------------
    |
    | You may wish to choose between a couple different editors. At the moment
    | The following editors are supported:
    |   - tinymce    (https://www.tinymce.com/)
    |
    */

    'editor' => 'textarea',

];

<?php
return [

    'groups'=>[
        ['title' => trans('users::admin.title'), 'slug'=>'users', 'icon' => 'fa-users', 'priority' => 100]
    ],

    'items' =>[
        ['icon' => 'fa-user', 'group'=>'users', 'route'=>'admin.users.index', 'title' => trans('users::admin.title_list')],
    ]

];


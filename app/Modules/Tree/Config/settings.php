<?php
return [

    'title'=>trans('tree::admin.title'),
    'localization'=>true,
    "modules"=>[""=>"",
        "news"=>trans('news::admin.title'),
        "articles"=>trans('articles::admin.title'),
        "gallery"=>trans('gallery::admin.title'),
        "feedback"=>trans('feedback::admin.title')],
    "templates"=> ["inner"=>trans('tree::admin.templates.inner'), "index"=>trans('tree::admin.templates.index')]
];
<?php
namespace App\Modules\Articles\Http\Controllers\Admin;

use App\Modules\Admin\Http\Controllers\Admin;
use App\Modules\Admin\Http\Controllers\Image;
use App\Modules\Admin\Http\Controllers\Priority;
use App\Modules\Articles\Models\Article;


class IndexController extends Admin
{

    use Image, Priority;

    public function getModel(){
        return new Article();
    }

    public function getRules($request, $id = false)
    {
        return  ['title' => 'sometimes|required|max:255'];

    }





}

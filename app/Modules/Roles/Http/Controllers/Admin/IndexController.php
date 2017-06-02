<?php

namespace App\Modules\Roles\Http\Controllers\Admin;

use App\Modules\Admin\Http\Controllers\Admin;
use App\Modules\Roles\Models\Roles;
use App\Modules\Roles\Models\Modules;



class IndexController extends Admin
{
    public function getModel(){
        return new Roles();
    }

    public function getRules($request, $id = false)
    {
        return  ['title' => 'required'];

    }

    public function create(){


        $entity = $this->getModel();

        $this->after($entity);

        return view($this->getFormViewName(), ['entity'=>$entity]);
    }

    public function refreshModules(){
        $newModules = 0;
        $newTitle   = 0;

        foreach (config('modules.items') as $key => $value){
            $condition = (
                isset($value['settings']) &&
                isset($value['menu']) &&
                isset($value['settings']['in_roles']) &&
                $value['settings']['in_roles'] = 1
            );

            if($condition){
                $slug   = config('modules.items.' .$key.'.menu.items.0.slug');
                $title  = config('modules.items.' .$key.'.menu.items.0.title');
                $module = Modules::where('slug',$slug)->first();

                if(!$module){
                    Modules::create([
                        'slug'  => $slug,
                        'title' => $title
                    ]);

                    $newModules++;
                }
                elseif($module->title != $title) {
                    Modules::where('slug',$slug)->update([
                        'title' => $title
                    ]);

                    $newTitle++;
                }
            }
        }


        return redirect()->back()->with([
            'message' => 'Модули успешно обновлены.<br> Добавлено: ' .$newModules. ' модуль(ей). <br> Переименовано: ' .$newTitle. ' модуль(ей).'
        ]);


    }





}

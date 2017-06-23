<?php
namespace App\Modules\Admins\Models;

use App\Models\Model;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Notifications\Notifiable;



class Admins extends Model
{
    use Notifiable, Sortable;

    public function scopeOrder($query){

        return $query;
    }
}

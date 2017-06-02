<?php
namespace App\Modules\Roles\Models;

use App\Models\Model;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Notifications\Notifiable;


class Roles extends Model
{
    use Notifiable, Sortable;

    public function scopeOrder($query){

        return $query;
    }
}

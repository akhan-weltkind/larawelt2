<?php

namespace App\Modules\Admin\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Kyslik\ColumnSortable\Sortable;

/**
 * App\Modules\Admin\Models\Admin
 *
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-write mixed $password
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Admin\Models\Admin admin()
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Admin\Models\Admin filtered()
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Admin\Models\Admin list()
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Admin\Models\Admin order()
 * @method static \Illuminate\Database\Query\Builder|\App\Modules\Admin\Models\Admin sortable($defaultSortParameters = null)
 * @mixin \Eloquent
 */
class Admin extends Authenticatable
{
    use Notifiable, Sortable;

    protected $table = "admins";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function setPasswordAttribute($password)
    {
        if ($password){
            $this->attributes['password'] = bcrypt($password);
        }

    }

    public function scopeAdmin($query)
    {
        return $query->filtered()->order();
    }

    public function scopeFiltered($query)
    {
        return $query;
    }

    public function scopeList($query)
    {
        return $query->filtered()->order();
    }

    public function scopeOrder($query)
    {
        return $query;
    }

}

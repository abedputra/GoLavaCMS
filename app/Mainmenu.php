<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Mainmenu extends Model
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'mainmenu_name','mainmenu_link',
    ];

    public function submenu()
    {
        return $this->hasMany(Submenu::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Submenu extends Model
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'mainmenu_id', 'submenu_name','submenu_link',
    ];

    public function menu()
    {
        return $this->belongsTo(Mainmenu::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Aplikasi extends Model
{
    use HasRoles;

    protected $table = 'aplikasis';
    protected $fillable = [
        'user_id', 'name', 'descriptions', 'api_token',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}

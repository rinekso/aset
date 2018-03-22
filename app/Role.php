<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Role extends Model
{
    protected $table = 'roles';
    protected $fillable = [
    	'role',
    ];

    public function user(){
    	return $this->hasMany(User::class);
    }

    public function profile(){
    	return $this->hasMany(Profile::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class Cour extends Model
{
    use HasFactory;
    protected $table = "cours";

    public function users(){
    	return $this->belongsToMany(User::class);
    }
 //    public function inscrits() {
 //  		return $this->belongsToMany(User::class, 'cours_users', 'cours_id', 'user_id');
	// }
}

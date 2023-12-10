<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;
    protected $table = 'users';
    protected $guarded = ['id'];

    // public function users()
    // {
    //     return $this->belongsTo(UserModel::class, 'id_users', 'id');
    // }
}

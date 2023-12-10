<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratModel extends Model
{
    use HasFactory;
    protected $table = 'surat';
    protected $guarded = ['id'];

    public function users()
    {
        return $this->belongsTo(UserModel::class, 'id_users', 'id');
    }
}

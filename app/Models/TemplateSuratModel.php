<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemplateSuratModel extends Model
{
    use HasFactory;
    protected $table = 'template_surat';
    protected $guarded = ['id'];
}

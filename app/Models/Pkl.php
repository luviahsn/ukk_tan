<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pkl extends Model
{
        use HasFactory;
        
        protected $fillable = ['siswa_id', 'guru_id', 'industri_id', 'mulai', 'selesai'];

}

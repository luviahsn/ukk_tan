<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pkl extends Model
{
        use HasFactory;
        
        protected $fillable = ['siswa_id', 'guru_id', 'industri_id', 'mulai', 'selesai'];

        // Relasi ke guru
        public function guru()
        {
                return $this->belongsTo(Guru::class);
        }

        // Relasi ke industri
        public function industri()
        {
                return $this->belongsTo(Industri::class);
        }

        // Relasi ke siswa
        public function siswa()
        {
                return $this->belongsTo(Siswa::class);
        }
      
}

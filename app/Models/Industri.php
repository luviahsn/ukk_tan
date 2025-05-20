<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Industri extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'foto', 'bidang_usaha', 'alamat', 'kontak', 'email', 'website'];
}

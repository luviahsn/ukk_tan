<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Faxtories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Industri extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'foto', 'bidang_usaha', 'alamat', 'kontak', 'email', 'website'];
}

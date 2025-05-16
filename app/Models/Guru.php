<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Faxtories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'nip', 'gender', 'alamat', 'kontak', 'email'];
}

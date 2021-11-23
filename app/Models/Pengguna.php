<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    use HasFactory;
    protected $table = 'pengguna';
    public $timestamps = false;
    protected $fillable = [
        'nama',
        'jenis_kelamin',
        'tanggal_lahir',
        'telepon',
        'email',
        'password'
    ];
}

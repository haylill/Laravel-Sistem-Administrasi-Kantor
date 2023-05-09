<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tamu extends Model
{
    use HasFactory;
    protected $table = 'tamu';
    protected $primaryKey = 'id';
    protected $fillable = ['nama', 'waktu_kunjung', 'jenkel','alamat', 'telp', 'email', 'tujuan'];
}

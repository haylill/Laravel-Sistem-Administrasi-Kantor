<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gaji extends Model
{
    use HasFactory;
    protected $table = 'gaji';
    protected $fillable = [
        'id_karyawan' ,
        'gaji',
        'bonus'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class arsip extends Model
{
    use HasFactory;
    protected $table = 'arsip';
    protected $fillable = [
        'no_surat' ,
        'tgl_surat', 
        'tgl_diterima',
        'dari',
        'kepada' ,
        'perihal' ,
        'tgl_lahir',
        'jenis_surat',
        'lampiran',
        'file'
    ];
}

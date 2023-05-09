<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inventaris extends Model
{
    use HasFactory;
    protected $table = 'inventaris';
    protected $primaryKey = 'id';
    protected $fillable = ['nama', 'jenis', 'jumlah','tempat'];
}

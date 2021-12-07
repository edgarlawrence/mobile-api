<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriModel extends Model
{
    use HasFactory;

    public $table = "tbl_kategori";

    protected $fillable = [
        'nama_kategori'
    ];
}

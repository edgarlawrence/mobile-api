<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApiModel extends Model
{
    use HasFactory;

    public $table = "tbl_produk";

    protected $fillable = [
        'nama_produk',
        'kode_produk',
        'foto_produk',
        'id_kategori'
    ];
}

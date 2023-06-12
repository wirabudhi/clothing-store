<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'outlets_id',
        'nama_product',
        'jenis_product',
        'harga',
        'deskripsi',
        'ukuran',
        'stok',
        'gambar'
    ];

    public function outlet(){
        return $this->blongs(Outlet::class);
    }
}

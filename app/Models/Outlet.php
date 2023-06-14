<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    protected $table = 'outlets';

    // add fillable properties
    protected $fillable = [
        'nama_outlet',
        'no_telp',
        'email',
        'jam_operasional',
        'alamat',
        'lat',
        'lon',
        'gambar',
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'outlets_id');
    }

    public function events()
    {
        return $this->hasMany(Event::class, 'outlets_id');
    }
}

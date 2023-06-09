<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    protected $table = 'outlets';

    // add fillable properties
    public $fillable = [
        'nama_outlet',
        'alamat',
        'lat',
        'lon',
        'gambar',
    ];
}

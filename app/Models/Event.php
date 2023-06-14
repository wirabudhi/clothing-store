<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $table = 'events';

    protected $fillable = [
        'outlets_id',
        'nama_event',
        'tanggal_mulai',
        'tanggal_selesai',
        'gambar'
    ];

    public function outlet(){
        return $this->belongsTo(Outlet::class);
    }
}

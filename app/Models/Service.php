<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    //con esto le decimos a Laravel que debe asignar solo los campos que están en el array $fillable, para evitar ataques
    protected $fillable = [
        'name',
        'target',
        'last_status',
        'last_checked_at',        
    ];
    // Con esto le decimos a Laravel que trate este campo como un objeto de fecha (Carbon)
    protected $casts = [
        'last_checked_at' => 'datetime',
    ];
}

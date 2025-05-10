<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    use HasFactory;

    protected $table = 'statistics'; // Nama tabel

    protected $fillable = [
        'total_food_saved', 
        'carbon_emission_saved', 
        'date'
    ];
}
